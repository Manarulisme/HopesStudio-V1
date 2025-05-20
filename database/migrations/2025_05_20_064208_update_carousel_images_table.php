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
            Schema::table('carousel_images', function (Blueprint $table) {
            // Hapus kolom lama
            $table->dropColumn('category');

            // Tambahkan foreign key baru
            $table->foreignId('carousel_category_id')->after('id')->constrained('carousel_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carousel_images', function (Blueprint $table) {
            // Rollback: hapus foreign key dan tambahkan kembali kolom category
            $table->dropForeign(['carousel_category_id']);
            $table->dropColumn('carousel_category_id');
            $table->string('category')->after('id');
        });
    }
};
