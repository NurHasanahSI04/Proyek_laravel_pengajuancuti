<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JatahcutiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengajuancutiController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profil', [DashboardController::class, 'profil'])->name('dashboard.profil');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/divisi/create', [DivisiController::class, 'create'])->name('divisi.create');
    Route::post('/divisi/store', [DivisiController::class, 'store'])->name('divisi.store');
    Route::delete('/divisi/{id}', [DivisiController::class, 'destroy'])->name('divisi.destroy');
    Route::get('/divisi/{id}/edit', [DivisiController::class, 'edit'])->name('divisi.edit');
    Route::put('/divisi/{id}/update', [DivisiController::class, 'update'])->name('divisi.update');

    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');

    Route::get('/jatahcuti/create', [JatahcutiController::class, 'create'])->name('jatahcuti.create');
    Route::post('/jatahcuti/store', [JatahcutiController::class, 'store'])->name('jatahcuti.store');
    Route::delete('/jatahcuti/{id}', [JatahcutiController::class, 'destroy'])->name('jatahcuti.destroy');
    Route::get('/jatahcuti/{id}/edit', [JatahcutiController::class, 'edit'])->name('jatahcuti.edit');
    Route::put('/jatahcuti/{id}/update', [JatahcutiController::class, 'update'])->name('jatahcuti.update');

    Route::get('/pengajuancuti/create', [PengajuancutiController::class, 'create'])->name('pengajuancuti.create');
    Route::post('/pengajuancuti/store', [PengajuancutiController::class, 'store'])->name('pengajuancuti.store');
    Route::delete('/pengajuancuti/{id}', [PengajuancutiController::class, 'destroy'])->name('pengajuancuti.destroy');
    Route::get('/pengajuancuti/{id}/edit', [PengajuancutiController::class, 'edit'])->name('pengajuancuti.edit');
    Route::put('/pengajuancuti/{id}/update', [PengajuancutiController::class, 'update'])->name('pengajuancuti.update');
});


Route::get('/', [IndexController::class, 'index'])->name('/index');
Route::post('/', [IndexController::class, 'store'])->name('/');

Route::get('/divisi', [DivisiController::class, 'show'])->name('divisi');
Route::get('/divisi/{id}', [DivisiController::class, 'view'])->name('divisi.view');

Route::get('/pegawai', [PegawaiController::class, 'show'])->name('pegawai');
Route::get('/pegawai/{id}', [PegawaiController::class, 'view'])->name('pegawai.view');


Route::get('/jatahcuti', [JatahcutiController::class, 'show'])->name('jatahcuti');
Route::get('/jatahcuti/{id}', [JatahcutiController::class, 'view'])->name('jatahcuti.view');

Route::get('/pengajuancuti', [PengajuancutiController::class, 'show'])->name('pengajuancuti');
Route::get('/pengajuancuti/{id}', [PengajuancutiController::class, 'view'])->name('pengajuancuti.view');

