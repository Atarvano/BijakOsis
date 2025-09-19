<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendaftaranOsis;
use App\Models\SiswaSekolah;
use App\Models\NilaiSiswa;
use App\Models\EskulSiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftar = PendaftaranOsis::with('kelas')->orderByDesc('created_at')->get();
        $total = PendaftaranOsis::count();
        $accepted = PendaftaranOsis::where('status', 'accepted')->count();
        $pending = PendaftaranOsis::where('status', 'pending')->count();

        return view('guru.dashboard', compact('pendaftar', 'total', 'accepted', 'pending'));
    }

    public function show($id)
    {
        $pendaftar = PendaftaranOsis::with('kelas')->findOrFail($id);
        $siswa = SiswaSekolah::where('nisn', $pendaftar->nisn)->first();
        $nilai = $siswa ? NilaiSiswa::where('siswa_id', $siswa->id)->first() : null;
        $eskul = $siswa ? EskulSiswa::where('siswa_id', $siswa->id)->first() : null;

        return view('guru.detail', compact('pendaftar', 'siswa', 'nilai', 'eskul'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected'
        ]);

        $pendaftar = PendaftaranOsis::findOrFail($id);
        $pendaftar->status = $request->status;
        $pendaftar->save();

        return redirect()->route('guru.dashboard')->with('success', 'Status pendaftar berhasil diperbarui.');
    }
}