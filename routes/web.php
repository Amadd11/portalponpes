<?php

use App\Models\FAQ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengumumanController;

Route::get('/', [FrontController::class, 'index'])->name('front.landingpage');
Route::get('/search', [FrontController::class, 'search'])->name('search');

Route::get('/sejarah', [SejarahController::class, 'index'])->name('profil.sejarah');
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('profil.fasilitas');
Route::get('/visimisi', [VisimisiController::class, 'index'])->name('profil.visimisi');

Route::get('/brosur', [BrosurController::class, 'index'])->name('brosur.index');

Route::get('/informasi-pendaftaran', [PendaftaranController::class, 'index'])->name('informasi.pendaftaran');
Route::get('/artikel-kajian', [BeritaController::class, 'index'])->name('informasi.artikel.index');
Route::get('/artikel-kajian/{slug}', [BeritaController::class, 'show'])->name('informasi.artikel.show');
Route::get('/lembaga/{slug}', [FrontController::class, 'showLembaga'])->name('lembaga.show');
Route::get('/pengumuman/{slug}', [FrontController::class, 'showPengumuman'])->name('pengumuman.show');
Route::get('/cabang/{slug}', [FrontController::class, 'showCabang'])->name('lembaga.cabang.details');
Route::get('/program/{slug}', [FrontController::class, 'showProgram'])->name('program.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.foto');
Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');
Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik.index');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('informasi.pengumuman');
