<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\FileService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(
        protected readonly ProductService $service,
        protected readonly FileService $fileService
    ) {}

    public function list(Request $request)
    {
        $search  = $request->input('search');
        $filters = $request->only(['category_id', 'brand_id', 'type_id', 'specialty_id']);

        $perPage = (int) $request->input('per_page', 10);
        $sortDirection = $request->input('sort_direction', 'desc');

        $products = $this->service->list($search, $filters, $perPage, $sortDirection);

        return ProductListResource::collection($products);
    }

    public function showId(string $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $this->service->showId($id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new ProductResource($data),
        ]);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $product = $this->service->store($request);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $this->fileService->storeFile(
                        $image,
                        Product::class,
                        $product->id,
                        null,
                        $index
                    );
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new ProductResource($product),
        ]);
    }

    public function update(ProductRequest $request, string $id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $product = $this->service->update($id, $request);

            if (!$product) {
                return $this->response(null, 'Producto no encontrado', 404);
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $this->fileService->storeFile(
                        $image,
                        Product::class,
                        $product->id,
                        null,
                        $index
                    );
                }
            }

            $imagesOrder = $request->input('images_order', []);
            if (!empty($imagesOrder)) {
                foreach ($imagesOrder as $fileId => $order) {
                    $file = $product->files()->find($fileId);
                    if ($file) {
                        $file->order = (int) $order;
                        $file->save();
                    }
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new ProductResource($product),
        ]);
    }

    public function delete(string $id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $landing = Product::findOrFail($id);

            foreach ($landing->files as $file) {
                $this->fileService->deleteFile($file);
            }

            $landing->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response();
    }
}
