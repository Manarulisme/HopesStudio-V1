<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwals')->insert([
            [
                'tanggal' => '2025-03-01',
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '11:00:00',
                'trainer' => 'John Doe',
                'foto_ruangan' => 'Assets/Images/foto_ruangan/sample1.jpg',
                'jenis_pelatihan' => 'Yoga',
                'kuota' => 4,
            ],
            [
                'tanggal' => '2025-03-02',
                'waktu_mulai' => '10:00:00',
                'waktu_selesai' => '12:00:00',
                'trainer' => 'Jane Smith',
                'foto_ruangan' => 'Assets/Images/foto_ruangan/sample2.jpg',
                'jenis_pelatihan' => 'Pilates',
                'kuota' => 4,
            ],
            [
                'tanggal' => '2025-03-03',
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '10:00:00',
                'trainer' => 'Alice Johnson',
                'foto_ruangan' => 'Assets/Images/foto_ruangan/sample3.jpg',
                'jenis_pelatihan' => 'Zumba',
                'kuota' => 5,
            ],
        ]);
    }
}