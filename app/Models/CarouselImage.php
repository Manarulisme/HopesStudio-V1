<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarouselCategory;

class CarouselImage extends Model
{
    protected $fillable = [
        'carousel_category_id',
        'image_path',
        'caption',
    ];

    public function category()
    {
        return $this->belongsTo(CarouselCategory::class, 'carousel_category_id');
    }
}

