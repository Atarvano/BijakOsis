<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranOsis;
use App\Models\Kelas;
use App\Models\SiswaSekolah;

class Pendaftaran extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('daftar', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|exists:siswa_sekolah,nisn',
            'no_hp' => 'required|string|max:15',
            'kelas' => 'required|string',
            'motivasi' => 'required|string|min:100',
        ]);

        $existing = PendaftaranOsis::where('nisn', $request->nisn)->first();
        if ($existing) {
            return back()->withErrors(['nisn' => 'NISN ini sudah pernah mendaftar.']);
        }

        $siswa = SiswaSekolah::where('nisn', $request->nisn)->first();

        PendaftaranOsis::create([
            'nama' => $siswa->nama,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas,
            'no_hp' => $request->no_hp,
            'motivasi' => $request->motivasi,
            'status' => 'pending',
        ]);

        return redirect('/daftar')->with('success', 'Pendaftaran berhasil!');
    }
}

