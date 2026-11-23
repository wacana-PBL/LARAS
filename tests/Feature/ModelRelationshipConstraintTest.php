<?php

namespace Tests\Feature;

use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Pengajuan;
use App\Models\Plotting_Dosen_Pengajuan;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelRelationshipConstraintTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_proposal_and_schedule_relations_follow_the_foreign_keys(): void
    {
        $mahasiswa = Mahasiswa::factory()->create();
        $pengajuan = Pengajuan::factory()->create(['id_mahasiswa' => $mahasiswa->id]);
        $jadwal = Jadwal::factory()->create(['id_pengajuan' => $pengajuan->id]);

        $mahasiswa->load('user', 'pengajuan');
        $jadwal->load('pengajuan.mahasiswa.user', 'dosen');

        $this->assertSame($mahasiswa->id_pengguna, $mahasiswa->user->id);
        $this->assertTrue($mahasiswa->pengajuan->sole()->is($pengajuan));
        $this->assertTrue($jadwal->pengajuan->is($pengajuan));
        $this->assertTrue($jadwal->pengajuan->mahasiswa->is($mahasiswa));
        $this->assertNotNull($jadwal->dosen);
    }

    public function test_plotting_assignment_cannot_be_duplicated_for_the_same_role(): void
    {
        $plotting = Plotting_Dosen_Pengajuan::factory()->create();

        try {
            Plotting_Dosen_Pengajuan::factory()->create([
                'id_dosen' => $plotting->id_dosen,
                'id_pengajuan' => $plotting->id_pengajuan,
                'peran_dosen' => $plotting->peran_dosen,
            ]);
            $this->fail('The database should reject a duplicate plotting assignment.');
        } catch (QueryException) {
            $this->assertDatabaseCount('plotting__dosen__pengajuans', 1);
        }
    }

    public function test_deleting_a_student_account_cascades_only_through_its_owned_records(): void
    {
        $mahasiswa = Mahasiswa::factory()->create();
        $pengajuan = Pengajuan::factory()->create(['id_mahasiswa' => $mahasiswa->id]);
        $jadwal = Jadwal::factory()->create(['id_pengajuan' => $pengajuan->id]);
        $otherMahasiswa = Mahasiswa::factory()->create();
        $otherPengajuan = Pengajuan::factory()->create(['id_mahasiswa' => $otherMahasiswa->id]);

        $mahasiswa->user->delete();

        $this->assertDatabaseMissing('mahasiswas', ['id' => $mahasiswa->id]);
        $this->assertDatabaseMissing('pengajuans', ['id' => $pengajuan->id]);
        $this->assertDatabaseMissing('jadwals', ['id' => $jadwal->id]);
        $this->assertDatabaseHas('pengajuans', ['id' => $otherPengajuan->id]);
    }
}
