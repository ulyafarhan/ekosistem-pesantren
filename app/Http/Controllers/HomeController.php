<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use App\Models\ProgramDanFasilitas;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function index(): View
    {
        $heroSliders = HeroSlider::all(); // Pastikan model HeroSlider ada
        return view('homepage', compact('heroSliders'));
    }
}