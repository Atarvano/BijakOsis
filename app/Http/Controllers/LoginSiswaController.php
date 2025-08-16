<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class LoginSiswaController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric',
        ]);

        $siswa = Siswa::where('nisn', $request->nisn)->first();

        if ($siswa) {
            // Simpan data siswa ke session
            session(['siswa' => $siswa]);

            return redirect()->route('dashboard')->with('success', 'Login berhasil, selamat datang ' . $siswa->nama);
        } else {
            return back()->withErrors(['nisn' => 'NISN tidak ditemukan']);
        }
    }

    public function logout()
    {
        session()->forget('siswa');
        return redirect()->route('login.form')->with('success', 'Berhasil logout');
    }
}

