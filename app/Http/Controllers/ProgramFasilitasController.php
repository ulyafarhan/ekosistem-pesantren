<?php

namespace App\Http\Controllers;

use App\Models\ProgramDanFasilitas;
use Illuminate\Http\Request;

class ProgramFasilitasController extends Controller
{
    public function index()
    {
        $programs = ProgramDanFasilitas::where('jenis', 'program')->paginate(9);
        $fasilitas = ProgramDanFasilitas::where('jenis', 'fasilitas')->paginate(9);

        return view('program.index', compact('programs', 'fasilitas'));
    }
}