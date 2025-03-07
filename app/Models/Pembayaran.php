<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    /** @use HasFactory<\Database\Factories\PembayaranFactory> */
    use HasFactory;
    protected $fillable = [
        'kode_pembayaran',
        'nama_pengirim',
        'bukti_pembayaran',
        'status_pembayaran',
        'tanggal_pembayaran',
        'user_id',
        'paket_id'
    ];
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
