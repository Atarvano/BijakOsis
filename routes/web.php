<?php

use App\Http\Controllers\pendaftaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginPendaftaranController;

Route::get('/', function () {
    return view('home');
});

Route::get('/daftar', [pendaftaran::class, 'index']);
Route::post('/daftar', [pendaftaran::class, 'store']);

Route::middleware('authos')->group(function () {
    Route::get('/dashboard', [LoginPendaftaranController::class, 'dashboard'])->name('dashboard');
});

Route::get('/login', [LoginPendaftaranController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginPendaftaranController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginPendaftaranController::class, 'logout'])->name('logout');

