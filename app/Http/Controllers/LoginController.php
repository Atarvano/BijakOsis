<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\PendaftaranOsis;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // 1. Login Guru -> username & password
        if ($request->has('username') && $request->has('password')) {
            $credentials = $request->only('username', 'password');

            if (Auth::guard('guru')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('guru.dashboard');
            }
        }

        // 2. Login Siswa -> nisn & no_hp
        if ($request->has('nisn') && $request->has('no_hp')) {
            $siswa = PendaftaranOsis::where('nisn', $request->nisn)
                ->where('no_hp', $request->no_hp)
                ->first();

            if ($siswa) {
                Auth::guard('siswa')->login($siswa);
                $request->session()->regenerate();
                return redirect()->route('siswa.dashboard');
            }
        }

        // Kalau gagal
        return back()->withErrors(['login' => 'Data login tidak valid.']);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        } elseif (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}