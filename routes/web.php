<?php
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProgramFasilitasController;
use App\Http\Controllers\TokohSejarahController;
use Illuminate\Support\Facades\Route;

// Mengarahkan halaman utama ke HomepageController
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// Rute untuk Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

// Rute untuk Galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// Rute untuk Pengurus
Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');

// Rute untuk Tokoh Sejarah
Route::get('/tokoh-sejarah', [TokohSejarahController::class, 'index'])->name('tokoh.sejarah.index');

// Rute untuk Program & Fasilitas
// Tambahkan rute baru untuk /program
Route::get('/program', [ProgramFasilitasController::class, 'index']);

// Atau ubah rute yang ada menjadi:
Route::get('/program', [ProgramFasilitasController::class, 'index'])->name('program.index');