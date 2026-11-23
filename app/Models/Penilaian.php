<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penilaian extends Model
{
    /** @use HasFactory<\Database\Factories\PenilaianFactory> */
    use HasFactory;

    public function detail_penilaian(): HasMany
    {
        return $this->hasMany(Detail_Penilaian::class, 'id_penilaian', 'id');
    }
}
