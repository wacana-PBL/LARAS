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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_pengajuan')->unique()->constrained('pengajuans')->cascadeOnDelete();
            $table->date('tanggal_jadwal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('lokasi_jadwal');
            $table->foreignId('id_dosen')->constrained('dosens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
