<?php

namespace Database\Seeders;

use App\Models\Detail_Penilaian;
use Illuminate\Database\Seeder;

class DetailPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detail_Penilaian::factory()->count(10)->create();
    }
}
