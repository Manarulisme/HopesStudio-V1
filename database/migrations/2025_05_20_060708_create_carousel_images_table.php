<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carousel_images', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // Nama kategori langsung
            $table->string('image_path'); // Path gambar, contoh: Assets/Images/hero1.png
            $table->string('caption')->nullable(); // Optional caption
            $table->timestamps();
            $table->foreignId('carousel_categories_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousel_images');
    }
};
