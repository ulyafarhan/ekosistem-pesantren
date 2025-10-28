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
        $sejarahSmp = SejarahUnitPendidikan::where('nama_unit', 'SMP')->first();
        $sejarahSma = SejarahUnitPendidikan::where('nama_unit', 'SMA')->first();

        return view('tokoh_sejarah.index', compact('tokohs', 'sejarahSmp', 'sejarahSma'));
    }
}