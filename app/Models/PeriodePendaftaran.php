<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class PeriodePendaftaran extends Model
{
    /** @use HasFactory<\Database\Factories\PeriodePendaftaranFactory> */
    use HasFactory;


    protected $fillable = ['tahun_ajaran', 'tanggal_mulai', 'tanggal_selesai', 'is_active'];

    public function kontakPanitia(): HasMany
    {
        return $this->hasMany(KontakPanitia::class);
    }
}