<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_mahasiswa', 'id_pengguna', 'nim', 'program_studi'])]
class Mahasiswa extends Model
{
    /** @use HasFactory<\Database\Factories\MahasiswaFactory> */
    use HasFactory;

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'id_mahasiswa', 'id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id', 'id_pengguna');
    }
}
