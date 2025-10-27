<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\PeriodePendaftaran;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function index(): View
    {
        $beritaTerbaru = Berita::latest()->take(3)->get();
        $galeriTerbaru = Galeri::latest()->take(4)->get();

        // Ambil periode pendaftaran yang sedang aktif
        $pendaftaranAktif = PeriodePendaftaran::where('tanggal_mulai', '<=', now())
            ->where('tanggal_selesai', '>=', now())
            ->with('kontakPanitia') 
            ->first();

        return view('homepage', [
            'beritaTerbaru' => $beritaTerbaru,
            'galeriTerbaru' => $galeriTerbaru,
            'pendaftaranAktif' => $pendaftaranAktif,
        ]);
    }
}