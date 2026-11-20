<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Jadwal>
 */
class JadwalFactory extends Factory
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
            'tanggal_jadwal' => fake()->date(),
            'waktu_mulai' => fake()->time(),
            'waktu_selesai' => fake()->time(),
            'lokasi_jadwal' => fake()->address(),
            'id_dosen' => Dosen::factory(),
        ];
    }
}
