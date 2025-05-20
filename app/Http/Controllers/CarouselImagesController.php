<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CarouselImage;
use App\Models\CarouselCategory;
use Illuminate\Support\Facades\Storage;

class CarouselImagesController extends Controller
{
public function index()
{
    $carouselImages = CarouselImage::with('category')->latest()->get();
    return view('AdminPage.Carousel.IndexCarousel', compact('carouselImages'));
}

    public function create(){
         $categories = CarouselCategory::all();
      return view('AdminPage.Carousel.CreateCarousel', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'carousel_category_id' => 'required|exists:carousel_categories,id',
            'image' => 'required|image|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        // Simpan gambar
        $imagePath = $request->file('image')->store('carousel_images', 'public');

        CarouselImage::create([
        'carousel_category_id' => $request->carousel_category_id, // ← HARUS ADA
        'image_path' => $imagePath,
        'caption' => $request->caption,
]);

        return redirect()->back()->with('success', 'Gambar carousel berhasil ditambahkan.');
    }
}
