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
        Schema::create('aktif_pakets', function (Blueprint $table) {
            $table->id();
            $table->enum('status_paket', ['aktif', 'pending', 'nonaktif'])->default('pending');
            $table->integer('sisa_sesi');
            $table->dateTime('tanggal_aktif');
            $table->dateTime('tanggal_kadaluarsa');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('paket_id')->constrained('pakets')->onDelete('cascade');
            $table->foreignId('pembayaran_id')->constrained('pembayarans')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktif_pakets');
    }
};
