<?php

namespace Database\Factories;

use App\Models\Pengajuan;
use App\Models\Seminar_Proposal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Seminar_Proposal>
 */
class Seminar_ProposalFactory extends Factory
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
            'lokasi_ruangan' => fake()->word(),
            'tanggal_sidang' => fake()->date(),
            'waktu_selesai' => fake()->dateTime(),
            'id_pengajuan' => Pengajuan::factory(),
        ];
    }
}
