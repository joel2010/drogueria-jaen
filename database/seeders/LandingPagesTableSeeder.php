<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\LandingPage;
use App\Services\FileService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class LandingPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileService = new FileService();

        for ($landingNumber = 1; $landingNumber <= 3; $landingNumber++) {
            $landing = LandingPage::create([
                'title' => "Landing Page $landingNumber",
                'subtitle' => "Subtitulo $landingNumber",
                'order_index' => $landingNumber,
                'state' => true,
            ]);

            for ($imageNumber = 1; $imageNumber <= 2; $imageNumber++) {
                $fakeComputerFile = UploadedFile::fake()->image("landing{$landingNumber}_{$imageNumber}_computer.jpg");
                $fakeCellularFile = UploadedFile::fake()->image("landing{$landingNumber}_{$imageNumber}_cellular.jpg");

                $fileService->storeFile(
                    $fakeComputerFile,
                    LandingPage::class,
                    $landing->id,
                    'image_computer',
                    $imageNumber
                );

                $fileService->storeFile(
                    $fakeCellularFile,
                    LandingPage::class,
                    $landing->id,
                    'image_cellular',
                    $imageNumber
                );
            }
        }
    }
}
