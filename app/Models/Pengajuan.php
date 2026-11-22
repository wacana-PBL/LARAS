<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


        public function Detail_penilaian()
    {
        return $this->hasOne(Detail_Penilaian::class, 'id_pengajuan', 'id');
    }
    public function Plotting_Dosen_Pengajuan()
    {
        return $this->hasOne(Plotting_Dosen_Pengajuan::class, 'id_pengajuan', 'id');
    }
    public function Konsultasi()
    {
        return $this->hasOne(Konsultasi::class, 'id_pengajuan', 'id');
    }
    public function Jadwal()
    {
        return $this->hasOne(Jadwal::class, 'id_pengajuan', 'id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id', 'id_mahasiswa');
    }

    public function Seminar_Propopsal()
    {
        return $this->hasOne(Seminar_Proposal::class, 'id_pengajuan', 'id');
    }
    public function Skripsi()
    {
        return $this->hasOne(Skripsi::class, 'id_pengajuan', 'id');
    }
    public function Dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_pengajuan', 'id');
    }
}
