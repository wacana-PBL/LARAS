<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id_pengajuan', 'tanggal_jadwal', 'waktu_mulai', 'waktu_selesai', 'lokasi_jadwal', 'id_dosen'])]
class Jadwal extends Model
{
    /** @use HasFactory<\Database\Factories\JadwalFactory> */
    use HasFactory;

    public function Pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'id', 'id_pengajuan');
    }

    public function Dosen()
    {
        return $this->hasMany(Dosen::class, 'id', 'id_dosen');
    }
}
