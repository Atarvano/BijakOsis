{{-- resources/views/guru/dashboard.blade.php --}}
@php
    // angka statistik dari database
    $total      = $pendaftar->count();
    $accepted   = $pendaftar->where('status', 'accepted')->count();
    $pending    = $pendaftar->where('status', 'pending')->count();
    $rejected   = $pendaftar->where('status', 'rejected')->count();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BijakoSIS - Guru Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* --- SEMUA STYLE SAMA PERSIS DENGAN admin.blade.php ANDA --- */
        body{background-color:#f8f9fa;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;}
        .navbar-brand{font-size:1.5rem;font-weight:600;color:#2c3e50!important;}
        .graduation-cap{margin-right:8px;font-size:1.3rem;}
        .main-content{padding:2rem;}
        .page-title{font-size:2rem;font-weight:600;color:#2c3e50;margin-bottom:0.5rem;}
        .page-subtitle{color:#6c757d;margin-bottom:2rem;}
        .stats-card{background:white;border-radius:12px;padding:1.5rem;box-shadow:0 2px 8px rgba(0,0,0,.1);border:none;height:100%;}
        .stats-icon{width:40px;height:40px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;margin-bottom:1rem;}
        .stats-icon.people{background-color:#e8f4f8;color:#0ea5e9;}
        .stats-icon.check{background-color:#dcfce7;color:#16a34a;}
        .stats-icon.star{background-color:#fef3c7;color:#f59e0b;}
        .stats-number{font-size:2.5rem;font-weight:700;color:#1f2937;line-height:1;margin-bottom:0.25rem;}
        .stats-label{color:#6b7280;font-weight:500;margin-bottom:0.5rem;}
        .stats-meta{font-size:0.875rem;color:#9ca3af;}
        .success-alert{background-color:#dcfce7;border:1px solid #bbf7d0;color:#166534;border-radius:8px;padding:1rem;margin-bottom:2rem;position:relative;}
        .success-alert .btn-close{position:absolute;right:1rem;top:50%;transform:translateY(-50%);background:none;border:none;font-size:1.2rem;color:#166534;opacity:0.5;}
        .section-title{font-size:1.25rem;font-weight:600;color:#1f2937;margin-bottom:1.5rem;}
        .table-container{background:white;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.1);overflow:hidden;}
        .table-header{padding:1.5rem;border-bottom:1px solid #e5e7eb;display:flex;justify-content:space-between;align-items:center;}
        .btn-filter{background-color:#374151;color:white;border:none;padding:0.5rem 1rem;border-radius:6px;font-weight:500;margin-right:0.5rem;}
        .btn-export{background-color:transparent;color:#6b7280;border:1px solid #d1d5db;padding:0.5rem 1rem;border-radius:6px;font-weight:500;}
        .table{margin-bottom:0;}
        .table thead th{background-color:#f9fafb;border-bottom:1px solid #e5e7eb;font-weight:600;font-size:0.875rem;color:#6b7280;text-transform:uppercase;padding:1rem;}
        .table tbody td{padding:1rem;border-bottom:1px solid #f3f4f6;vertical-align:middle;}
        .student-avatar{width:32px;height:32px;border-radius:50%;background-color:#e5e7eb;display:flex;align-items:center;justify-content:center;font-weight:600;color:#6b7280;margin-right:0.75rem;}
        .student-info{display:flex;align-items:center;}
        .student-name{font-weight:600;color:#1f2937;}
        .badge-accepted{background-color:#dcfce7;color:#166534;border:none;padding:0.25rem 0.75rem;border-radius:20px;font-size:0.875rem;font-weight:500;}
        .badge-pending{background-color:#fef3c7;color:#92400e;border:none;padding:0.25rem 0.75rem;border-radius:20px;font-size:0.875rem;font-weight:500;}
        .badge-rejected{background-color:#fee2e2;color:#991b1b;border:none;padding:0.25rem 0.75rem;border-radius:20px;font-size:0.875rem;font-weight:500;}
        .btn-action{padding:0.375rem 0.75rem;border-radius:6px;border:1px solid #d1d5db;background:white;color:#6b7280;font-size:0.875rem;margin-right:0.5rem;}
        .btn-action:hover{background-color:#f3f4f6;}
        .pagination-container{padding:1.5rem;display:flex;justify-content:space-between;align-items:center;}
        .pagination{margin-bottom:0;}
        .pagination .page-link{border:1px solid #d1d5db;color:#6c757d;padding:0.5rem 0.75rem;}
        .pagination .page-item.active .page-link{background-color:#1f2937;border-color:#1f2937;color:white;}
        .navbar{background-color:white !important;box-shadow:0 1px 3px rgba(0,0,0,.1);padding:1rem 0;}
        .navbar-nav .nav-link{color:#6b7280 !important;font-weight:500;}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="#">
            <i class="bi bi-mortarboard graduation-cap"></i>
            BijakoSIS
            <span style="font-size:0.875rem;color:#6b7280;font-weight:400;">Guru Dashboard</span>
        </a>

        <div class="navbar-nav ms-auto">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-2" style="font-size:1.5rem;"></i>
                    Guru
                </a>
            </div>
            <a class="nav-link" href="#">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>
        </div>
    </div>
</nav>

<div class="main-content">
    <div class="container-fluid">

        <div class="mb-4">
            <h1 class="page-title">OSIS Applicant Management</h1>
            <p class="page-subtitle">Manage and select student council applicants for the 2025 academic year</p>
        </div>

        {{-- alert sukses --}}
        @if(session('success'))
        <div class="success-alert">
            <i class="bi bi-check-circle me-2"></i>
            <strong>Action completed successfully</strong><br>
            {{ session('success') }}
            <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'"></button>
        </div>
        @endif

        {{-- statistik --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-icon people"><i class="bi bi-people"></i></div>
                    <div class="stats-number">{{ $total }}</div>
                    <div class="stats-label">Total Applicants</div>
                    <div class="stats-meta">+{{ $pendaftar->where('created_at','>=',now()->subWeek())->count() }} from last week</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-icon check"><i class="bi bi-check-circle"></i></div>
                    <div class="stats-number">{{ $accepted }}</div>
                    <div class="stats-label">Qualified Applicants</div>
                    <div class="stats-meta">{{ $total ? round($accepted/$total*100) : 0 }}% qualification rate</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-icon star"><i class="bi bi-star"></i></div>
                    <div class="stats-number">{{ $accepted }}</div>
                    <div class="stats-label">Final Selected</div>
                    <div class="stats-meta">Target: 30 positions</div>
                </div>
            </div>
        </div>

        {{-- tabel --}}
        <div class="table-container">
            <div class="table-header">
                <h3 class="section-title mb-0">Student Applicants</h3>
                <div>
                    <button class="btn-filter"><i class="bi bi-funnel me-2"></i>Set Filter</button>
                    <button class="btn-export"><i class="bi bi-download me-2"></i>Export</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>NISN</th>
                            <th>CLASS</th>
                            <th>ACADEMIC SCORE</th>
                            <th>ATTENDANCE</th>
                            <th>SP POINTS</th>
                            <th>EXTRACURRICULAR</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($pendaftar as $p)
                        {{-- data master --}}
                        @php
                            $siswaDb = \App\Models\SiswaSekolah::where('nisn', $p->nisn)->first();
                            $kelas   = $siswaDb ? \App\Models\Kelas::find($siswaDb->kelas_id) : null;
                            $nilai   = $siswaDb ? \App\Models\NilaiSiswa::where('siswa_id', $siswaDb->id)->first() : null;
                            $eskul   = $siswaDb ? \App\Models\EskulSiswa::where('siswa_id', $siswaDb->id)->first() : null;
                            $avg     = 0;
                            if($nilai){
                                $avg = round(($nilai->b_indo + $nilai->b_inggris + $nilai->sejarah +
                                              $nilai->pelajaran_jurusan + $nilai->mtk) / 5, 1);
                            }
                        @endphp
                        <tr>
                            <td>
                                <div class="student-info">
                                    <div class="student-avatar">{{ strtoupper(substr($p->nama, 0, 2)) }}</div>
                                    <span class="student-name">{{ $p->nama }}</span>
                                </div>
                            </td>
                            <td>{{ $p->nisn }}</td>
                            <td>{{ optional($kelas)->nama ?? '-' }}</td>
                            <td>{{ $avg ?: '-' }}</td>
                            <td>-</td>{{-- belum ada kolom absensi --}}
                            <td>-</td>{{-- belum ada kolom SP --}}
                            <td>
                                {{ optional($eskul)->nama_eskul1 ?? '-' }}
                                {{ ($eskul && $eskul->nama_eskul2) ? ', '.$eskul->nama_eskul2 : '' }}
                            </td>
                            <td>
                                @if($p->status == 'accepted')
                                    <span class="badge-accepted">✓ Accepted</span>
                                @elseif($p->status == 'rejected')
                                    <span class="badge-rejected">× Rejected</span>
                                @else
                                    <span class="badge-pending">● Pending</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('guru.pendaftar.detail', $p->id) }}" class="btn-action">👁 View</a>
                                @if($p->status == 'pending')
                                    <form action="{{ route('guru.pendaftar.status', $p->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn-action" name="status" value="accepted">✓ Accept</button>
                                        <button class="btn-action" name="status" value="rejected">× Reject</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada pendaftar.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- pagination --}}
            <div class="pagination-container">
                <div style="color:#6b7280;">Showing 1 to {{ $pendaftar->count() }} of {{ $total }} results</div>
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled"><span class="page-link">‹</span></li>
                        <li class="page-item active"><span class="page-link">1</span></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><span class="page-link">…</span></li>
                        <li class="page-item"><a class="page-link" href="#">32</a></li>
                        <li class="page-item"><a class="page-link" href="#">›</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // close alert
    document.querySelector('.btn-close')?.addEventListener('click', function(){
        this.parentElement.style.display='none';
    });
</script>
</body>
</html>