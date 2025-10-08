<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CreateUserAdminSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(SpecialtiesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(LandingPagesTableSeeder::class);
    }
}
