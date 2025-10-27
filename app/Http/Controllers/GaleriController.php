<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GaleriController extends Controller
{
    public function index(): View
    {
        $semuaGaleri = Galeri::latest()->paginate(12);

        return view('galeri.index', [
            'semuaGaleri' => $semuaGaleri,
        ]);
    }
}