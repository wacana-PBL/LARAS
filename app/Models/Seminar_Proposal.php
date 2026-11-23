<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['waktu_mulai', 'lokasi_ruangan', 'tanggal_sidang', 'waktu_selesai', 'id_pengajuan'])]

class Seminar_Proposal extends Model
{
    /** @use HasFactory<\Database\Factories\Seminar_ProposalFactory> */
    use HasFactory;

    public function Pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id', 'id_pengajuan');
    }
}
