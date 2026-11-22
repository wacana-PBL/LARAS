<?php

namespace Database\Factories;

use App\Models\Dokumen;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dokumen>
 */
class DokumenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pengajuan' => Pengajuan::factory(),
            'pengunggah' => fake()->name(),
            'kategori_dokumen' => fake()->randomElement(['proposal', 'seminar_proposal', 'skripsi']),
            'status_verifikasi' => fake()->randomElement(['belum diverifikasi', 'diterima', 'ditolak']),
            'file_path' => fake()->filePath(),
            'versi_dokumen' => fake()->randomDigitNotZero(),
            'nama_file' => fake()->word().'.pdf',
        ];
    }
}
