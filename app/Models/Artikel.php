<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    /** @use HasFactory<\Database\Factories\ArtikelFactory> */
    use HasFactory;
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar_utama',
        'user_id',
    ];
}
