<?php

namespace App\Http\Controllers;

use App\Models\ProgramDanFasilitas;
use Illuminate\Http\Request;

class ProgramFasilitasController extends Controller
{
    public function index()
    {
        $data = ProgramDanFasilitas::latest()->first();

        return view('program.index', compact('data'));
    }
}