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
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nisn.exists' => 'NISN tidak ditemukan di sekolah.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.integer' => 'Nomor HP harus berupa angka.',
            'motivasi.min' => 'Motivasi minimal 100 karakter.',
        ]);

        // Cek apakah NISN sudah pernah mendaftar
        $existing = PendaftaranOsis::where('nisn', $request->nisn)->first();
        if ($existing) {
            return back()->withErrors(['nisn' => 'NISN ini sudah pernah mendaftar.']);
        }

        // Ambil data siswa dari sekolah
        $siswa = SiswaSekolah::where('nisn', $request->nisn)->first();

        PendaftaranOsis::create([
            'nama' => $siswa->nama,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas,
            'no_hp' => $request->no_hp,
            'motivasi' => $request->motivasi,
        ]);

        return redirect('/daftar')->with('success', 'Pendaftaran berhasil!');
    }
}

