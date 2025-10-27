<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function index(): View
    {
        $semuaBerita = Berita::latest()->paginate(10);

        return view('berita.index', [
            'semuaBerita' => $semuaBerita
        ]);
    }

    public function show(Berita $berita): View
    {
        return view('berita.show', [
            'berita' => $berita
        ]);
    }
}