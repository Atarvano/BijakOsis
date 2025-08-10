<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\pendaftaranosis;
use App\Models\Kelas;

class pendaftaran extends Controller
{
    public function index()
    {
        $kelas = Kelas::pluck('nama');
        return view('daftar', compact('kelas'));
    }

    public function store()
    {
    }
}
