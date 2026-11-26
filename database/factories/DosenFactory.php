<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_dosen' => fake()->name(),
            'nidn' => fake()->unique()->numerify('##########'),
            'kuota_bimbingan' => fake()->numberBetween(1, 10),
            'id_pengguna' => User::factory(['role' => 'dosen']),
        ];
    }
}
