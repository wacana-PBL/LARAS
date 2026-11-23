<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['status_approval', 'tanggal_konsultasi', 'metode_konsultasi', 'catatan_progress', 'id_pengajuan', 'id_dosen'])]
class Konsultasi extends Model
{
    /** @use HasFactory<\Database\Factories\KonsultasiFactory> */
    use HasFactory;

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
}
