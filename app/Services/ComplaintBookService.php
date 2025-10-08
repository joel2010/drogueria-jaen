<?php

namespace App\Services;

use App\Models\ComplaintBook;
use Illuminate\Http\Request;

final class ComplaintBookService
{
    public function list(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        return ComplaintBook::with('files')->filter($request->all())
            ->paginate($perPage);
    }

    public function store(array $data)
    {
        $complaint = ComplaintBook::create($data);
        if (!empty($data['files']) && is_array($data['files'])) {
            foreach ($data['files'] as $index => $file) {
                (new FileService())->storeFile($file, ComplaintBook::class, $complaint->id, null, $index);
            }
        }
    }
}
