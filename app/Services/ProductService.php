<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
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
        $record->show_in_home = $data->input('show_in_home');
        $record->active = $data->input('active');
        $record->sort = $data->input('sort');
        if ($data->file('pdf')->isValid()) {
            $record->pdf = "storage/" . (new FileService)->upload($data->file('pdf'));
        }

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

    public function tables(): array
    {
        return [
            'types' => (new TypeService())->availables(),
            'specialties' => (new SpecialtyService())->availables(),
            'brands' => (new BrandService())->availables(),
            'categories' => (new CategoryService())->availables(),
        ];
    }

    public function main()
    {
        return Product::with(['cover'])
            ->select('id', 'name', 'subtitle', 'slug')
            ->where('show_in_home', true)
            ->where('active', true)
            ->orderBy('sort')
            ->get();
    }

    public function listForFront(Request $request): LengthAwarePaginator
    {
        $categoryId = $request->category_id;
        $brandId = $request->brand_id;
        $specialtyId = $request->specialty_id;
        $typeId = $request->type_id;
        $sort = $request->sort ?? 'Orden por defecto';

        return Product::with(['cover'])
            ->select('id', 'name', 'subtitle', 'slug')
            ->when($brandId, fn (Builder $builder) => $builder->where('brand_id', $brandId))
            ->when($categoryId, fn (Builder $builder) => $builder->where('category_id', $categoryId))
            ->when($specialtyId, fn (Builder $builder) => $builder->where('specialty_id', $specialtyId))
            ->when($typeId, fn (Builder $builder) => $builder->where('type_id', $typeId))
            ->when($sort, function (Builder $builder) use ($sort) {
                if ($sort == 'Orden por defecto') {
                    $builder->orderBy('sort');
                }
                if ($sort == 'Nombres ascendente') {
                    $builder->orderBy('name', 'ASC');
                }
                if ($sort == 'Nombres descendente') {
                    $builder->orderBy('name', 'DESC');
                }
            })
            ->where('active', true)
            ->paginate(8);
    }
}
