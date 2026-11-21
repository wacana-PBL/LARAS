<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['pengunggah', 'kategori_dokumen', 'status_verifikasi', 'file_path', 'versi_dokumen', 'nama_file', 'id_pengajuan'])]
class Dokumen extends Model
{
    /** @use HasFactory<\Database\Factories\DokumenFactory> */
    use HasFactory;

    public function Pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id', 'id_pengajuan');
    }
}
