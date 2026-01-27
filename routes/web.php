<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\MonitorController;

//the standalones...
Route::get('/profil', [UserController::class, 'profil'])->name('profil'); //go to profil
Route::get('/search', [UserController::class, 'search'])->name('search'); //search in general, mainly user
Route::get('/rekap/{user}', [AbsenController::class, 'show'])->name('rekap.show'); //rekap page for specific user
Route::get('/monitoring', [MonitorController::class, 'show'])->name('monitor.show'); //monitoring page

//loggers poggers
Route::get('/login', function () { return view('login'); });
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//resource path for adding or editing user or admin
Route::resource('user', UserController::class);
Route::resource('admin', UserController::class)->parameters(['admins' => 'id']);

//exports
Route::get('/users/export', [UserController::class, 'export'])->name('user.export');
Route::get('/rekap/{user}/export', [AbsenController::class, 'export'])->name('rekap.export');

//verifikasi nodes, maybe need some refacoctoring on that shit ass double check
Route::get('/verifikasi', [VerifikasiController::class, 'show'])->name('verifikasi.show');
Route::post('/verifikasi/diterima/{id}', [VerifikasiController::class, 'diterima'])->name('verifikasi.diterima');
Route::post('/verifikasi/ditolak/{id}', [VerifikasiController::class, 'ditolak'])->name('verifikasi.ditolak');