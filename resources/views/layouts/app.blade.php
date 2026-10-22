<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Katalog Makanan Kering')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/style.css') }}">
</head>

<body class="theme-body d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg site-nav">
        <div class="container">
            <a class="navbar-brand brand" href="{{ route('snacks.index') }}">
                <img src="{{ asset('assets/images/LOGO.png') }}" alt="Bavo Snackverse Logo" width="150" height="90" class="brand-logo d-inline-block align-text-top me-2">
                <span class="brand-text">BAVO SNACKVERSE</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama"
                aria-controls="menuUtama" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('snacks.index') ? 'active' : '' }}"
                            href="{{ route('snacks.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('snacks.index') }}#produk">Merek Snack</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('snacks.index') }}#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Contact</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="10" cy="10" r="7"></circle>
                            <line x1="15.5" y1="15.5" x2="21" y2="21"></line>
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="site-footer mt-5" id="kontak">
        <div class="container py-5">
            <hr class="footer-line mb-5">
            <div class="row g-4 justify-content-center text-center text-md-start">
                <div class="col-6 col-md-3">
                    <h6 class="fw-semibold mb-3">Products</h6>
                    <ul class="list-unstyled small footer-links">
                        <li><a href="{{ route('snacks.index') }}#produk">Keripik</a></li>
                        <li><a href="{{ route('snacks.index') }}#produk">Kacang</a></li>
                        <li><a href="{{ route('snacks.index') }}#produk">Aneka Gurih</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <h6 class="fw-semibold mb-3">Company Info</h6>
                    <ul class="list-unstyled small footer-links">
                        <li><a href="#kontak">About Us</a></li>
                        <li><a href="#kontak">Contact Us</a></li>
                        <li><a href="#kontak">Support</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-3">
                    <h6 class="fw-semibold mb-3">Kampus</h6>
                    <p class="small mb-0 footer-links">UTS Rekayasa Web<br>Sistem Informasi<br>Universitas Pamulang</p>
                </div>
            </div>
            <p class="text-center small footer-links mt-5 mb-0">Dosen Pengampu: Afif Efendi</p>
        </div>
    </footer>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
