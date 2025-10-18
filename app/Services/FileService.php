<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class FileService
{

    public function storeFile(UploadedFile $file, string $model, int $modelId, ?string $type = null, ?int $index = null): File
    {
        $path = "uploads";
        $extension = $file->getClientOriginalExtension();
        $filename = Str::uuid()->toString() . '.' . $extension;
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
   
    public function upload(UploadedFile $file): string
    {
        $path = "uploads";
        $extension = $file->getClientOriginalExtension();
        $filename = Str::uuid()->toString() . '.' . $extension;
        
        return $file->storeAs($path, $filename, 'public');
    }

    public function deleteFile(File $file): void
    {
        Storage::delete($file->file_path);
        $file->delete();
    }

    public function delete(int $id): void
    {
        File::where('id', $id)
            ->delete();
    }
}
