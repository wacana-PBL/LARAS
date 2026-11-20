<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id_dosen', 'id_pengajuan'])]
class Plotting_Dosen_Pengajuan extends Model
{
    /** @use HasFactory<\Database\Factories\PlottingDosenPengajuanFactory> */
    use HasFactory;

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
}
