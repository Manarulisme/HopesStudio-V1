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
        Schema::table('jadwals', function (Blueprint $table) {
            $table->integer('peserta')->after('kuota')->default(0); // Add 'peserta' column
            $table->string('ruang', 50)->after('peserta'); // Add 'ruang' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->dropColumn(['peserta', 'ruang']); // Drop the added columns
        });
    }
};
