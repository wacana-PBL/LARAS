<?php

namespace Database\Seeders;

use App\Models\Skripsi;
use Illuminate\Database\Seeder;

class SkripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skripsi::factory()->count(10)->create();
    }
}
