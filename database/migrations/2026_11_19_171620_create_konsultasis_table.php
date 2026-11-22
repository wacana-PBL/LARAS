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
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('status_approval', ['pending', 'approved', 'rejected'])->default('pending');
            $table->date('tanggal_konsultasi');
            $table->enum('metode_konsultasi', ['online', 'offline']);
            $table->text('catatan_progress');
            $table->foreignId('id_pengajuan')->constrained('pengajuans');
            $table->foreignId('id_dosen')->constrained('dosens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
