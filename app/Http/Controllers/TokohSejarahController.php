<?php

namespace App\Http\Controllers;

use App\Models\TokohSejarah;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TokohSejarahController extends Controller
{
    public function index(): View
    {
        $semuaTokoh = TokohSejarah::orderBy('periode_jabatan', 'asc')->get();

        return view('tokoh_sejarah.index', [
            'semuaTokoh' => $semuaTokoh,
        ]);
    }
}