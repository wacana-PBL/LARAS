<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['id_pengajuan', 'tanggal_jadwal', 'waktu_mulai', 'waktu_selesai', 'lokasi_jadwal', 'id_dosen'])]
class Jadwal extends Model
{
    /** @use HasFactory<\Database\Factories\JadwalFactory> */
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
