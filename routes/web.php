<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\pendaftaran;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Guru\DashboardController;
use App\Models\PendaftaranOsis;

Route::get('/', function () {
    return view('home');
});

Route::get('/daftar', [pendaftaran::class, 'index']);
Route::post('/daftar', [pendaftaran::class, 'store']);




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Dashboard Siswa
Route::middleware('auth:siswa')->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
});



Route::middleware('auth:guru')->prefix('guru')->group(function () {

    // dashboard utama
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('guru.dashboard');

    // halaman detail pendaftar
    Route::get('/dashboard/pendaftar/{id}', [DashboardController::class, 'show'])
        ->name('guru.pendaftar.detail');

    // update status (accept / reject)
    Route::post('/dashboard/pendaftar/{id}/status', [DashboardController::class, 'updateStatus'])
        ->name('guru.pendaftar.status');

    // filter by minimum grade
    Route::post('/dashboard/filter-grade', [DashboardController::class, 'filterByGrade'])
        ->name('guru.filter.grade');

    // delete all pendaftar
    Route::delete('/dashboard/delete-all', [DashboardController::class, 'deleteAll'])
        ->name('guru.delete.all');

    // set waktu pengumuman
    Route::post('/dashboard/set-waktu-pengumuman', [DashboardController::class, 'setWaktuPengumuman'])
        ->name('guru.set.waktu.pengumuman');

    // logout
    Route::post('/logout', [DashboardController::class, 'logout'])
        ->name('guru.logout');

});
