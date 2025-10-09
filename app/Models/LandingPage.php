<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property int $order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 */
class LandingPage extends Model
{
    use SoftDeletes;

    protected $casts =
    [
        'state' => 'bool'
    ];

    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

    public function imageComputer()
    {
        return $this->files()->where('type', 'image_computer')->first();
    }

    public function computer(): MorphOne
    {
        return $this->morphOne(File::class, 'model', 'model_type', 'model_id')->where('type', 'image_computer')->orderBy('id', 'DESC');
    }
    
    public function mobile(): MorphOne
    {
        return $this->morphOne(File::class, 'model', 'model_type', 'model_id')->where('type', 'image_cellular')->orderBy('id', 'DESC');
    }

    public function imageCellular()
    {
        return $this->files()->where('type', 'image_cellular')->first();
    }
}
