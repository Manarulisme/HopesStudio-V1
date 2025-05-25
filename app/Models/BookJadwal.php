<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookJadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_id',
        'user_id',
        'tanggal_booking',
        'status',
        'aktif_paket_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function aktifPaket()
    {
        return $this->belongsTo(AktifPaket::class, 'aktif_paket_id');
    }
}
