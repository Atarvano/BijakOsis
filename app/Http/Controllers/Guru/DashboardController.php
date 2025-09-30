<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendaftaranOsis;
use App\Models\SiswaSekolah;
use App\Models\NilaiSiswa;
use App\Models\EskulSiswa;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftar = PendaftaranOsis::with('kelas')->orderBy('created_at', 'desc')->paginate(10);
        $total = PendaftaranOsis::count();
        $accepted = PendaftaranOsis::where('status', 'accepted')->count();
        $pending = PendaftaranOsis::where('status', 'pending')->count();
        $waktuPengumuman = Pengaturan::getWaktuPengumuman();

        return view('guru.dashboard', compact('pendaftar', 'total', 'accepted', 'pending', 'waktuPengumuman'));
    }

    public function show($id)
    {
        $pendaftar = PendaftaranOsis::findOrFail($id);
        $siswa = SiswaSekolah::where('nisn', $pendaftar->nisn)->first();
        $nilai = null;
        $eskul = null;

        if ($siswa) {
            $nilai = NilaiSiswa::where('siswa_id', $siswa->id)->first();
            $eskul = EskulSiswa::where('siswa_id', $siswa->id)->first();
        }

        return view('guru.detail', compact('pendaftar', 'siswa', 'nilai', 'eskul'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pendaftar = PendaftaranOsis::findOrFail($id);
        $pendaftar->status = $request->status;
        $pendaftar->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }

    public function filterByGrade(Request $request)
    {
        $minGrade = $request->minimum_grade;
        $pendaftars = PendaftaranOsis::where('status', 'pending')->get();
        $rejected = 0;

        foreach ($pendaftars as $pendaftar) {
            $siswa = SiswaSekolah::where('nisn', $pendaftar->nisn)->first();

            if ($siswa) {
                $nilai = NilaiSiswa::where('siswa_id', $siswa->id)->first();

                if ($nilai) {
                    $average = ($nilai->b_indo + $nilai->b_inggris + $nilai->sejarah + $nilai->pelajaran_jurusan + $nilai->mtk) / 5;

                    if ($average < $minGrade) {
                        $pendaftar->status = 'rejected';
                        $pendaftar->save();
                        $rejected++;
                    }
                } else {
                    $pendaftar->status = 'rejected';
                    $pendaftar->save();
                    $rejected++;
                }
            } else {
                $pendaftar->status = 'rejected';
                $pendaftar->save();
                $rejected++;
            }
        }

        return redirect()->back()->with('success', $rejected . ' siswa berhasil ditolak karena nilai dibawah ' . $minGrade);
    }

    public function logout()
    {
        Auth::guard('guru')->logout();
        return redirect()->route('login');
    }

    public function deleteAll()
    {
        $count = PendaftaranOsis::count();
        PendaftaranOsis::truncate();

        return redirect()->back()->with('success', $count . ' pendaftar OSIS berhasil dihapus semua');
    }

    public function setWaktuPengumuman(Request $request)
    {
        $request->validate([
            'tanggal_pengumuman' => 'required|date',
            'jam_pengumuman' => 'required'
        ]);

        $datetime = $request->tanggal_pengumuman . ' ' . $request->jam_pengumuman;
        Pengaturan::setWaktuPengumuman($datetime);

        return redirect()->back()->with('success', 'Waktu pengumuman berhasil diatur untuk ' .
            \Carbon\Carbon::parse($datetime)->format('d F Y, H:i'));
    }
}