<?php
namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengurusController extends Controller
{
    public function index(): View
    {
        $semuaPengurus = Pengurus::where('is_active', true)->orderBy('jabatan', 'asc')->get();

        return view('pengurus.index', [
            'semuaPengurus' => $semuaPengurus,
        ]);
    }
}