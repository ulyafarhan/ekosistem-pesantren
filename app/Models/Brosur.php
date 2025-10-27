<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brosur extends Model
{
    protected $fillable = [
        'periode_pendaftaran_id',
        'sejarah',
        'visi_misi',
        'kurikulum_formal',
        'kurikulum_non_formal',
        'jadwal_kbm',
        'biaya',
    ];
}