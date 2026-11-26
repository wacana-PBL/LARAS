<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\Pengajuan;
use App\Models\Plotting_Dosen_Pengajuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plotting_Dosen_Pengajuan>
 */
class Plotting_Dosen_PengajuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role' => fake()->randomElement(['pembimbing', 'penguji 1', 'penguji 2', 'penguji 3']),
            'id_dosen' => Dosen::factory(),
            'id_pengajuan' => Pengajuan::factory(),
        ];
    }
}
