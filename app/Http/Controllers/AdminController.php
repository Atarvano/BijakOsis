<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranOsis;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan daftar pendaftar
    public function index()
    {
        $pendaftar = PendaftaranOsis::with('kelas')->get();
        return view('admin', compact('pendaftar'));
    }

    // Menerima siswa
    public function accept($id)
    {
        $pendaftar = PendaftaranOsis::findOrFail($id);
        $pendaftar->status = 'accepted';
        $pendaftar->save();

        return redirect()->back()->with('success', 'Siswa diterima!');
    }

    // Menolak siswa
    public function reject($id)
    {
        $pendaftar = PendaftaranOsis::findOrFail($id);
        $pendaftar->status = 'rejected';
        $pendaftar->save();

        return redirect()->back()->with('success', 'Siswa ditolak!');
    }
}
