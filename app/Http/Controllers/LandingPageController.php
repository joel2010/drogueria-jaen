<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\LandingPageRequest;
use App\Http\Resources\LandingPageListResource;
use App\Http\Resources\LandingPageResource;
use App\Models\LandingPage;
use App\Services\FileService;
use App\Services\LandingPageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function __construct(
        protected readonly LandingPageService $service,
        protected readonly FileService $fileService
    ) {}

    public function list(): JsonResponse
    {
        $landing = $this->service->list();

        return $this->response([
            'data' => LandingPageListResource::collection($landing),
        ]);
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
            'data' => new LandingPageResource($data),
        ]);
    }

    public function store(LandingPageRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $landing = $this->service->store($request);
            foreach (['image_computer', 'image_cellular'] as $imageType) {
                if ($request->hasFile($imageType)) {
                    $this->fileService->storeFile($request->file($imageType), LandingPage::class, $landing->id, $imageType);
                }
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->writeLog($e);
            return $this->response(null, Helper::getErrorFromException($e), 500);
        }

        return $this->response([
            'data' => new LandingPageResource($landing),
        ]);
    }

    public function update(LandingPageRequest $request, string $id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $landing = $this->service->update($id, $request);

            foreach (['image_computer', 'image_cellular'] as $imageType) {
                if ($request->hasFile($imageType)) {
                    $oldFile = $landing->files()->where('type', $imageType)->first();
                    if ($oldFile) {
                        $this->fileService->deleteFile($oldFile);
                    }
                    $this->fileService->storeFile(
                        $request->file($imageType),
                        LandingPage::class,
                        $landing->id,
                        $imageType
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
            'data' => new LandingPageResource($landing->fresh()),
        ]);
    }

    public function delete(string $id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $landing = LandingPage::findOrFail($id);

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
