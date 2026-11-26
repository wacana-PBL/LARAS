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
        $roles = ['pembimbing', 'penguji 1', 'penguji 2', 'penguji 3'];
        $pengajuans = \App\Models\Pengajuan::all();
        $dosens = \App\Models\Dosen::all();

        foreach ($pengajuans as $pengajuan) {
            foreach (array_slice($roles, 0, min(count($roles), $dosens->count())) as $index => $role) {
                Plotting_Dosen_Pengajuan::firstOrCreate(
                    ['id_pengajuan' => $pengajuan->id, 'role' => $role],
                    ['id_dosen' => $dosens->get(($pengajuan->id + $index) % $dosens->count())->id, 'status_plotting' => 'pending'],
                );
            }
        }
    }
}
