<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\SpecialtyService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SpecialtyRequest;
use App\Http\Resources\SpecialtyListResource;
use App\Http\Resources\SpecialtyResource;

class SpecialtyController extends Controller
{
    public function __construct(protected readonly SpecialtyService $service) {
        //
    }

    public function list()
    {
        $data = $this->service->list();

        return $this->response([
            'data' => SpecialtyListResource::collection($data),
        ]);
    }

    public function store(SpecialtyRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $this->service->store($request);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            $this->writeLog($e);

            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new SpecialtyResource($data),
        ]);
    }

    public function update(SpecialtyRequest $request, int $id): JsonResponse
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
            'data' => new SpecialtyResource($data),
        ]);
    }

    public function show(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $this->service->show($id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            $this->writeLog($e);

            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new SpecialtyResource($data),
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
