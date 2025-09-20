<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class SiswaController extends Controller
{

    function index()
    {
        $user = Auth::guard('siswa')->user();
        return view('siswa.siswa', compact('user'));
    }
}
