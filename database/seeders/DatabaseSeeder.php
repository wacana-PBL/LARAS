<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'dosen',
            'password'=> '12345',
        ]);

        $this->call([
            MahasiswaSeeder::class,
            DosenSeeder::class,
            PenilaianSeeder::class,
            PengajuanSeeder::class,
            PlottingDosenPengajuanSeeder::class,
            KonsultasiSeeder::class,
            JadwalSeeder::class,
            SeminarProposalSeeder::class,
            SkripsiSeeder::class,
            DokumenSeeder::class,
            DetailPenilaianSeeder::class,
        ]);
    }
}
