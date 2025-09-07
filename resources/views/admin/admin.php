<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BijakoSIS - Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50 !important;
        }
        
        .graduation-cap {
            margin-right: 8px;
            font-size: 1.3rem;
        }
        
        .main-content {
            padding: 2rem;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            color: #6c757d;
            margin-bottom: 2rem;
        }
        
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border: none;
            height: 100%;
        }
        
        .stats-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        
        .stats-icon.people {
            background-color: #e8f4f8;
            color: #0ea5e9;
        }
        
        .stats-icon.check {
            background-color: #dcfce7;
            color: #16a34a;
        }
        
        .stats-icon.star {
            background-color: #fef3c7;
            color: #f59e0b;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            line-height: 1;
            margin-bottom: 0.25rem;
        }
        
        .stats-label {
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .stats-meta {
            font-size: 0.875rem;
            color: #9ca3af;
        }
        
        .success-alert {
            background-color: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 2rem;
            position: relative;
        }
        
        .success-alert .btn-close {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #166534;
            opacity: 0.5;
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn-filter {
            background-color: #374151;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            margin-right: 0.5rem;
        }
        
        .btn-export {
            background-color: transparent;
            color: #6b7280;
            border: 1px solid #d1d5db;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
            font-size: 0.875rem;
            color: #6b7280;
            text-transform: uppercase;
            padding: 1rem;
        }
        
        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: middle;
        }
        
        .student-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #6b7280;
            margin-right: 0.75rem;
        }
        
        .student-info {
            display: flex;
            align-items: center;
        }
        
        .student-name {
            font-weight: 600;
            color: #1f2937;
        }
        
        .badge-accepted {
            background-color: #dcfce7;
            color: #166534;
            border: none;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .badge-pending {
            background-color: #fef3c7;
            color: #92400e;
            border: none;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .badge-rejected {
            background-color: #fee2e2;
            color: #991b1b;
            border: none;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .btn-action {
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            background: white;
            color: #6b7280;
            font-size: 0.875rem;
            margin-right: 0.5rem;
        }
        
        .btn-action:hover {
            background-color: #f3f4f6;
        }
        
        .pagination-container {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .pagination {
            margin-bottom: 0;
        }
        
        .pagination .page-link {
            border: 1px solid #d1d5db;
            color: #6b7280;
            padding: 0.5rem 0.75rem;
        }
        
        .pagination .page-item.active .page-link {
            background-color: #1f2937;
            border-color: #1f2937;
            color: white;
        }
        
        .navbar {
            background-color: white !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .navbar-nav .nav-link {
            color: #6b7280 !important;
            font-weight: 500;
        }
    </style>
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#">
                <i class="bi bi-mortarboard graduation-cap"></i>
                BijakoSIS
                <span style="font-size: 0.875rem; color: #6b7280; font-weight: 400;">Admin Dashboard</span>
            </a>
            
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-2" style="font-size: 1.5rem;"></i>
                        Admin
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


            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="stats-icon people">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="stats-number">156</div>
                        <div class="stats-label">Total Applicants</div>
                        <div class="stats-meta">+12 from last week</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="stats-icon check">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="stats-number">89</div>
                        <div class="stats-label">Qualified Applicants</div>
                        <div class="stats-meta">57% qualification rate</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="stats-icon star">
                            <i class="bi bi-star"></i>
                        </div>
                        <div class="stats-number">26</div>
                        <div class="stats-label">Final Selected</div>
                        <div class="stats-meta">Target: 30 positions</div>
                    </div>
                </div>
            </div>

            <div class="success-alert">
                <i class="bi bi-check-circle me-2"></i>
                <strong>Action completed successfully</strong><br>
                Ahmad Rizki has been accepted and notified
                <button type="button" class="btn-close">&times;</button>
            </div>


            <div class="table-container">
                <div class="table-header">
                    <h3 class="section-title mb-0">Student Applicants</h3>
                    <div>
                        <button class="btn-filter">
                            <i class="bi bi-funnel me-2"></i>
                            Set Filter
                        </button>
                        <button class="btn-export">
                            <i class="bi bi-download me-2"></i>
                            Export
                        </button>
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
                            <tr>
                                <td>
                                    <div class="student-info">
                                        <div class="student-avatar">AR</div>
                                        <span class="student-name">Ahmad Rizki</span>
                                    </div>
                                </td>
                                <td>2025001234</td>
                                <td>XI IPA 1</td>
                                <td>85.5</td>
                                <td>95%</td>
                                <td>0</td>
                                <td>Pramuka, PMR</td>
                                <td><span class="badge-accepted">✓ Accepted</span></td>
                                <td>
                                    <button class="btn-action">👁 View</button>
                                    <button class="btn-action">✓ Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-info">
                                        <div class="student-avatar">SN</div>
                                        <span class="student-name">Siti Nurhaliza</span>
                                    </div>
                                </td>
                                <td>2025001235</td>
                                <td>XI IPS 2</td>
                                <td>88.2</td>
                                <td>92%</td>
                                <td>0</td>
                                <td>Rohis, English Club</td>
                                <td><span class="badge-pending">● Pending</span></td>
                                <td>
                                    <button class="btn-action">👁 View</button>
                                    <button class="btn-action">✓ Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-info">
                                        <div class="student-avatar">BS</div>
                                        <span class="student-name">Budi Santoso</span>
                                    </div>
                                </td>
                                <td>2025001236</td>
                                <td>X MIPA 3</td>
                                <td>75.8</td>
                                <td>88%</td>
                                <td>1</td>
                                <td>Basket, Futsal</td>
                                <td><span class="badge-rejected">× Rejected</span></td>
                                <td>
                                    <button class="btn-action">👁 View</button>
                                    <button class="btn-action">× Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-info">
                                        <div class="student-avatar">DL</div>
                                        <span class="student-name">Dewi Lestari</span>
                                    </div>
                                </td>
                                <td>2025001237</td>
                                <td>XI IPA 2</td>
                                <td>91.3</td>
                                <td>97%</td>
                                <td>0</td>
                                <td>KIR, Teater</td>
                                <td><span class="badge-pending">● Pending</span></td>
                                <td>
                                    <button class="btn-action">👁 View</button>
                                    <button class="btn-action">✓ Accept</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="student-info">
                                        <div class="student-avatar">EP</div>
                                        <span class="student-name">Eko Prasetyo</span>
                                    </div>
                                </td>
                                <td>2025001238</td>
                                <td>X IPS 1</td>
                                <td>82.7</td>
                                <td>90%</td>
                                <td>0</td>
                                <td>Paskibra, Voli</td>
                                <td><span class="badge-pending">● Pending</span></td>
                                <td>
                                    <button class="btn-action">👁 View</button>
                                    <button class="btn-action">✓ Accept</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="pagination-container">
                    <div style="color: #6b7280;">
                        Showing 1 to 5 of 156 results
                    </div>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">‹</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <span class="page-link">...</span>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">32</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">›</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
      
        document.querySelector('.btn-close').addEventListener('click', function() {
            this.parentElement.style.display = 'none';
        });

        document.querySelectorAll('.btn-action').forEach(button => {
            button.addEventListener('click', function() {
                const action = this.textContent.trim();
                if (action.includes('Accept')) {
                    alert('Student accepted successfully!');
                } else if (action.includes('Reject')) {
                    alert('Student rejected.');
                } else if (action.includes('View')) {
                    alert('Opening student details...');
                }
            });
        });

   
        document.querySelector('.btn-filter').addEventListener('click', function() {
            alert('Filter options would open here');
        });

     
        document.querySelector('.btn-export').addEventListener('click', function() {
            alert('Export functionality would be implemented here');
        });
    </script>
</body>
</html>