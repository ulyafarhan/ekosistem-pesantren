<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\HeroSlider;
use App\Models\ProgramDanFasilitas as Program;
use App\Models\Testimoni;
use App\Models\TokohSejarah;
use App\Models\PeriodePendaftaran;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function index(): View
    {
        $heroSliders = HeroSlider::where('is_active', true)
            ->whereNotNull('gambar')
            ->where('gambar', '!=', '')
            ->get()
            ->shuffle();

        $beritaTerbaru = Berita::whereNotNull('thumbnail')
            ->where('thumbnail', '!=', '')
            ->latest()
            ->take(3)
            ->get();

        $programUnggulan = Program::latest()->take(3)->get();

        $sejarahSingkat = TokohSejarah::orderBy('periode_jabatan', 'asc')->first();

        $galeriTerbaru = Galeri::whereNotNull('media')
            ->where('media', '!=', '')
            ->latest()
            ->take(3)
            ->get();

        // Logika untuk pendaftaran aktif
        $pendaftaranAktif = PeriodePendaftaran::where('tanggal_mulai', '<=', now())
            ->where('tanggal_selesai', '>=', now())
            ->with('kontakPanitia')
            ->first();

        // Mengambil testimoni secara acak
        $testimonis = Testimoni::where('is_active', true)->inRandomOrder()->take(3)->get();

        // Kirim semua data yang sudah bersih ke view
        return view('homepage', [
            'heroSliders' => $heroSliders,
            'beritaTerbaru' => $beritaTerbaru,
            'programUnggulan' => $programUnggulan,
            'sejarahSingkat' => $sejarahSingkat,
            'galeriTerbaru' => $galeriTerbaru,
            'pendaftaranAktif' => $pendaftaranAktif,
            'testimonis' => $testimonis,
        ]);
    }
}