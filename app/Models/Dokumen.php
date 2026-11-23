<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['pengunggah', 'kategori_dokumen', 'status_verifikasi', 'file_path', 'versi_dokumen', 'nama_file', 'id_pengajuan'])]
class Dokumen extends Model
{
    /** @use HasFactory<\Database\Factories\DokumenFactory> */
    use HasFactory;

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }
}
