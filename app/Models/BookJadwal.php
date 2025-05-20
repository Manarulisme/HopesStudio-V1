<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookJadwal extends Model
{
    protected $table = 'book_jadwals';
    /** @use HasFactory<\Database\Factories\BookJadwalFactory> */
    use HasFactory;
    protected $fillable = [
        'jadwal_id',
        'user_id',
        'tanggal_booking',
        'status',
        'aktif_paket_id'
    ];
}
