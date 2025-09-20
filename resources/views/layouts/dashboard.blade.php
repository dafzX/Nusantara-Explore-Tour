<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard - Nusantara Explore Tour</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('assets-dashboard/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Navbar */
        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
            letter-spacing: 0.5px;
        }
        .sb-topnav {
            background: linear-gradient(90deg, #1e3c72, #2a5298);
            box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
        }
        /* Sidebar */
        .sb-sidenav {
            background: linear-gradient(180deg, #2a5298, #1e3c72);
        }
        .sb-sidenav .nav-link {
            color: #d1d1d1;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .sb-sidenav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            padding-left: 20px;
        }
        .sb-sidenav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            color: #fff;
        }
        /* Card hover effect */
        .dashboard-card {
            transition: all 0.3s ease-in-out;
            border: none;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.08);
        }
        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0px 8px 18px rgba(0,0,0,0.12);
        }
        /* Footer */
        footer {
            background-color: #fff;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <!-- Top Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <a class="navbar-brand ps-3" href="/dashboard">
            <i class="fas fa-map-marked-alt me-2"></i> Dashboard
        </a>
        <button class="btn btn-link btn-sm me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" id="userDropdown" role="button" data-bs-toggle="dropdown">
                    <span>{{ $nama ?? 'Admin' }}</span>

                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li> -->
                    <!-- <li><hr class="dropdown-divider" /></li> -->
                    <li><a class="dropdown-item" href="{{ route('logout.admin') }}"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-white-50">Main</div>
                        <a class="nav-link" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="/tour_dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-route"></i></div>
                            Tour
                        </a>
                        <a class="nav-link" href="{{ route('paket.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Paket Tour
                        </a>
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Tour Categories
                        </a>
                        <a class="nav-link" href="{{ route('dashboard.bookings') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-route"></i></div>
                            Booking
                        </a> 
                        <a href="{{ route('laporan.booking') }}" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Laporan Booking
                        </a>
                        <a class="nav-link" href="/dashboard/contactus">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Contact Us
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div id="layoutSidenav_content">
            <main class="p-4">
                @yield('konten')
            </main>
            <footer class="py-3 text-center small">
                <div class="text-muted">© 2025 Nusantara Explore Tour | All Rights Reserved</div>
            </footer>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-dashboard/js/scripts.js') }}"></script>
</body>
</html>
