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
        Schema::create('seminar__proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_pengajuan')->unique()->constrained('pengajuans')->cascadeOnDelete();
            $table->dateTime('waktu_mulai');
            $table->string('lokasi_ruangan');
            $table->date('tanggal_sidang');
            $table->dateTime('waktu_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar__proposals');
    }
};
