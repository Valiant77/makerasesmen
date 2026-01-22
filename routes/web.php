<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/login', function () { return view('login'); });
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::resource('user', UserController::class);

// Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
// Route::post('/user', [UserController::class, 'store'])->name('user.store');
// Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');