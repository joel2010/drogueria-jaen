<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class FileService
{

    public function storeFile(UploadedFile $file, string $model, int $modelId, ?string $type = null, ?int $index = null): File
    {
        $folder = class_basename($model);
        $path = "uploads/{$folder}/{$modelId}";
        Storage::disk('public')->makeDirectory($path);

        $extension = $file->getClientOriginalExtension();

        $hash = substr(md5(time() . $file->getClientOriginalName()), 0, 12);
        $filename = $hash . '.' . $extension;

        $storedPath = $file->storeAs($path, $filename, 'public');

        return File::create([
            'model_type' => $model,
            'model_id'   => $modelId,
            'file_name'  => $filename,
            'file_path'  => $storedPath,
            'type'       => $type,
            'extension'  => $extension,
            'order'      => $index
        ]);
    }

    public function deleteFile(File $file): void
    {
        Storage::delete($file->file_path);
        $file->delete();
    }
}
