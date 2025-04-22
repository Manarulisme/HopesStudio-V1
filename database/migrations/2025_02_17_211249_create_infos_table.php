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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('photos_info')->nullable();
            $table->string('name')->nullable();
            $table->string('deskripsi')->nullable();
            $table->enum('position', ['dashboard', 'jadwal', 'paket'])->nullable();
            $table->enum('type', ['headline', 'none'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
