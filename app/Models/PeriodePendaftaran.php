<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class PeriodePendaftaran extends Model
{
    /** @use HasFactory<\Database\Factories\PeriodePendaftaranFactory> */
    use HasFactory;


    protected $fillable = ['tahun_ajaran', 'tanggal_buka', 'tanggal_tutup', 'status'];

    public function kontakPanitia(): HasMany
    {
        return $this->hasMany(KontakPanitia::class);
    }

    public function brosur(): HasOne
    {
        return $this->hasOne(Brosur::class);
    }
}