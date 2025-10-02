<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BijakOSIS - Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="bi bi-mortarboard me-2"></i>
                BijakOSIS
            </a>
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1"></i>
                        {{ $user->nama }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="bg-dark text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}&size=80&background=fff&color=2c3e50&rounded=true"
                            alt="Profile" class="rounded-circle me-4 border-3 border-light-subtle">
                        <div>
                            <h2 class="mb-1">Welcome back, {{ $user->nama }}</h2>
                            <p class="mb-0 opacity-75">NISN {{ $user->nisn }} • Class {{ $user->kelas->nama }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    @if($user->status == 'pending')
                        <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                            <i class="bi bi-clock me-1"></i>Pending Review
                        </span>
                    @elseif($user->status == 'accepted')
                        <span class="badge bg-success text-white fs-6 px-3 py-2">
                            <i class="bi bi-check-circle me-1"></i>Accepted
                        </span>
                    @else
                        <span class="badge bg-danger text-white fs-6 px-3 py-2">
                            <i class="bi bi-x-circle me-1"></i>Not Selected
                        </span>
                    @endif
                </div>
            </div>

            <div class="bg-secondary bg-opacity-75 rounded p-4 mt-4">
                <i class="bi bi-quote me-2"></i>
                <span class="fst-italic">"Leadership is not about being in charge. It's about taking care of those in
                    your charge."</span>
                <small class="d-block mt-1 opacity-75">- Simon Sinek</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container my-5">
        @if(!$pengumumanReady)
            <!-- Menunggu Waktu Pengumuman -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0 fw-bold">OSIS Application Status</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Timeline Item 1 -->
                    <div class="d-flex align-items-start mb-4 position-relative">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px; z-index: 2;">
                            <i class="bi bi-check"></i>
                        </div>
                        <div class="position-absolute top-0 start-0 ms-3"
                            style="width: 2px; height: 100%; background-color: #e9ecef; z-index: 1; margin-top: 40px;">
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Application Submitted</h6>
                            <p class="text-muted mb-0">Your OSIS application has been successfully submitted on
                                {{ $user->created_at->format('F j, Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="d-flex align-items-start mb-4 position-relative">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px; z-index: 2;">
                            <i class="bi bi-search"></i>
                        </div>
                        <div class="position-absolute top-0 start-0 ms-3"
                            style="width: 2px; height: 100%; background-color: #e9ecef; z-index: 1; margin-top: 40px;">
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Application Reviewed</h6>
                            <p class="text-muted mb-0">Your application has been thoroughly reviewed by the selection
                                committee</p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="d-flex align-items-start">
                        <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Awaiting Announcement</h6>
                            <p class="text-muted mb-0">
                                @if($waktuPengumuman)
                                    Results will be announced on
                                    {{ \Carbon\Carbon::parse($waktuPengumuman)->setTimezone('Asia/Jakarta')->format('F j, Y \a\t H:i') }} WIB
                                @else
                                    Results will be announced soon. Please stay tuned!
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-info text-center py-4 mt-4" role="alert">
                <i class="bi bi-hourglass-split display-6 mb-3 d-block"></i>
                <h4 class="fw-bold">Please Wait for the Announcement</h4>
                @if($waktuPengumuman)
                    <p class="mb-2">The selection results will be announced on:</p>
                    <div class=" rounded p-3 d-inline-block">
                        <strong
                            class="text-primary fs-5">{{ \Carbon\Carbon::parse($waktuPengumuman)->setTimezone('Asia/Jakarta')->format('l, F j, Y') }}</strong><br>
                        <strong class="text-dark fs-4">{{ \Carbon\Carbon::parse($waktuPengumuman)->setTimezone('Asia/Jakarta')->format('H:i') }} WIB</strong>
                    </div>
                    <p class="mt-3 mb-0">Please check back after the scheduled time to see your results.</p>
                @else
                    <p class="mb-0">The announcement schedule will be posted soon. Please check back later for updates.</p>
                @endif
            </div>

        @elseif($user->status == 'pending')
            <!-- Pending Status -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0 fw-bold">OSIS Application Status</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Timeline Item 1 -->
                    <div class="d-flex align-items-start mb-4 position-relative">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px; z-index: 2;">
                            <i class="bi bi-check"></i>
                        </div>
                        <div class="position-absolute top-0 start-0 ms-3"
                            style="width: 2px; height: 100%; background-color: #e9ecef; z-index: 1; margin-top: 40px;">
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Application Submitted</h6>
                            <p class="text-muted mb-0">Your OSIS application has been successfully submitted on January 15,
                                2025</p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="d-flex align-items-start mb-4 position-relative">
                        <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px; z-index: 2;">
                            <i class="bi bi-hourglass-split"></i>
                        </div>
                        <div class="position-absolute top-0 start-0 ms-3"
                            style="width: 2px; height: 100%; background-color: #e9ecef; z-index: 1; margin-top: 40px;">
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Under Review</h6>
                            <p class="text-muted mb-0">Your application is currently being reviewed by the selection
                                committee</p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="d-flex align-items-start">
                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-muted">Awaiting Decision</h6>
                            <p class="text-muted mb-0">Results will be announced on February 1, 2025</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-warning text-center py-4 mt-4" role="alert">
                <i class="bi bi-clock-history display-6 mb-3 d-block"></i>
                <h4 class="fw-bold">Application Under Review</h4>
                <p class="mb-0">Your application is being reviewed by our selection committee. We'll notify you once a
                    decision has been made.</p>
            </div>

        @elseif($user->status == 'accepted')
            <!-- Accepted Status -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0 fw-bold">OSIS Application Status</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Timeline Item 1 -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-check"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Application Submitted</h6>
                            <p class="text-muted mb-0">Your OSIS application has been successfully submitted on January 15,
                                2025</p>
                        </div>
                    </div>

                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Review Completed</h6>
                            <p class="text-muted mb-0">Your application was thoroughly reviewed by the selection committee
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="d-flex align-items-start">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-success">Selection Results</h6>
                            <p class="text-muted mb-0">Congratulations! You have been selected as an OSIS member for the
                                2025 term.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-success text-center py-5 mt-4" role="alert">
                <i class="bi bi-party-popper display-4 mb-3 d-block"></i>
                <h3 class="fw-bold mb-3">🎉 Congratulations!</h3>
                <p class="fs-5 mb-3">You have been selected as an OSIS member! Get ready to lead and inspire your school
                    community.</p>
                <p class="mb-0">Your journey as a student leader begins now. We encourage you to make the most of your
                    potential to create a positive impact on your school community.</p>
            </div>

            <div class="card border mt-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">What's Next?</h5>

                    <div class="d-flex align-items-center py-3 border-bottom">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 30px; height: 30px;">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Orientation Meeting</h6>
                            <p class="text-muted mb-0">Attend the OSIS orientation on February 1, 2025 at 09:00 AM in the
                                school auditorium</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center py-3 border-bottom">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 30px; height: 30px;">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Team Introduction</h6>
                            <p class="text-muted mb-0">Meet your fellow OSIS members and get assigned to your department</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center py-3">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 30px; height: 30px;">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Training Program</h6>
                            <p class="text-muted mb-0">Complete the leadership training program scheduled for the first two
                                weeks</p>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Rejected Status -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0 fw-bold">OSIS Application Status</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Timeline Item 1 -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-check"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Application Submitted</h6>
                            <p class="text-muted mb-0">Your OSIS application has been successfully submitted on January 15,
                                2025</p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-search"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Review Completed</h6>
                            <p class="text-muted mb-0">Your application was thoroughly reviewed by the selection committee
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="d-flex align-items-start">
                        <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-x"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Selection Results</h6>
                            <p class="text-muted mb-0">We're sorry, but you were not selected for the OSIS this time. Thank
                                you for your interest.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-danger text-center py-5 mt-4" role="alert">
                <i class="bi bi-heart display-4 mb-3 d-block"></i>
                <h4 class="fw-bold mb-3">Thank You for Your Interest</h4>
                <p class="mb-3">While you weren't selected this time, we truly appreciate your willingness to serve your
                    school community.</p>
                <p class="mb-0">We encourage you to stay involved in school activities and consider applying again next
                    year.</p>
            </div>

            <div class="card border mt-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Keep Moving Forward</h5>

                    <div class="d-flex align-items-center py-3 border-bottom">
                        <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 30px; height: 30px;">
                            <i class="bi bi-star"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Develop Your Skills</h6>
                            <p class="text-muted mb-0">Continue participating in school activities and developing your
                                leadership skills</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center py-3 border-bottom">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 30px; height: 30px;">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Stay Positive</h6>
                            <p class="text-muted mb-0">Many successful leaders faced rejections before achieving their goals
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center py-3">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 30px; height: 30px;">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Future Opportunities</h6>
                            <p class="text-muted mb-0">Look out for leadership opportunities in clubs, committees, and next
                                year's OSIS</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Application Summary -->
        <div class="card bg-light border-0 mt-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Your Application Summary</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Full Name:</strong> {{ $user->nama }}</p>
                        <p><strong>NISN:</strong> {{ $user->nisn }}</p>
                        <p><strong>Class:</strong> {{ $user->kelas->nama }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Application Date:</strong> {{ $user->created_at->format('F j, Y') }}</p>
                        <p><strong>Contact:</strong> {{ $user->no_hp }}</p>
                        <p><strong>Status:</strong>
                            @if($user->status == 'pending')
                                <span class="text-warning fw-bold">Under Review</span>
                            @elseif($user->status == 'accepted')
                                <span class="text-success fw-bold">Accepted</span>
                            @else
                                <span class="text-danger fw-bold">Not Selected</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <strong>Your Motivation:</strong>
                    <p class="text-muted mt-2 p-3 bg-white rounded border">{{ $user->motivasi }}</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>