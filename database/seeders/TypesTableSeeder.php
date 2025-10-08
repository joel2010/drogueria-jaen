<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Medicamento',
            'Suplemento',
            'Cosmético',
            'Equipo Médico',
            'Higiene Personal',
            'Vitaminas',
            'Cuidado de la Piel',
            'Cuidado Capilar',
        ];

        foreach ($types as $typeName) {
            Type::create([
                'name' => $typeName,
                'slug' => Str::slug($typeName),
                'active' => true,
            ]);
        }
    }
}
