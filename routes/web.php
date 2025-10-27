<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\TokohSejarahController;
use App\Http\Controllers\ProgramFasilitasController;
use App\Http\Controllers\HomepageController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// Rute untuk menampilkan semua berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

// Rute untuk menampilkan satu berita berdasarkan slug-nya
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

// Rute untuk menampilkan semua galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// Rute untuk menampilkan semua pengurus
Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');


Route::get('/tokoh-sejarah', [TokohSejarahController::class, 'index'])->name('tokoh.sejarah.index');

Route::get('/program-fasilitas', [ProgramFasilitasController::class, 'index'])->name('program.index');