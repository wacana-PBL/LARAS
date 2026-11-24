<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama_mahasiswa', 'id_pengguna', 'nim', 'program_studi'])]
class Mahasiswa extends Model
{
    /** @use HasFactory<\Database\Factories\MahasiswaFactory> */
    use HasFactory;

    public function pengajuan(): HasMany
    {
        return $this->hasMany(Pengajuan::class, 'id_mahasiswa', 'id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }
}
