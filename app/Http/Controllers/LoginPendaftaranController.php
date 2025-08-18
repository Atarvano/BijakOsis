<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftaranosis;
use Illuminate\Support\Facades\Hash;

class LoginPendaftaranController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric',
            'no_hp' => 'required|numeric',
        ]);

        $user = pendaftaranosis::where('nisn', $request->nisn)
            ->where('no_hp', $request->no_hp)
            ->first();

        if (!$user) {
            return back()->with('error', 'NISN atau No HP salah.');
        }

        // Simpan session
        $request->session()->put('pendaftaran_id', $user->id);
        $request->session()->put('pendaftaran_nama', $user->nama);

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.form')->with('success', 'Logout berhasil!');
    }
}
