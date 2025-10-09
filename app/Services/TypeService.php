<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class TypeService
{

    public function list()
    {
        return Type::all();
    }

    public function showId($id): Type
    {
        $type = Type::find($id);

        if (!$type) {
            throw new \Exception("El registro seleccionado no existe", 500);
        }

        return $type;
    }

    public function fillModel(Type $type, Request $data): Type
    {
        $type->name            = $data->name;
        $type->active          = $data->active;
        $type->slug            = Str::slug($data->name);
        return $type;
    }

    public function store(Request $data): Type
    {
        $type = $this->fillModel(new Type(), $data);
        $type->save();

        return $type;
    }

    public function update(Request $data, string $id): ?Type
    {
        $type = Type::find($id);

        if (!$type) {
            return null;
        }

        $this->fillModel($type, $data)->save();

        return $type;
    }

    public function delete($id)
    {
        $type = Type::find($id);
        if ($type) {
            $type->delete();
            return true;
        }
        return false;
    }

    public function availables()
    {
        return Type::select('id', 'name')
            ->where('active', true)
            ->orderBy('name')
            ->get();
    }
}
