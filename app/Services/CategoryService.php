<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class CategoryService
{

    public function list()
    {
        return Category::all();
    }

    public function showId($id): Category
    {
        $category = Category::find($id);

        if (!$category) {
            throw new \Exception("El registro seleccionado no existe", 500);
        }

        return $category;
    }

    public function fillModel(Category $category, Request $data): Category
    {
        $category->name            = $data->name;
        $category->active          = $data->active;
        $category->slug            = Str::slug($data->name);
        return $category;
    }

    public function store(Request $data): Category
    {
        $category = $this->fillModel(new Category(), $data);
        $category->save();

        return $category;
    }

    public function update(Request $data, string $id): ?Category
    {
        $category = Category::find($id);

        if (!$category) {
            return null;
        }

        $this->fillModel($category, $data)->save();

        return $category;
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return true;
        }
        return false;
    }

    public function listFront()
    {
        return Category::where('active', true)->get();
    }
}
