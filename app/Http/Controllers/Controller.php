<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function writeLog(\Exception $e): void
    {
        \Log::info('Error. Detalles: ' . $e->getMessage() . '. En la linea #' . $e->getLine() . ' del archivo ' . $e->getFile());
    }

    public function response(?array $data = null, ?string $message = 'Información procesada de forma correcta.', ?int $statusCode = 200): JsonResponse
    {
        if (! $data) {
            $data = [];
        }
        $data['message'] = $message;
        $data['success'] = $statusCode === 200;

        return response()->json($data, $statusCode);
    }
}
