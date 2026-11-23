<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['kuota_bimbingan', 'nama_dosen', 'id_pengguna'])]
class Dosen extends Model
{
    /** @use HasFactory<\Database\Factories\DosenFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }

    public function plotting_dosen_pengajuan(): HasMany
    {
        return $this->hasMany(Plotting_Dosen_Pengajuan::class, 'id_dosen', 'id');
    }

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_dosen', 'id');
    }

    public function konsultasi(): HasMany
    {
        return $this->hasMany(Konsultasi::class, 'id_dosen', 'id');
    }
}
