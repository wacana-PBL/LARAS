<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['id_dosen', 'id_pengajuan', 'role', 'status_plotting'])]
class Plotting_Dosen_Pengajuan extends Model
{
    /** @use HasFactory<\Database\Factories\Plotting_Dosen_PengajuanFactory> */
    use HasFactory;

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }
}
