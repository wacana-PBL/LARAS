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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_pengajuan')->constrained('pengajuans')->cascadeOnDelete();
            $table->string('pengunggah');
            $table->enum('kategori_dokumen', ['proposal', 'seminar_proposal', 'skripsi']);
            $table->enum('status_verifikasi', ['belum diverifikasi', 'diterima', 'ditolak'])->default('belum diverifikasi');
            $table->string('file_path');
            $table->string('versi_dokumen');
            $table->string('nama_file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
