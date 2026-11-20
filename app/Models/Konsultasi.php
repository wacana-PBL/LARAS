<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['status_approval', 'tanggal_konsultasi', 'metode_konsultasi', 'catatan_progress', 'id_pengajuan', 'id_dosen'])]
class Konsultasi extends Model
{
    /** @use HasFactory<\Database\Factories\KonsultasiFactory> */
    use HasFactory;

    public function Pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id', 'id_pengajuan');
    }

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'id', 'id_dosen');
    }
}
