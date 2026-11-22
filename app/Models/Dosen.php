<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['kuota_bimbingan', 'nama_dosen', 'id_pengguna'])]
class Dosen extends Model
{
    /** @use HasFactory<\Database\Factories\DosenFactory> */
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'id', 'id_pengguna');
    }

    public function plotting_dosen_pengajuan()
    {
        return $this->hasOne(Plotting_Dosen_Pengajuan::class, 'id_dosen', 'id');
    }

    public function Jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_dosen', 'id');
    }

    public function Konsultasi()
    {
        return $this->belongsTo(Konsultasi::class, 'id_dosen', 'id');
    }
}
