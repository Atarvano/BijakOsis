<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pengaturan;


class SiswaController extends Controller
{

    function index()
    {
        $user = Auth::guard('siswa')->user();
        $waktuPengumuman = Pengaturan::getWaktuPengumuman();
        $pengumumanReady = Pengaturan::isPengumumanReady();

        return view('siswa.siswa', compact('user', 'waktuPengumuman', 'pengumumanReady'));
    }
}
