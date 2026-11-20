<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    /** @use HasFactory<\Database\Factories\PenilaianFactory> */
    use HasFactory;

    public function Detail_Penilaian()
    {
        return $this->belongsTo(Detail_Penilaian::class, 'id_penilaian', 'id');
    }
}
