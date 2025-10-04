<?php

namespace App\Helpers;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static string $dateFormat = 'd-m-Y';

    public static string $dateLongFormat = 'd-m-Y H:i';

    public static function getErrorFromException(Exception $e): string
    {
        return $e->getCode() === 500 ? $e->getMessage() : 'Ocurrió un error al procesar su información.';
    }

    public static function getUrlFileFromPublicDisk(string $path): string
    {
        return Storage::disk('public')->url($path);
    }

    public static function getDateFormat(string $value): string
    {
        return Carbon::parse($value)->format(self::$dateFormat);
    }

    public static function getDateLongFormat(string $value): string
    {
        return Carbon::parse($value)->format(self::$dateLongFormat);
    }
}
