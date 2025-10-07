<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactListResource;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(protected readonly ContactService $service)
    {
        //
    }

    public function list(Request $request)
    {
        $data = $this->service->list($request);

        return ContactListResource::collection($data);
    }
}
