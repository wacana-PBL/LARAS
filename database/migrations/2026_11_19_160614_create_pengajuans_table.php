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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_active')->default(true);
            $table->integer('semester');
            $table->enum('status_pengajuan', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('judul_penelitian');
            $table->enum('jenis_pengajuan', ['baru', 'perpanjangan']);
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas')->cascadeOnDelete();
            $table->integer('tahun_ajaran');
            $table->string('usulan_dosen_pembimbing');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
