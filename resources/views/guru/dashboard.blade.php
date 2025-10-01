@php
    $rejected = $total - $accepted - $pending;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BijakOSIS - OSIS Registration Platform</title>
    @vite(['resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="bi bi-mortarboard me-2"></i>
                BijakOSIS
            </a>

            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-muted" href="#" role="button"
                        data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-2 fs-5"></i>
                        Admin
                    </a>
                </div>
                <form action="{{ route('guru.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link border-0 text-decoration-none text-muted">
                        <i class="bi bi-box-arrow-right me-1"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-4">
        <div class="mb-4">
            <h1 class="h3 fw-bold text-dark mb-1">OSIS Applicant Management</h1>
            <p class="text-muted mb-0">Manage and select student council applicants for the 2025 academic year</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary bg-opacity-10 rounded p-3">
                                    <i class="bi bi-people fs-4 text-primary"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="fw-bold fs-4 text-dark">{{ $total }}</div>
                                <div class="text-muted small">Total Applicants</div>
                                <div class="text-muted small">
                                    +{{ $pendaftar->where('created_at', '>=', now()->subWeek())->count() }} from last
                                    week
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-success bg-opacity-10 rounded p-3">
                                    <i class="bi bi-check-circle fs-4 text-success"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="fw-bold fs-4 text-dark">{{ $accepted }}</div>
                                <div class="text-muted small">Qualified Applicants</div>
                                <div class="text-muted small">{{ $total ? round($accepted / $total * 100) : 0 }}%
                                    qualification rate</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-warning bg-opacity-10 rounded p-3">
                                    <i class="bi bi-star fs-4 text-warning"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="fw-bold fs-4 text-dark">{{ $accepted }}</div>
                                <div class="text-muted small">Final Selected</div>
                                <div class="text-muted small">Target: 30 positions</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning bg-opacity-10 border-warning border-opacity-25">
                        <h6 class="card-title mb-0 fw-bold text-warning-emphasis">
                            <i class="bi bi-megaphone me-2"></i>Pengaturan Waktu Pengumuman
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                @if($waktuPengumuman)
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                                            <i class="bi bi-calendar-check fs-5 text-success"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">Pengumuman Dijadwalkan</div>
                                            <div class="text-muted small">
                                                {{ \Carbon\Carbon::parse($waktuPengumuman)->setTimezone('Asia/Jakarta')->format('d F Y, H:i') }}
                                                WIB
                                            </div>
                                            <div class="text-muted small">
                                                @if(\Carbon\Carbon::parse($waktuPengumuman)->setTimezone('Asia/Jakarta')->isPast())
                                                    <span class="badge bg-success">Sudah Diumumkan</span>
                                                @else
                                                    <span class="badge bg-warning">Menunggu Waktu Pengumuman</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning bg-opacity-10 rounded p-2 me-3">
                                            <i class="bi bi-clock fs-5 text-warning"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">Waktu Pengumuman Belum Diatur</div>
                                            <div class="text-muted small">Silakan atur tanggal dan jam pengumuman hasil
                                                seleksi</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#waktuPengumumanModal">
                                    <i class="bi bi-calendar-plus me-1"></i>
                                    {{ $waktuPengumuman ? 'Ubah Waktu' : 'Atur Waktu' }} Pengumuman
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="card-title mb-0 fw-bold">Student Applicants</h5>
                <div>
                    <button class="btn btn-dark btn-sm me-2" data-bs-toggle="modal" data-bs-target="#filterModal">
                        <i class="bi bi-funnel me-1"></i>Set Filter
                    </button>
                    <button class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#deleteAllModal">
                        <i class="bi bi-trash me-1"></i>Delete All
                    </button>
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-download me-1"></i>Export
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="fw-semibold text-uppercase small text-muted border-0">NAME</th>
                            <th class="fw-semibold text-uppercase small text-muted border-0">NISN</th>
                            <th class="fw-semibold text-uppercase small text-muted border-0">CLASS</th>
                            <th class="fw-semibold text-uppercase small text-muted border-0">ACADEMIC SCORE</th>
                            <th class="fw-semibold text-uppercase small text-muted border-0">ATTENDANCE</th>
                            <th class="fw-semibold text-uppercase small text-muted border-0">SP POINTS</th>
                            <th class="fw-semibold text-uppercase small text-muted border-0">EXTRACURRICULAR</th>
                            <th class="fw-semibold text-uppercase small text-muted border-0">STATUS</th>
                            <th class="fw-semibold text-uppercase small text-muted border-0">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftar as $p)
                            @php
                                
                                $siswa = \App\Models\SiswaSekolah::where('nisn', $p->nisn)->first();
                                $kelas = $siswa ? \App\Models\Kelas::find($siswa->kelas_id) : null;
                                
                  
                                $rata_rata = 0;
                                $nilai = $siswa ? \App\Models\NilaiSiswa::where('siswa_id', $siswa->id)->first() : null;
                                if ($nilai) {
                                    $rata_rata = ($nilai->b_indo + $nilai->b_inggris + $nilai->sejarah + $nilai->pelajaran_jurusan + $nilai->mtk) / 5;
                                    $rata_rata = round($rata_rata, 1);
                                }

                                // Cari data eskul
                                $eskul = $siswa ? \App\Models\EskulSiswa::where('siswa_id', $siswa->id)->first() : null;
                                
                              
                                
                                $attendance = $siswa ? \App\Models\Attendance::where('siswa_id', $siswa->id)->first() : null;
                            @endphp
                            <tr>
                                <td class="border-0">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-secondary bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">
                                            <span
                                                class="fw-bold text-secondary small">{{ strtoupper(substr($p->nama, 0, 2)) }}</span>
                                        </div>
                                        <span class="fw-semibold">{{ $p->nama }}</span>
                                    </div>
                                </td>
                                <td class="text-muted border-0">{{ $p->nisn }}</td>
                                <td class="text-muted border-0">{{ $kelas ? $kelas->nama : '-' }}</td>
                                <td class="border-0">
                                    @if($rata_rata > 0)
                                        @if($rata_rata >= 85)
                                            <span class="badge bg-success">{{ $rata_rata }}</span>
                                        @elseif($rata_rata >= 75)
                                            <span class="badge bg-primary">{{ $rata_rata }}</span>
                                        @elseif($rata_rata >= 65)
                                            <span class="badge bg-warning">{{ $rata_rata }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $rata_rata }}</span>
                                        @endif
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-muted border-0">
                                    @if($attendance)
                                        @php 
                                            $persentase_kehadiran = $attendance->persentase_kehadiran; 
                                        @endphp
                                        @if($persentase_kehadiran >= 95)
                                            <span class="badge bg-success">{{ number_format($persentase_kehadiran, 1) }}%</span>
                                        @elseif($persentase_kehadiran >= 85)
                                            <span class="badge bg-primary">{{ number_format($persentase_kehadiran, 1) }}%</span>
                                        @elseif($persentase_kehadiran >= 75)
                                            <span class="badge bg-warning">{{ number_format($persentase_kehadiran, 1) }}%</span>
                                        @else
                                            <span class="badge bg-danger">{{ number_format($persentase_kehadiran, 1) }}%</span>
                                        @endif
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-muted border-0">{{ $siswa ? $siswa->sp_points : 0 }}</td>
                                <td class="text-muted border-0">
                                    @if($eskul)
                                        {{ $eskul->nama_eskul1 }}
                                        @if($eskul->nama_eskul2)
                                            , {{ $eskul->nama_eskul2 }}
                                        @endif
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="border-0">
                                    @if($p->status == 'accepted')
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Accepted</span>
                                    @elseif($p->status == 'rejected')
                                        <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Rejected</span>
                                    @else
                                        <span class="badge bg-warning"><i class="bi bi-clock me-1"></i>Pending</span>
                                    @endif
                                </td>
                                <td class="border-0">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-secondary" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-eye me-1"></i>View
                                        </button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('guru.pendaftar.detail', $p->id) }}">
                                                    <i class="bi bi-eye me-2"></i>View Details
                                                </a>
                                            </li>
                                            @if($p->status == 'pending')
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form action="{{ route('guru.pendaftar.status', $p->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button class="dropdown-item text-success" name="status"
                                                            value="accepted">
                                                            <i class="bi bi-check-circle me-2"></i>Accept
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('guru.pendaftar.status', $p->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button class="dropdown-item text-danger" name="status"
                                                            value="rejected">
                                                            <i class="bi bi-x-circle me-2"></i>Reject
                                                        </button>
                                                    </form>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4 border-0">
                                    <i class="bi bi-inbox display-6 d-block mb-2"></i>
                                    Belum ada pendaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                <div class="text-muted small">
                    Showing {{ $pendaftar->firstItem() ?? 0 }} to {{ $pendaftar->lastItem() ?? 0 }} of
                    {{ $pendaftar->total() }} results
                </div>
                <nav>
                    {{ $pendaftar->links('pagination::bootstrap-4') }}
                </nav>
            </div>
        </div>
    </div>

    <!-- Modal Delete All -->
    <div class="modal fade" id="deleteAllModal" tabindex="-1" aria-labelledby="deleteAllModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAllModalLabel">
                        <i class="bi bi-exclamation-triangle me-2 text-danger"></i>
                        Delete All Applicants
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Peringatan Keras!</strong> Tindakan ini akan menghapus SEMUA data pendaftar OSIS secara
                        permanen.
                    </div>

                    <div class="mb-3">
                        <p class="fw-bold text-danger">Anda akan menghapus:</p>
                        <ul class="text-muted">
                            <li>{{ $total }} total pendaftar</li>
                            <li>{{ $accepted }} pendaftar yang sudah diterima</li>
                            <li>{{ $pending }} pendaftar yang sedang pending</li>
                            <li>Semua data motivasi dan informasi pendaftar</li>
                        </ul>
                    </div>

                    <div class="alert alert-warning">
                        <i class="bi bi-shield-exclamation me-2"></i>
                        <strong>Data tidak dapat dikembalikan!</strong> Pastikan Anda sudah membackup data jika
                        diperlukan.
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="confirmDelete" required>
                        <label class="form-check-label fw-bold text-danger" for="confirmDelete">
                            Ya, saya yakin ingin menghapus SEMUA data pendaftar OSIS
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Cancel
                    </button>
                    <form action="{{ route('guru.delete.all') }}" method="POST" class="d-inline" id="deleteAllForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" id="deleteAllBtn" disabled>
                            <i class="bi bi-trash me-2"></i>Delete All Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">
                        <i class="bi bi-funnel me-2"></i>
                        Set Minimum Academic Score Filter
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('guru.filter.grade') }}" method="POST" id="filterForm">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Automatic Filtering:</strong> Siswa dengan nilai rata-rata di bawah batas minimum
                            akan otomatis ditolak (status menjadi "rejected").
                        </div>

                        <div class="mb-3">
                            <label for="minimum_grade" class="form-label fw-semibold">
                                <strong>Minimum Academic Score (0-100)</strong>
                            </label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="minimum_grade" name="minimum_grade"
                                    min="0" max="100" step="0.1" placeholder="Contoh: 80" required>
                                <span class="input-group-text">/ 100</span>
                            </div>
                            <div class="form-text">
                                Siswa dengan nilai rata-rata (B.Indo + B.Inggris + Sejarah + Jurusan + Matematika) di
                                bawah nilai ini akan ditolak otomatis.
                            </div>
                        </div>

                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Peringatan:</strong> Tindakan ini tidak dapat dibatalkan. Pastikan nilai minimum
                            yang Anda masukkan sudah benar.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" onclick="return confirmFilter()">
                            <i class="bi bi-check-circle me-2"></i>Apply Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    

    <!-- Modal Waktu Pengumuman -->
    <div class="modal fade" id="waktuPengumumanModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('guru.set.waktu.pengumuman') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-warning bg-opacity-10">
                        <h5 class="modal-title fw-bold">
                            <i class="bi bi-megaphone me-2"></i>Atur Waktu Pengumuman
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Info:</strong> Setelah waktu yang ditentukan, siswa akan dapat melihat hasil seleksi
                            di dashboard mereka.
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pengumuman" class="form-label fw-bold">Tanggal Pengumuman</label>
                            <input type="date" class="form-control" id="tanggal_pengumuman" name="tanggal_pengumuman"
                                value="{{ $waktuPengumuman ? \Carbon\Carbon::parse($waktuPengumuman)->setTimezone('Asia/Jakarta')->format('Y-m-d') : '' }}"
                                min="{{ date('Y-m-d') }}" required>
                            <div class="form-text">Pilih tanggal minimal hari ini</div>
                        </div>

                        <div class="mb-3">
                            <label for="jam_pengumuman" class="form-label fw-bold">Jam Pengumuman</label>
                            <input type="time" class="form-control" id="jam_pengumuman" name="jam_pengumuman"
                                value="{{ $waktuPengumuman ? \Carbon\Carbon::parse($waktuPengumuman)->setTimezone('Asia/Jakarta')->format('H:i') : '09:00' }}"
                                required>
                        </div>

                        @if($waktuPengumuman)
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <strong>Waktu Saat Ini:</strong>
                                {{ \Carbon\Carbon::parse($waktuPengumuman)->setTimezone('Asia/Jakarta')->format('d F Y, H:i') }}
                                WIB
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-lg me-1"></i>{{ $waktuPengumuman ? 'Update' : 'Atur' }} Waktu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmFilter() {
            const minGrade = document.getElementById('minimum_grade').value;
            if (!minGrade) {
                alert('Harap masukkan nilai minimum terlebih dahulu.');
                return false;
            }

            const pendingElements = document.querySelectorAll('.badge.bg-warning');
            const pendingCount = pendingElements.length;
            return confirm(`Apakah Anda yakin ingin menerapkan filter dengan nilai minimum ${minGrade}?\n\nSiswa dengan nilai di bawah ${minGrade} akan otomatis ditolak.\nSaat ini ada ${pendingCount} siswa dengan status pending.`);
        }

        // Handle delete all confirmation
        document.getElementById('confirmDelete').addEventListener('change', function () {
            const deleteBtn = document.getElementById('deleteAllBtn');
            deleteBtn.disabled = !this.checked;
        });

        // Confirm delete all action
        document.getElementById('deleteAllForm').addEventListener('submit', function (e) {
            const checkbox = document.getElementById('confirmDelete');
            if (!checkbox.checked) {
                e.preventDefault();
                alert('Harap centang checkbox konfirmasi terlebih dahulu!');
                return false;
            }

            return confirm('KONFIRMASI TERAKHIR: Apakah Anda benar-benar yakin ingin menghapus SEMUA data pendaftar OSIS?\n\nTindakan ini TIDAK DAPAT DIBATALKAN!');
        });

        setTimeout(function () {
            const alerts = document.querySelectorAll('.alert-success');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>

</html>