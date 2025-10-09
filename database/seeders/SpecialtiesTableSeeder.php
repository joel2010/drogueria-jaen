<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Cardiología',
            'Dermatología',
            'Neurología',
            'Pediatría',
            'Ginecología',
            'Oftalmología',
            'Ortopedia',
            'Psiquiatría',
            'Oncología',
            'Endocrinología',
        ];

        foreach ($specialties as $specialtyName) {
            Specialty::create([
                'name' => $specialtyName,
                'slug' => Str::slug($specialtyName),
                'active' => true,
            ]);
        }
    }
}
