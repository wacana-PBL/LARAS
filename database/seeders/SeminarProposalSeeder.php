<?php

namespace Database\Seeders;

use App\Models\Seminar_Proposal;
use Illuminate\Database\Seeder;

class SeminarProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seminar_Proposal::factory()->count(10)->create();
    }
}
