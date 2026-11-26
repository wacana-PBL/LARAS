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
        Schema::create('detail__penilaians', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('nilai_skor');
            $table->foreignId('id_pengajuan')->constrained('pengajuans')->cascadeOnDelete();
            $table->enum('status_kelulusan', ['lulus', 'lulus bersyarat', 'tidak lulus']);
            $table->enum('jenis_penilaian', ['a', 'b', 'c']);
            $table->string('catatan_revisi');
            $table->foreignId('id_dosen')->constrained('dosens');
            $table->foreignId('id_penilaian')->constrained('penilaians');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__penilaians');
    }
};
