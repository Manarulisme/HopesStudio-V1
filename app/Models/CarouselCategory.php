<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarouselImage;

class CarouselCategory extends Model
{
    public function images()
{
    return $this->hasMany(CarouselImage::class, 'carousel_category_id');
}
}
