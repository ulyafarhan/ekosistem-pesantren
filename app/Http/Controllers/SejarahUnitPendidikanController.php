<?php

namespace App\Http\Controllers;

use App\Models\SejarahUnitPendidikan;
use Illuminate\Http\Request;

class SejarahUnitPendidikanController extends Controller
{
    public function index()
    {
        $sejarahSmp = SejarahUnitPendidikan::whereNotNull('sejarah_smp')->latest()->first();
        $sejarahSma = SejarahUnitPendidikan::whereNotNull('sejarah_sma')->latest()->first();

        return view('sejarah.index', compact('sejarahSmp', 'sejarahSma'));
    }
}