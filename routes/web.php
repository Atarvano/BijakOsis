<?php

use App\Http\Controllers\pendaftaran;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/daftar', [pendaftaran::class, 'index']);
Route::post('/daftar', [pendaftaran::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboardsiswa', ['nama' => 'John Doe', 'kelas' => '10A']);
});

