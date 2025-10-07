<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(
        protected readonly CategoryService $service,
    ) {}

    public function list(): JsonResponse
    {
        $category = $this->service->list();

        return $this->response([
            'data' => CategoryListResource::collection($category),
        ]);
    }

    public function showId(string $id)
    {
        DB::beginTransaction();
        try {
            $category = $this->service->showId($id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new CategoryResource($category),
        ]);
    }

    public function store(CategoryRequest  $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $category = $this->service->store($request);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, $e->getMessage(), 500);
        }

        return $this->response([
            'data' => new CategoryResource($category),
        ]);
    }

    public function update(CategoryRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $category = $this->service->update($request, $id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new CategoryResource($category),
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
