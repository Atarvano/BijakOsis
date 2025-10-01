@php
    $averageScore = 0;
    if ($siswa && $nilai) {
        $averageScore = round(($nilai->b_indo + $nilai->b_inggris + $nilai->sejarah + $nilai->pelajaran_jurusan + $nilai->mtk) / 5, 1);
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BijakOSIS - Student Detail</title>
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
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-muted" href="#" role="button">
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
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('guru.dashboard') }}"
                        class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('guru.dashboard') }}"
                        class="text-decoration-none">Applicants</a></li>
                <li class="breadcrumb-item active">Student Detail</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <div class="d-flex align-items-center mb-2">
                    <a href="{{ route('guru.dashboard') }}" class="btn btn-outline-secondary btn-sm me-3">
                        <i class="bi bi-arrow-left me-1"></i>Back to List
                    </a>
                    <h1 class="h3 fw-bold text-dark mb-0">Student Detail</h1>
                </div>

            </div>

            <div class="d-flex gap-2">
                @if($pendaftar->status == 'pending')
                    <form action="{{ route('guru.pendaftar.status', $pendaftar->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" name="status" value="accepted" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i>Accept
                        </button>
                    </form>
                    <form action="{{ route('guru.pendaftar.status', $pendaftar->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" name="status" value="rejected" class="btn btn-danger">
                            <i class="bi bi-x-circle me-1"></i>Reject
                        </button>
                    </form>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center py-5">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($pendaftar->nama) }}&size=120&background=6c757d&color=fff&rounded=true"
                            alt="Profile" class="rounded-circle mb-3" width="120" height="120">

                        <h4 class="fw-bold text-dark mb-1">{{ $pendaftar->nama }}</h4>
                        <p class="text-muted mb-2">NISN: {{ $pendaftar->nisn }}</p>
                        <p class="text-muted mb-3">{{ optional($pendaftar->kelas)->nama ?? 'XI IPA 1' }}</p>

                        <div class="mb-4">
                            <strong class="text-dark">Registration Date</strong><br>
                            <span class="text-muted">{{ $pendaftar->created_at->format('F d, Y') }}</span>
                        </div>

                        <div class="mb-4">
                            <strong class="text-dark">Motivation</strong><br>
                            <div class="mt-2 p-3 bg-light rounded text-start">
                                <small class="text-muted">{{ $pendaftar->motivasi }}</small>
                            </div>
                        </div>

                        <div class="mb-0">
                            <strong class="text-dark">Contact</strong><br>
                            <span class="text-muted">{{ $pendaftar->no_hp }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0">Academic Performance</h5>
                    </div>
                    <div class="card-body">
                        @if($nilai)
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-muted fw-semibold mb-3">Subject Grades (Semester 1)</h6>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Bahasa Indonesia</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2">{{ $nilai->b_indo }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">English</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2">{{ $nilai->b_inggris }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Mathematics</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2">{{ $nilai->mtk }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Fisika</span>
                                        <span
                                            class="badge bg-primary rounded-pill px-3 py-2">{{ $nilai->pelajaran_jurusan }}</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Kimia</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2">100</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Biologi</span>
                                        <span class="badge bg-success rounded-pill px-3 py-2">82</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="text-muted fw-semibold mb-3">Additional Subjects</h6>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Sejarah</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2">95</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Geografi</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2">95</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">PKN</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2">88</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Agama</span>
                                        <span class="badge bg-success rounded-pill px-3 py-2">91</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="fw-bold text-dark">Olahraga</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2">91</span>
                                    </div>

                                    <div class="mt-4">
                                        <div class="    rounded p-4 text-center">
                                            <div class="fw-bold mb-1">Average Score</div>
                                            <div class="fs-2 fw-bold">{{ number_format($averageScore, 1) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center text-muted py-4">
                                <i class="bi bi-clipboard-x display-6 d-block mb-2"></i>
                                Data nilai belum tersedia
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0">Attendance & Behavior</h5>
                    </div>
                    <div class="card-body">
                        @if($siswa && ($siswa->currentAttendance || $siswa->attendance->first()))
                            @php
                                $attendance = $siswa->currentAttendance ?? $siswa->attendance->first();
                                $persentase = $attendance->persentase_kehadiran;
                                $kategori = $attendance->kategori_kehadiran;
                            @endphp
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="p-3">
                                        <i class="bi bi-calendar-check display-6 text-primary mb-2"></i>
                                        <h5 class="fw-bold">{{ number_format($persentase, 1) }}%</h5>
                                        <p class="text-muted mb-0">Attendance Rate</p>
                                        <small
                                            class="text-muted">{{ $attendance->total_hadir }}/{{ $attendance->total_hari_efektif }}
                                            days</small>
                                        <div class="mt-1">
                                            @if($persentase >= 95)
                                                <span class="badge bg-success">{{ $kategori }}</span>
                                            @elseif($persentase >= 85)
                                                <span class="badge bg-primary">{{ $kategori }}</span>
                                            @elseif($persentase >= 75)
                                                <span class="badge bg-warning">{{ $kategori }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $kategori }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3">
                                        <div class="bg-warning bg-opacity-10 rounded p-3 d-inline-block mb-2">
                                            <i class="bi bi-exclamation-triangle display-6 text-warning"></i>
                                        </div>
                                        <h5 class="fw-bold">{{ $attendance->total_alpha }}</h5>
                                        <p class="text-muted mb-0">Alpha Days</p>
                                        <small class="text-muted">{{ $attendance->total_izin }} izin,
                                            {{ $attendance->total_sakit }} sakit</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3">
                                        <i class="bi bi-star-fill display-6 text-warning mb-2"></i>
                                        <h5 class="fw-bold">5</h5>
                                        <p class="text-muted mb-0">Achievement</p>
                                        <small class="text-muted">Awards received</small>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="p-3">
                                        <i class="bi bi-calendar-check display-6 text-primary mb-2"></i>
                                        <h5 class="fw-bold">-</h5>
                                        <p class="text-muted mb-0">Attendance Rate</p>
                                        <small class="text-muted">Data not available</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3">
                                        <div class="bg-warning bg-opacity-10 rounded p-3 d-inline-block mb-2">
                                            <i class="bi bi-exclamation-triangle display-6 text-warning"></i>
                                        </div>
                                        <h5 class="fw-bold">-</h5>
                                        <p class="text-muted mb-0">Alpha Days</p>
                                        <small class="text-muted">Data not available</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3">
                                        <i class="bi bi-star-fill display-6 text-warning mb-2"></i>
                                        <h5 class="fw-bold">5</h5>
                                        <p class="text-muted mb-0">Achievement</p>
                                        <small class="text-muted">Awards received</small>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0">Extracurricular Activities</h5>
                    </div>
                    <div class="card-body">
                        @if($eskul)
                            <div class="row">
                                @if($eskul->nama_eskul1)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 border rounded mb-3">
                                            <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                                                <i class="bi bi-people fs-4 text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0">{{ $eskul->nama_eskul1 }}</h6>
                                                <small class="text-muted">Primary Activity</small>
                                                <div class="mt-1">
                                                    <span class="badge bg-success">Active</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($eskul->nama_eskul2)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 border rounded mb-3">
                                            <div class="bg-danger bg-opacity-10 rounded p-3 me-3">
                                                <i class="bi bi-heart-pulse fs-4 text-danger"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0">{{ $eskul->nama_eskul2 }}</h6>
                                                <small class="text-muted">Secondary Activity</small>
                                                <div class="mt-1">
                                                    <span class="badge bg-success">Active</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(!$eskul->nama_eskul2)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 border rounded mb-3 bg-light">
                                            <div class="bg-secondary bg-opacity-10 rounded p-3 me-3">
                                                <i class="bi bi-plus-circle fs-4 text-secondary"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0 text-muted">Available Slot</h6>
                                                <small class="text-muted">Can join one more activity</small>
                                                <div class="mt-1">
                                                    <span class="badge bg-secondary">Open</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="text-center text-muted py-4">
                                <i class="bi bi-calendar-x display-6 d-block mb-2"></i>
                                Data ekstrakurikuler belum tersedia
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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