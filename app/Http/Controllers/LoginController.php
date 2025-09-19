<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersGuru;
use App\Models\PendaftaranOsis;

class LoginController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Ambil data dari form
        $input1 = $request->field1; // NISN atau Username
        $input2 = $request->field2; // No HP atau Password

        // Cek jika ada field yang kosong
        if (!$input1 || !$input2) {
            return back()->with('error', 'Silakan isi kedua field!');
        }

        // Jika input1 adalah angka = Login Siswa
        if (is_numeric($input1)) {
            // Cari siswa berdasarkan NISN dan No HP
            $siswa = PendaftaranOsis::where('nisn', $input1)
                ->where('no_hp', $input2)
                ->first();

            if ($siswa) {
                // Login berhasil
                Auth::guard('siswa')->login($siswa);
                return redirect()->route('siswa.dashboard')
                    ->with('success', 'Login berhasil! Selamat datang ' . $siswa->nama_lengkap);
            } else {
                // Login gagal
                return back()->with('error', 'NISN atau No HP salah!');
            }
        } else {
            if (Auth::guard('guru')->attempt(['username' => $input1, 'password' => $input2])) {
                // Login berhasil
                $guru = Auth::guard('guru')->user();
                return redirect()->route('guru.dashboard')
                    ->with('success', 'Login berhasil! Selamat datang ' . $guru->nama);
            } else {
                // Login gagal
                return back()->with('error', 'Username atau Password salah!');
            }
        }
    }


    public function logout(Request $request)
    {
        // Logout dari semua guard
        Auth::guard('guru')->logout();
        Auth::guard('siswa')->logout();

        // Hapus session
        $request->session()->flush();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}