<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Login - Nusantara Explore Tour" />
    <meta name="author" content="" />
    <title>@yield('title') | Nusantara Explore Tour</title>

    <link href="assets-dashboard/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        /* 🌊 Background gradien bernuansa laut & hutan */
        body.bg-primary {
            background: linear-gradient(135deg, #00b4d8, #0077b6, #009688);
        }

        /* Card Login */
        .card {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Header */
        .card-header {
            background: #ffffff;
            border-bottom: none;
            padding: 1.5rem;
        }

        .card-header h3 {
            font-weight: 700;
            color: #0077b6;
            letter-spacing: 1px;
        }

        /* Input */
        .form-floating > .form-control {
            border-radius: 12px;
            border: 1px solid #cfd8dc;
        }

        /* Tombol Login */
        .btn-primary {
            background: linear-gradient(90deg, #00b4d8, #0077b6);
            border: none;
            border-radius: 12px;
            padding: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0077b6, #00b4d8);
            transform: translateY(-2px);
            box-shadow: 0px 4px 12px rgba(0,0,0,0.2);
        }

        /* Footer link */
        .small a {
            color: #009688;
            font-weight: 500;
            text-decoration: none;
        }

        .small a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container vh-100 d-flex align-items-center justify-content-center">
                    <div class="row w-100 justify-content-center">
                        <div class="col-lg-5 col-md-8 col-11">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-header text-center">
                                    <h3>@yield('title_header')</h3>
                                    <p class="text-muted">Selamat datang di Nusantara Explore Tour</p>
                                </div>
                                <div class="card-body">
                                    @yield('konten')
                                </div>
                                <div class="card-footer text-center py-3">
                                    @yield('footer')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets-dashboard/js/scripts.js"></script>
</body>
</html>
