<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SejarahUnitPendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'sejarah_smp',
        'sejarah_sma',
    ];
    //
}