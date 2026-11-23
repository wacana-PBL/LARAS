<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['id_penilaian', 'id_pengajuan', 'nilai_skor', 'catatan_revisi', 'jenis_penilaian', 'id_dosen'])]

class Detail_Penilaian extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPenilaianFactory> */
    use HasFactory;

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }

    public function penilaian(): BelongsTo
    {
        return $this->belongsTo(Penilaian::class, 'id_penilaian', 'id');
    }
}
