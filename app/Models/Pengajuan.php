<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'semester',
    'status_pengajuan',
    'judul_penelitian',
    'jenis_pengajuan',
    'id_mahasiswa',
    'tahun_ajaran',
    'usulan_dosen_pembimbing'])]
class Pengajuan extends Model
{
    /** @use HasFactory<\Database\Factories\PengajuanFactory> */
    use HasFactory;


    public function detail_penilaian(): HasMany
    {
        return $this->hasMany(Detail_Penilaian::class, 'id_pengajuan', 'id');
    }
    public function plotting_dosen_pengajuan(): HasMany
    {
        return $this->hasMany(Plotting_Dosen_Pengajuan::class, 'id_pengajuan', 'id');
    }
    public function konsultasi(): HasMany
    {
        return $this->hasMany(Konsultasi::class, 'id_pengajuan', 'id');
    }
    public function jadwal(): HasOne
    {
        return $this->hasOne(Jadwal::class, 'id_pengajuan', 'id');
    }
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function seminar_proposal(): HasOne
    {
        return $this->hasOne(Seminar_Proposal::class, 'id_pengajuan', 'id');
    }
    public function skripsi(): HasOne
    {
        return $this->hasOne(Skripsi::class, 'id_pengajuan', 'id');
    }
    public function dokumen(): HasMany
    {
        return $this->hasMany(Dokumen::class, 'id_pengajuan', 'id');
    }
}
