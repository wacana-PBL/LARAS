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
        Schema::create('plotting__dosen__pengajuans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('peran_dosen', ['pembimbing', 'penguji']);
            $table->foreignId('id_dosen')->constrained('dosens');
            $table->foreignId('id_pengajuan')->constrained('pengajuans')->cascadeOnDelete();
            $table->unique(['id_dosen', 'id_pengajuan', 'peran_dosen'], 'plotting_assignment_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plotting__dosen__pengajuans');
    }
};
