<?php

namespace App\Services;

use App\Models\Specialty;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

final class SpecialtyService
{
    public function list(): Collection
    {
        return Specialty::select('id', 'name', 'active', 'created_at')
            ->orderBy('name')
            ->get();
    }

    public function createModel(Specialty $record, Request $data): Specialty
    {
        $record->name = $data->name;
        $record->active = $data->active;
        $record->slug = Str::slug($data->name);

        return $record;
    }

    public function store(Request $data): Specialty
    {
        $record = $this->createModel(new Specialty(), $data);
        $record->save();

        return $record;
    }

    public function show(int $recordId): Specialty
    {
        $record = Specialty::where('id', $recordId)
            ->first();

        if (!$record) {
            throw new \Exception("El registro seleccionado no existe", 500);
        }

        return $record;
    }
    
    public function update(Request $data, int $recordId): Specialty
    {
        $record = $this->createModel($this->show($recordId), $data);
        $record->save();

        return $record;
    }
    
    public function delete(int $recordId): void
    {
        $record = $this->show($recordId);
        $record->delete();
    }
}
