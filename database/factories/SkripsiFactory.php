<?php

namespace Database\Factories;

use App\Models\Pengajuan;
use App\Models\Skripsi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skripsi>
 */
class SkripsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'waktu_mulai' => fake()->dateTime(),
            'waktu_selesai' => fake()->dateTime(),
            'id_pengajuan' => Pengajuan::factory(),
            'lokasi_ruangan' => fake()->word(),
            'tanggal_sidang' => fake()->date(),
        ];
    }
}
