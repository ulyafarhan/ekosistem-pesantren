<?php

namespace App\Http\Controllers;

use App\Models\ProgramDanFasilitas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramFasilitasController extends Controller
{
    public function index(): View
    {
        $semuaProgram = ProgramDanFasilitas::whereNotNull('program_pendidikan')->latest()->paginate(6);
        $semuaFasilitas = ProgramDanFasilitas::whereNotNull('fasilitas')->latest()->paginate(6);

        return view('program.index', [
            'semuaProgram' => $semuaProgram,
            'semuaFasilitas' => $semuaFasilitas,
        ]);
    }
}