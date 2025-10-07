<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $model
 * @property int $model_id
 * @property string $file_name
 * @property string $file_path
 * @property string $type
 * @property string $extension
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 */
class File extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'model_id',
        'model_type',
        'file_name',
        'file_path',
        'type',
        'extension',
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
