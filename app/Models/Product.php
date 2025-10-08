<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;


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
    ];

    public function files()
    {
        return $this->morphMany(File::class, 'model')->orderBy('order');
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

    public function scopeSearch(Builder $query, ?string $search = null, ?array $filters = []): Builder
    {
        if (!empty($search)) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('internal_id', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhereHas('category', fn($q) => $q->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('brand', fn($q) => $q->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('type', fn($q) => $q->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('specialty', fn($q) => $q->where('name', 'like', "%{$search}%"));
            });
        }

        if (!empty($filters)) {
            $query
                ->when($filters['category_id'] ?? null, function ($q, $ids) {
                    is_array($ids)
                        ? $q->whereIn('category_id', $ids)
                        : $q->where('category_id', $ids);
                })
                ->when($filters['brand_id'] ?? null, function ($q, $ids) {
                    is_array($ids)
                        ? $q->whereIn('brand_id', $ids)
                        : $q->where('brand_id', $ids);
                })
                ->when($filters['type_id'] ?? null, function ($q, $ids) {
                    is_array($ids)
                        ? $q->whereIn('type_id', $ids)
                        : $q->where('type_id', $ids);
                })
                ->when($filters['specialty_id'] ?? null, function ($q, $ids) {
                    is_array($ids)
                        ? $q->whereIn('specialty_id', $ids)
                        : $q->where('specialty_id', $ids);
                });
        }

        return $query;
    }
}
