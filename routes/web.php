<?php

use App\Http\Controllers\pendaftaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginSiswaController;

Route::get('/', function () {
    return view('home');
});

Route::get('/daftar', [pendaftaran::class, 'index']);
Route::post('/daftar', [pendaftaran::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboardsiswa', ['nama' => 'John Doe', 'kelas' => '10A']);
});

Route::get('/login', [LoginSiswaController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginSiswaController::class, 'login'])->name('login.process');
Route::get('/logout', [LoginSiswaController::class, 'logout'])->name('logout');

