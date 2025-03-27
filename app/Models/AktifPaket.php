<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktifPaket extends Model
{
    /** @use HasFactory<\Database\Factories\AktifPaketFactory> */
    use HasFactory;
    protected $fillable = [
        'status_paket',
        'sisa_sesi',
        'tanggal_aktif',
        'tanggal_kadaluarsa',
        'user_id',
        'paket_id',
        'pembayaran_id',
    ];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
