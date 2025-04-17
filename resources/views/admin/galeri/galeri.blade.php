<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lazismu RSMB</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="https://lazismu.org/favicon.png" rel="icon">
    <link href="https://lazismu.org/favicon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/assets/css/main.css" rel="stylesheet">

    <style>
        /* Custom CSS for Floating Button */
        .floating-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
            width: 50px;
            height: 50px;
            font-size: 30px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .floating-button:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body class="latarbelakang-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="d-none d-md-flex align-items-center">
                    <i class="bi bi-bilding me-1"></i> Lazismu Rumah Sakit Muhammadiyah Bandung
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-phone me-1"></i> Call Center : +62 234 5678
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-end">
                <a href="beranda.html" class="logo d-flex align-items-center me-auto">
                    <img src="/assets/img/RSMB.png" alt="">
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="/" class="#">Beranda</a></li>
                        <li class="dropdown"><a href="#"><span>Tentang kami</span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="http://127.0.0.1:8000/page/latarbelakang.html">Latar Belakang</a></li>
                                <li><a href="http://127.0.0.1:8000/page/contact.html">Contact</a></li>
                                <li><a href="http://127.0.0.1:8000/#services">Berita</a></li>
                                <li><a href="/donasi-disini">Donasi</a></li>
                            </ul>
                            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">
            <div class="container">
                <div class="container section-title" data-aos="fade-up">
                    <h2>Galeri Dokumentasi</h2>
                </div>
                <!-- Gallery Grid -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" data-aos="fade-up">
                    @forelse ($galleries as $g)
                        <div class="col">
                            <a class="glightbox" data-gallery="images-gallery"
                                href="{{ asset('storage/galleries/' . $g->image) }}">
                                <img src="{{ asset('storage/galleries/' . $g->image) }}" class="img-fluid rounded-3"
                                    style="aspect-ratio: 4 / 3; object-fit: cover;" alt="">
                            </a>
                            <form action="{{ route('admin.hero.delete', $g->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada gambar banner.</p>
                    @endforelse
                </div>  
            </div>
        </section>
    </main>

    <!-- Button to Trigger Modal -->
    @if (Auth::check() && Auth::user()->role == 'admin')
        <div class="col">
            <a class="btn floating-button" href="{{ route('admin.hero.create') }}">
                +
            </a>
        </div>
    @endif

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>
