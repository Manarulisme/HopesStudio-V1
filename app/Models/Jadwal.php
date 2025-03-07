<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    /** @use HasFactory<\Database\Factories\JadwalFactory> */
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'trainer',
        'foto_ruangan',
        'jenis_pelatihan',
        'kuota'
    ];
}
