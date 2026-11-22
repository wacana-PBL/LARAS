<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pengajuan>
 */
class PengajuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'semester' => fake()->numberBetween(1, 8),
            'status_pengajuan' => fake()->randomElement(['pending', 'approved', 'rejected']),
            'judul_penelitian' => fake()->sentence(4),
            'jenis_pengajuan' => fake()->randomElement(['baru', 'perpanjangan']),
            'id_mahasiswa' => Mahasiswa::factory(),
            'tahun_ajaran' => fake()->numberBetween(2020, 2030),
            'usulan_dosen_pembimbing' => fake()->name(),
        ];
    }
}
