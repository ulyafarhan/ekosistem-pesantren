<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ManagesFileUploads;

class TokohSejarah extends Model
{
    /** @use HasFactory<\Database\Factories\TokohSejarahFactory> */
    use HasFactory, ManagesFileUploads;


    protected $fillable = [
        'nama_lengkap', 
        'periode_jabatan', 
        'foto', 
        'kisah_historis'
    ];

    protected $fileFields = ['foto'];
}
