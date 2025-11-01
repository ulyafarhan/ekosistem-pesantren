<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProgramFasilitasController;
use App\Http\Controllers\TokohSejarahController; 
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');

Route::get('/tokoh-sejarah', [TokohSejarahController::class, 'index'])->name('tokoh.sejarah.index');

Route::get('/program', [ProgramFasilitasController::class, 'index']);
Route::get('/program', [ProgramFasilitasController::class, 'index'])->name('program.index');

Route::get('/sejarah/{unit}', [TokohSejarahController::class, 'showSejarah'])->name('sejarah.show');