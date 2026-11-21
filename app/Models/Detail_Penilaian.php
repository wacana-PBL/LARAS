<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id_penilaian', 'id_pengajuan', 'nilai_skor', 'catatan_revisi', 'jenis_penilaian', 'id_dosen'])]

class Detail_Penilaian extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPenilaianFactory> */
    use HasFactory;

    public function Dosen()
    {
        return $this->hasOne(Dosen::class, 'id', 'id_dosen');
    }

    public function Pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id', 'id_pengajuan');
    }

    public function Penilaian()
    {
        return $this->hasOne(Penilaian::class, 'id', 'id_penilaian');
    }
}
