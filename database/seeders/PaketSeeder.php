<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat paket seeder
        $paket = [
            [
                'nama_paket' => '1 Sesi',
                'harga' => 100000,
                'jumlah_sesi' => 1,
                'masa_aktif_hari' => 7,
                'deskripsi' => 'Paket 1 Sesi adalah paket yang paling murah',
            ],
            [
                'nama_paket' => '3 Sesi',
                'harga' => 300000,
                'jumlah_sesi' => 3,
                'masa_aktif_hari' => 14,
                'deskripsi' => 'Paket 3 Sesi adalah paket yang sedang',
            ],
            [
                'nama_paket' => '5 Sesi',
                'harga' => 500000,
                'jumlah_sesi' => 5,
                'masa_aktif_hari' => 30,
                'deskripsi' => 'Paket 5 Sesi adalah paket yang paling mahal',
            ],
        ];
        //masukkan ke tabel paket
        DB::table('pakets')->insert($paket);


    }
}
