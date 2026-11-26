<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['waktu_mulai', 'lokasi_ruangan', 'tanggal_sidang', 'waktu_selesai', 'id_pengajuan'])]

class Seminar_Proposal extends Model
{
    /** @use HasFactory<\Database\Factories\Seminar_ProposalFactory> */
    use HasFactory;

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }
}
