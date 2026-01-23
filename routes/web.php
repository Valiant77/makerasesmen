<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\VerifikasiController;

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/login', function () { return view('login'); });
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('user', UserController::class);
Route::resource('admin', UserController::class)->parameters(['admins' => 'id']);

Route::get('/rekap/{user}', [AbsenController::class, 'show'])->name('rekap.show');

Route::get('/search', [UserController::class, 'search'])->name('search');

Route::get('/verifikasi', [VerifikasiController::class, 'show'])->name('verifikasi.show');
Route::post('/verifikasi/diterima/{id}', [VerifikasiController::class, 'diterima'])->name('verifikasi.diterima');
Route::post('/verifikasi/ditolak/{id}', [VerifikasiController::class, 'ditolak'])->name('verifikasi.ditolak');

// Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
// Route::post('/user', [UserController::class, 'store'])->name('user.store');
// Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');