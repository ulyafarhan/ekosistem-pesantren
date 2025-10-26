<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ManagesFileUploads;

class Berita extends Model
{
    /** @use HasFactory<\Database\Factories\BeritaFactory> */
    use HasFactory, ManagesFileUploads;


    protected $fillable = [
        'judul', 
        'slug', 
        'gambar_utama', 
        'isi_konten', 
        'status'
    ];

    protected $fileFields = ['gambar_utama'];
}
