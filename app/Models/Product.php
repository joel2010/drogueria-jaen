<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'subtitle',
        'description',
        'slug',
        'internal_id',
        'presentation',
        'phone',
        'category_id',
        'brand_id',
        'type_id',
        'specialty_id',
        'show_in_home',
        'active',
    ];

    protected $casts = [
        'active' => 'bool',
        'show_in_home' => 'bool',
    ];

    public function getUrlAttribute()
    {
        return url("producto/{$this->slug}");
    }

    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }
    
    public function cover(): MorphOne
    {
        return $this->morphOne(File::class, 'model', 'model_type', 'model_id')->orderBy('id', 'ASC');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if ($search) {
            return $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('category', function (Builder $query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('brand', function (Builder $query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('type', function (Builder $query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('specialty', function (Builder $query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
            });
        }

        return $query;
    }
}
