<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\HeroSlider;
use App\Models\PeriodePendaftaran;
use App\Models\ProgramDanFasilitas;
use App\Models\SejarahUnitPendidikan;
use App\Models\Testimoni;
use App\Models\TokohSejarah;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomepageController extends Controller
{
    public function index()
    {
        // 1. Data untuk Hero Slider
        $heroSliders = HeroSlider::where('is_active', true)->orderBy('order', 'asc')->get();

        // 2. Data untuk Pengumuman Pendaftaran
        $pendaftaranAktif = PeriodePendaftaran::with('kontakPanitia')
            ->where('tanggal_mulai', '<=', Carbon::now())
            ->where('tanggal_selesai', '>=', Carbon::now())
            ->first();

        // 3. Data untuk Program Unggulan (ambil 3 yang terbaru)
        $programUnggulan = ProgramDanFasilitas::where('jenis', 'program')
            ->latest()
            ->take(3)
            ->get();

        // 4. Data untuk Berita Terbaru (ambil 3 berita)
        $beritaTerbaru = Berita::latest()->take(3)->get();

        // 5. Data untuk Sejarah Singkat (ambil dari unit SMA sebagai default)
        $sejarahSingkat = SejarahUnitPendidikan::where('nama_unit', 'SMA')
            ->first();

        // 6. Data untuk Galeri Terbaru (ambil 6 foto)
        $galeriTerbaru = Galeri::latest()->take(6)->get();

        // 7. Data untuk Testimoni (ambil 3 testimoni)
        $testimonis = Testimoni::latest()->take(3)->get();

        $tokohTerkemuka = TokohSejarah::latest()->take(3)->get();

        return view('homepage', compact(
            'heroSliders',
            'pendaftaranAktif',
            'programUnggulan',
            'beritaTerbaru',
            'sejarahSingkat',
            'galeriTerbaru',
            'testimonis',
            'tokohTerkemuka'
        ));
    }
}