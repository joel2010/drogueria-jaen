<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandListResource;
use App\Http\Resources\BrandResource;
use App\Services\BrandService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct(
        protected readonly BrandService $service,
    ) {}

    public function list(): JsonResponse
    {
        $brand = $this->service->list();

        return $this->response([
            'data' => BrandListResource::collection($brand),
        ]);
    }

    public function showId(string $id)
    {
        DB::beginTransaction();
        try {
            $brand = $this->service->showId($id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            $this->writeLog($e);

            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new BrandResource($brand),
        ]);
    }

    public function store(BrandRequest  $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $brand = $this->service->store($request);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, $e->getMessage(), 500);
        }

        return $this->response([
            'data' => new BrandResource($brand),
        ]);
    }

    public function update(BrandRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $this->service->update($request, $id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new BrandResource($data),
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->service->delete($id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response();
    }
}
