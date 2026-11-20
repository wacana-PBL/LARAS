<?php

namespace Database\Seeders;

use App\Models\Penilaian;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penilaian::factory()->count(10)->create();
    }
}
