<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\PeriodePendaftaran;
use App\Models\ProgramDanFasilitas;
use App\Models\SejarahUnitPendidikan;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function index(): View
    {
        $heroSliders = HeroSlider::where('is_active', true)
            ->whereNotNull('gambar') // <-- KUNCI PERBAIKAN
            ->get()
            ->shuffle();
        // Ambil 3 berita terbaru untuk ditampilkan
        $beritaTerbaru = Berita::latest()->take(3)->get();

        // Ambil 3 program/fasilitas unggulan (bisa disesuaikan)
        $programUnggulan = ProgramDanFasilitas::where('tipe', 'program')->take(3)->get();

        // Ambil sejarah singkat (misalnya dari unit SMP)
        $sejarahSingkat = SejarahUnitPendidikan::find(1); // Asumsi ID 1 adalah untuk Sejarah Umum/SMP

        // Logika untuk pendaftaran aktif tetap sama
        $pendaftaranAktif = PeriodePendaftaran::where('tanggal_mulai', '<=', now())
            ->where('tanggal_selesai', '>=', now())
            ->with('kontakPanitia')
            ->first();

        // Kirim semua data ke view
        return view('homepage', [
            'heroSliders' => $heroSliders,
            'beritaTerbaru' => $beritaTerbaru,
            'programUnggulan' => $programUnggulan,
            'sejarahSingkat' => $sejarahSingkat,
            'pendaftaranAktif' => $pendaftaranAktif,
        ]);
    }
}