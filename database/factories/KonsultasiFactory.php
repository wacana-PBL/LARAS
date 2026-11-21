<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\Konsultasi;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Konsultasi>
 */
class KonsultasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_approval' => fake()->randomElement(['pending', 'approved', 'rejected']),
            'tanggal_konsultasi' => fake()->date(),
            'metode_konsultasi' => fake()->randomElement(['online', 'offline']),
            'catatan_progress' => fake()->paragraph(),
            'id_pengajuan' => Pengajuan::factory(),
            'id_dosen' => Dosen::factory(),
        ];
    }
}
