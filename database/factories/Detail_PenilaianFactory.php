<?php

namespace Database\Factories;

use App\Models\Detail_Penilaian;
use App\Models\Dosen;
use App\Models\Pengajuan;
use App\Models\Penilaian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Detail_Penilaian>
 */
class Detail_PenilaianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_penilaian' => Penilaian::factory(),
            'id_pengajuan' => Pengajuan::factory(),
            'nilai_skor' => fake()->numberBetween(0, 100),
            'status_kelulusan' => fake()->randomElement(['lulus', 'lulus bersyarat', 'tidak lulus']),
            'catatan_revisi' => fake()->sentence(),
            'jenis_penilaian' => fake()->randomElement(['a', 'b', 'c']),
            'id_dosen' => Dosen::factory(),
        ];
    }
}
