<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\pendaftaranosis;
use App\Models\Kelas;
use App\Models\SiswaSekolah;

class pendaftaran extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('daftar', compact('kelas'), );
    }

    public function store(request $request)
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

        $siswa = $siswa = SiswaSekolah::where('nisn', $request->nisn)->first();

        pendaftaranosis::create([
            'nama' => $siswa->nama,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas,
            'no_hp' => $request->no_hp,
            'motivasi' => $request->motivasi,
        ]);
        return redirect('/daftar')->with('success', 'Pendaftaran berhasil!');
    }
}
