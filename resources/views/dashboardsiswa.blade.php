<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BijakOSIS - Dashboard Siswa</title>
    @vite(['resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .quote-section {
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            color: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .profile-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .status-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .status-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 20px 25px;
            border-radius: 12px 12px 0 0;
        }

        .status-title {
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
            font-size: 1.1rem;
        }

        .status-badge {
            background-color: #fff3cd;
            color: #856404;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-body {
            padding: 25px;
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            position: relative;
        }

        .timeline-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 15px;
            top: 35px;
            width: 2px;
            height: 45px;
            background-color: #e9ecef;
        }

        .timeline-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .timeline-icon.completed {
            background-color: #28a745;
            color: white;
        }

        .timeline-icon.current {
            background-color: #17a2b8;
            color: white;
        }

        .timeline-icon.pending {
            background-color: #6c757d;
            color: white;
        }

        .timeline-content h6 {
            margin: 0 0 5px 0;
            font-weight: 600;
            color: #2c3e50;
        }

        .timeline-content small {
            color: #6c757d;
            line-height: 1.4;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                BijakOSIS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                            Ahmad Rizki
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm mb-4">
                    <div class="d-flex align-items-center">
                        <img src="https://ui-avatars.com/api/?name=Irvanheldyfauzan&background=4a5568&color=fff&size=80"
                            alt="Profile" class="profile-img me-3">
                        <div>
                            <h4 class="mb-1">Welcome back, Ahmad Rizki</h4>
                            <p class="mb-2 opacity-75">NISN: 0012345678 Class: XII IPA 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="quote-section d-flex align-items-center"
                    style="background: linear-gradient(90deg, #374151 0%, #2d3748 100%); color: #f8fafc;">
                    <i class="fas fa-quote-left fa-2x me-3" style="color: #a0aec0;"></i>
                    <div>
                        <span style="font-size:1.15rem;font-weight:500;">"Leadership is not
                            about being in charge. It's about taking care of those in your
                            charge."</span><br>
                        <span style="color:#cbd5e1;font-size:0.95rem;">- Simon Sinek</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="status-section mb-4">
                    <div class="status-header d-flex justify-content-between align-items-center">
                        <h5 class="status-title mb-0">OSIS Application Status</h5>
                        <span class="status-badge"><i class="fas fa-clock me-1"></i> Pending Review</span>
                    </div>
                    <div class="status-body">
                        <div class="timeline-item">
                            <div class="timeline-icon completed"><i class="fas fa-check"></i></div>
                            <div class="timeline-content">
                                <h6>Application Submitted</h6>
                                <small>Your OSIS application has been successfully submitted on <b>January 15,
                                        2025</b></small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon current"><i class="fas fa-hourglass-half"></i></div>
                            <div class="timeline-content">
                                <h6>Under Review</h6>
                                <small>Your application is currently being reviewed by the selection committee</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon pending"><i class="fas fa-bullhorn"></i></div>
                            <div class="timeline-content">
                                <h6 class="text-muted">Announcement</h6>
                                <small class="text-muted">Results will be announced on <b>February 1, 2025</b></small>
                            </div>
                        </div>
                        <div class="mt-4 p-3 rounded bg-light border">
                            <strong>Announcement Date</strong><br>
                            <span class="text-muted">Please wait for the official announcement on <b>February 1,
                                    2025</b>. Results will be available in your dashboard on that date.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>