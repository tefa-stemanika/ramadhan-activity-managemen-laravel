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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nis');
            $table->enum('jenis_kegiatan', [
                'Kegiatan pembukaan',
                'Shalat Fardu',
                'Shalat Tarawih',
                'Sahur bersama keluarga',
                'Buka puasa bersama keluarga',
                'Kajian islamiyah menjelang buka puasa',
                'Kajian islamiyah malam jumat',
                'Tadarus Al-Quran',
                'Infak harian',
                'Rantang Kayaah',
                'Penulisan mushaf Al-Quran',
                'Ngobras',
                'Penutupan',
            ]);
            $table->string('deskripsi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
