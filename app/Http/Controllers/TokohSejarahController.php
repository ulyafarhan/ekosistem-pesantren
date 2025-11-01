<?php

namespace App\Http\Controllers;

use App\Models\TokohSejarah;
use App\Models\SejarahUnitPendidikan;
use Illuminate\Http\Request;

class TokohSejarahController extends Controller
{
    public function index()
    {
        $tokohs = TokohSejarah::orderBy('urutan', 'asc')->get();
        
        $sejarahData = SejarahUnitPendidikan::latest()->first();

        $sejarahSmp = $sejarahData ? $sejarahData : null;
        $sejarahSma = $sejarahData ? $sejarahData : null;

        return view('tokoh_sejarah.index', compact('tokohs', 'sejarahSmp', 'sejarahSma'));
    }

    public function showSejarah($unit)
    {
        $sejarah = SejarahUnitPendidikan::latest()->first();

        if (!$sejarah) {
            abort(404);
        }

        $title = '';
        $content = '';

        if ($unit === 'smp' && $sejarah->sejarah_smp) {
            $title = 'Jejak Langkah: Berdirinya SMP Pesantren Pusat';
            $content = $sejarah->sejarah_smp;
        } elseif ($unit === 'sma' && $sejarah->sejarah_sma) {
            $title = 'Tonggak Sejarah: Berdirinya SMA Pesantren Pusat';
            $content = $sejarah->sejarah_sma;
        } else {
            abort(404);
        }

        return view('tokoh_sejarah.show_sejarah', compact('title', 'content'));
    }
}