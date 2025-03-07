<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    /** @use HasFactory<\Database\Factories\PaketFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga',
        'jumlah_sesi',
        'masa_aktif_hari',
        'deskripsi'
    ];
}
