<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buatlah seeder dengan isian : judul, gambar_utama, konten, slug, user_id
        $artikels = [
            [
                'judul' => 'Artikel 1',
                'gambar_utama' => 'Assets/Images/foto_artikel/sample1.jpg',
                'konten' => 'Ini adalah artikel 1',
                'slug' => Str::slug('Artikel 1'),
                'user_id' => 1,
            ],
            [
                'judul' => 'Artikel 2',
                'gambar_utama' => 'Assets/Images/foto_artikel/sample2.jpg',
                'konten' => 'Ini adalah artikel 2',
                'slug' => Str::slug('Artikel 2'),
                'user_id' => 1,
            ],
            [
                'judul' => 'Artikel 3',
                'gambar_utama' => 'Assets/Images/foto_artikel/sample3.jpg',
                'konten' => 'Ini adalah artikel 3',
                'slug' => Str::slug('Artikel 3'),
                'user_id' => 1,
            ],
        ];

        //masukkan ke tabel artikel
        DB::table('artikels')->insert($artikels);
    }
}