<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Medicamentos de Venta Libre',
            'Suplementos y Vitaminas',
            'Cuidado Personal',
            'Belleza y Cosmética',
            'Salud Bucal',
            'Cuidado Capilar',
            'Productos para Bebés',
            'Equipos Médicos',
            'Nutrición Deportiva',
            'Bienestar General',
        ];

        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'active' => true,
            ]);
        }
    }
}
