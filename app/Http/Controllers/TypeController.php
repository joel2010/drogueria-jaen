<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\TypeRequest;
use App\Http\Resources\TypeListResource;
use App\Http\Resources\TypeResource;
use App\Services\TypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{

    public function __construct(
        protected readonly TypeService $service,
    ) {}

    public function list(): JsonResponse
    {
        $type = $this->service->list();

        return $this->response([
            'data' => TypeListResource::collection($type),
        ]);
    }

    public function showId(string $id)
    {
        DB::beginTransaction();
        try {
            $type = $this->service->showId($id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new TypeResource($type),
        ]);
    }

    public function store(TypeRequest  $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $type = $this->service->store($request);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, $e->getMessage(), 500);
        }

        return $this->response([
            'data' => new TypeResource($type),
        ]);
    }

    public function update(TypeRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $type = $this->service->update($request, $id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new TypeResource($type),
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
