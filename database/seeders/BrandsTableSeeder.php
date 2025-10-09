<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Pfizer',
            'Bayer',
            'Roche',
            'Johnson & Johnson',
            'Novartis',
            'GSK',
            'Sanofi',
            'Abbott',
            'Merck',
            'Nestlé Health Science',
        ];

        foreach ($brands as $brandName) {
            Brand::create([
                'name' => $brandName,
                'slug' => Str::slug($brandName),
                'active' => true,
            ]);
        }
    }
}
