<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ManagesFileUploads;

class Pengurus extends Model
{
    /** @use HasFactory<\Database\Factories\PengurusFactory> */
    use HasFactory , ManagesFileUploads;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'foto',
        'biografi_singkat',
    ];

    protected $fileFields = ['foto'];
}
