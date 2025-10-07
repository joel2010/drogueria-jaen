<?php

namespace App\Services;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class BrandService
{

    public function list()
    {
        return Brand::all();
    }

    public function showId($id): Brand
    {
        $brand = Brand::find($id);

        if (!$brand) {
            throw new \Exception("El registro seleccionado no existe", 500);
        }

        return $brand;
    }

    public function fillModel(Brand $brand, Request $data): Brand
    {
        $brand->name            = $data->name;
        $brand->active          = $data->active;
        $brand->slug            = Str::slug($data->name);
        return $brand;
    }

    public function store(Request $data): Brand
    {
        $brand = $this->fillModel(new Brand(), $data);
        $brand->save();

        return $brand;
    }

    public function update(Request $data, string $id): ?Brand
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return null;
        }

        $this->fillModel($brand, $data)->save();

        return $brand;
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->delete();
            return true;
        }
        return false;
    }
}
