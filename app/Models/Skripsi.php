<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['waktu_mulai', 'waktu_selesai', 'id_pengajuan', 'lokasi_ruangan', 'tanggal_sidang'])]
class Skripsi extends Model
{
    /** @use HasFactory<\Database\Factories\SkripsiFactory> */
    use HasFactory;

    public function Pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id', 'id_pengajuan');
    }
}
