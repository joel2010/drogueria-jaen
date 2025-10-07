<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class FileService
{

    public function storeFile(UploadedFile $file, string $model, int $modelId, ?string $type = null): File
    {
        $folder = class_basename($model);
        $path = "uploads/{$folder}/{$modelId}";
        Storage::disk('public')->makeDirectory($path);

        $extension = $file->getClientOriginalExtension();
        $filename = uniqid(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_') . '.' . $extension;

        $storedPath = $file->storeAs($path, $filename, 'public');

        return File::create([
            'model_type'    => $model,
            'model_id'      => $modelId,
            'file_name'     => $filename,
            'file_path'     => $storedPath,
            'type'          => $type,
            'extension'     => $extension,
        ]);
    }

    public function deleteFile(File $file): void
    {
        Storage::delete($file->file_path);
        $file->delete();
    }
}
