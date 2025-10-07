<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property string|null $subtitle
 * @property int $order_index
 * @property bool $state
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

    public function imageCellular()
    {
        return $this->files()->where('type', 'image_cellular')->first();
    }
}
