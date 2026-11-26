<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Data contoh agar admin dapat mencoba plotting dosen setelah menjalankan db:seed.
     */
    public function run(): void
    {
        $dosens = [
            ['nama_dosen' => 'Mera Kartika Delimayanti, S.Si., M.T., Ph.D.', 'nidn' => '0015087301', 'kuota_bimbingan' => 4],
            ['nama_dosen' => 'Dr. Anita Hidayati, S.Kom., M.Kom.', 'nidn' => '0023107602', 'kuota_bimbingan' => 5],
            ['nama_dosen' => 'Dr. Hata Maulana, S.Si., M.T.', 'nidn' => '0012077803', 'kuota_bimbingan' => 3],
            ['nama_dosen' => 'Bambang Warsuta, S.Kom., M.T.I.', 'nidn' => '0019057504', 'kuota_bimbingan' => 4],
            ['nama_dosen' => 'Dewi Anggraini, S.Kom., M.Kom.', 'nidn' => '0021088205', 'kuota_bimbingan' => 3],
        ];

        foreach ($dosens as $data) {
            $dosen = Dosen::where('nidn', $data['nidn'])->first();

            if ($dosen) {
                $dosen->update($data);
                continue;
            }

            $user = User::firstOrCreate(
                ['email' => $data['nidn'].'@laras.test'],
                ['role' => 'dosen', 'password' => 'password'],
            );

            Dosen::create($data + ['id_pengguna' => $user->id]);
        }
    }
}
