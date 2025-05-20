<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarouselCategory;

class CarouselCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Info Image Utama'],
            ['name' => 'Info Image Paket'],
            ['name' => 'Info Image Jadwal'],
        ];

        foreach ($categories as $category) {
            CarouselCategory::updateOrCreate(['name' => $category['name']]);
        }
    }
}
