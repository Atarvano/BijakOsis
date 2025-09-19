<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detail Pendaftar OSIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid px-4 py-4">
        {{-- isi detail Anda mulai dari sini --}}
<div class="container-fluid px-4 py-4">

    {{-- judul + back --}}
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('guru.dashboard') }}" class="btn btn-outline-secondary btn-sm me-3">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h1 class="h3 mb-0 text-gray-800">Applicant Detail</h1>
    </div>

    {{-- alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- data pendaftaran --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white fw-semibold">Registration Data</div>
        <div class="card-body">
            <table class="table table-borderless mb-0">
                <tr><td width="180">Nama</td><td>: {{ $pendaftar->nama }}</td></tr>
                <tr><td>NISN</td><td>: {{ $pendaftar->nisn }}</td></tr>
                <tr><td>Kelas</td><td>: {{ optional($pendaftar->kelas)->nama ?? '-' }}</td></tr>
                <tr><td>No. HP</td><td>: {{ $pendaftar->no_hp }}</td></tr>
                <tr><td>Motivasi</td>
                    <td>: <div class="border rounded p-2 bg-light">{{ $pendaftar->motivasi }}</div></td>
                </tr>
                <tr><td>Status</td>
                    <td>:
                        @if($pendaftar->status == 'accepted')
                            <span class="badge bg-success-subtle text-success">✓ Accepted</span>
                        @elseif($pendaftar->status == 'rejected')
                            <span class="badge bg-danger-subtle text-danger">× Rejected</span>
                        @else
                            <span class="badge bg-warning-subtle text-warning">● Pending</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

    {{-- data akademik --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white fw-semibold">Academic Data</div>
        <div class="card-body">
            @if($siswa && $siswa->nilaiSiswa)
                @php $n = $siswa->nilaiSiswa; @endphp
                <table class="table table-borderless mb-0">
                    <tr><td width="180">Bahasa Indonesia</td><td>: {{ $n->b_indo }}</td></tr>
                    <tr><td>Bahasa Inggris</td><td>: {{ $n->b_inggris }}</td></tr>
                    <tr><td>Sejarah</td><td>: {{ $n->sejarah }}</td></tr>
                    <tr><td>Pelajaran Jurusan</td><td>: {{ $n->pelajaran_jurusan }}</td></tr>
                    <tr><td>Matematika</td><td>: {{ $n->mtk }}</td></tr>
                    <tr><td>Rata-rata</td>
                        <td>: <strong>
                            {{ round(($n->b_indo + $n->b_inggris + $n->sejarah + $n->pelajaran_jurusan + $n->mtk) / 5, 1) }}
                        </strong></td>
                    </tr>
                </table>
            @else
                <div class="text-muted">Data nilai belum diinput.</div>
            @endif
        </div>
    </div>

    {{-- ekstrakurikuler --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white fw-semibold">Extracurricular</div>
        <div class="card-body">
            @if($siswa && $siswa->eskul)
                <ul class="mb-0">
                    <li>{{ $siswa->eskul->nama_eskul1 ?: '-' }}</li>
                    @if($siswa->eskul->nama_eskul2)
                        <li>{{ $siswa->eskul->nama_eskul2 }}</li>
                    @endif
                </ul>
            @else
                <div class="text-muted">Data ekstrakurikuler belum diinput.</div>
            @endif
        </div>
    </div>

    {{-- tombol aksi --}}
    @if($pendaftar->status == 'pending')
        <div class="d-flex gap-2">
            <form action="{{ route('guru.pendaftar.status', $pendaftar->id) }}" method="POST">
                @csrf
                <button class="btn btn-success" name="status" value="accepted">✓ Accept</button>
            </form>
            <form action="{{ route('guru.pendaftar.status', $pendaftar->id) }}" method="POST">
                @csrf
                <button class="btn btn-danger" name="status" value="rejected">× Reject</button>
            </form>
        </div>
    @endif
</div>
    </div>
</body>
</html>