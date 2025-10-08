<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComplaintBookListResource;
use App\Services\ComplaintBookService;
use Illuminate\Http\Request;

class ComplaintBookController extends Controller
{
    public function __construct(protected readonly ComplaintBookService $service) {}

    public function list(Request $request)
    {
        $data = $this->service->list($request);

        return ComplaintBookListResource::collection($data);
    }
}
