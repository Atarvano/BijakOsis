<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SiswaController extends Controller
{

    function index()
    {
        $nama = Auth::guard('siswa')->user()->nama;
        return view('siswa.siswa', compact('nama'));
    }
}
