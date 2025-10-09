<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Specialty;
use App\Models\Type;
use App\Services\FileService;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileService = new FileService();
        $categoryIds    = Category::pluck('id')->toArray();
        $brandIds       = Brand::pluck('id')->toArray();
        $typeIds        = Type::pluck('id')->toArray();
        $specialtyIds   = Specialty::pluck('id')->toArray();

        for ($productNumber = 1; $productNumber <= 10; $productNumber++) {
            $product = Product::create([
                'name'          => "Producto $productNumber",
                'subtitle'      => "Subtitulo $productNumber",
                'description'   => "Descripción del producto $productNumber",
                'slug'          => Str::slug("Producto $productNumber"),
                'internal_id'   => "P00$productNumber",
                'category_id'   => $categoryIds[array_rand($categoryIds)],
                'brand_id'      => $brandIds[array_rand($brandIds)],
                'type_id'       => $typeIds[array_rand($typeIds)],
                'specialty_id'  => $specialtyIds[array_rand($specialtyIds)],
            ]);

            for ($imageNumber = 1; $imageNumber <= 5; $imageNumber++) {
                $fakeFile = UploadedFile::fake()->image("producto{$productNumber}_imagen{$imageNumber}.jpg");

                $fileService->storeFile(
                    $fakeFile,
                    Product::class,
                    $product->id,
                    null,
                    $imageNumber
                );
            }
        }
    }
}
