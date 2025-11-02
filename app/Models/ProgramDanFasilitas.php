<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDanFasilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_pendidikan',
        'fasilitas',
        'gambar',
        'gambar_fasilitas',
    ];
}