<?php

namespace Database\Seeders;

use App\Models\Plotting_Dosen_Pengajuan;
use Illuminate\Database\Seeder;

class PlottingDosenPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plotting_Dosen_Pengajuan::factory()->count(10)->create();
    }
}
