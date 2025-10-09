<?php

namespace App\Http\Controllers;

use App\Services\FileService;

class FileController extends Controller
{
    public function __construct(protected readonly FileService $service)
    {
        //
    }

    public function delete(int $id)
    {
        $this->service->delete($id);

        return $this->response();
    }
}
