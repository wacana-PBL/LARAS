<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_mahasiswa' => fake()->name(),
            'id_pengguna' => User::factory(['role' => 'mahasiswa']),
            'nim'=> fake()->unique()->numerify('#####'),
            'program_studi' => fake()->word(),
        ];
    }
}
