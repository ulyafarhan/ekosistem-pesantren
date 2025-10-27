<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ManagesFileUploads;

class Galeri extends Model
{
    /** @use HasFactory<\Database\Factories\GaleriFactory> */
    use HasFactory, ManagesFileUploads;


    protected $fillable = [
        'judul', 
        'deskripsi', 
        'file_media', 
        'tipe',
    ];

    protected $casts = [
        'file_media' => 'array',
    ];

    protected $fileFields = ['file_media'];
}