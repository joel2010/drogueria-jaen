<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class ProductService
{

    public function list(?string $search = null, ?array $filters = [], int $perPage = 10, ?string $sortDirection = 'desc')
    {
        $allowedDirections = ['asc', 'desc'];
        $sortDirection = in_array(strtolower($sortDirection), $allowedDirections)
            ? strtolower($sortDirection)
            : 'desc';

        return Product::query()
            ->search($search, $filters)
            ->orderBy('id', $sortDirection)
            ->paginate($perPage);
    }


    public function showId($id): Product
    {
        $record = Product::find($id);

        if (!$record) {
            throw new \Exception("El producto seleccionado no existe", 500);
        }

        return $record;
    }


    public function fillModel(Product $record, Request $data): Product
    {
        $record->name         = $data->input('name');
        $record->subtitle     = $data->input('subtitle');
        $record->description  = $data->input('description');
        $record->slug         = $data->input('slug') ?? Str::slug($data->input('name'));
        $record->internal_id  = $data->input('internal_id');
        $record->presentation = $data->input('presentation');
        $record->phone        = $data->input('phone');
        $record->category_id  = $data->input('category_id');
        $record->brand_id     = $data->input('brand_id');
        $record->type_id      = $data->input('type_id');
        $record->specialty_id = $data->input('specialty_id');

        return $record;
    }

    public function store(Request $data): Product
    {
        $record = $this->fillModel(new Product(), $data);
        $record->save();

        return $record;
    }

    public function update(string $id, Request $data): ?Product
    {
        $product = Product::find($id);
        if (!$product) {
            return null;
        }

        $this->fillModel($product, $data)->save();

        return $product;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
}
