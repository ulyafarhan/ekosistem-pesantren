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
        $heroSliders = HeroSlider::where('is_active', true)->orderBy('created_at', 'desc')->get();

        $pendaftaranAktif = PeriodePendaftaran::with(['kontakPanitia', 'brosur'])
            ->where('status', 'dibuka')
            ->where('tanggal_buka', '<=', Carbon::now())
            ->where('tanggal_tutup', '>=', Carbon::now())
            ->first();

        $programDanFasilitas = ProgramDanFasilitas::latest()->first();
        $beritaTerbaru = Berita::latest()->take(3)->get();
        $sejarahSingkat = SejarahUnitPendidikan::latest()->first();
        $galeriTerbaru = Galeri::latest()->take(3)->get();
        $testimonis = Testimoni::where('is_active', true)->latest()->take(3)->get();
        $tokohTerkemuka = TokohSejarah::latest()->take(3)->get();
        $statistics = [
            ['target' => 10, 'display' => '10+', 'label' => 'Tahun Pengalaman'],
            ['target' => 1000, 'display' => '1000+', 'label' => 'Alumni Berprestasi'],
            ['target' => 50, 'display' => '50+', 'label' => 'Tenaga Pendidik'],
            ['target' => 95, 'display' => '95%', 'label' => 'Kepuasan Wali Santri']
        ];

        return view('homepage', compact(
            'heroSliders',
            'pendaftaranAktif',
            'programDanFasilitas',
            'beritaTerbaru',
            'sejarahSingkat',
            'galeriTerbaru',
            'testimonis',
            'tokohTerkemuka',
            'statistics'
        ));
    }
}