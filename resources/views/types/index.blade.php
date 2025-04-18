<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lazismu RSMB</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="https://lazismu.org/favicon.png" rel="icon">
    <link href="https://lazismu.org/favicon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        /* Tombol Custom yang Seragam */
        .btn-custom {
            background-color: #f5a327;
            color: white;
            padding: 10px 25px;
            font-size: 14px;
            border-radius: 8px;
            text-align: center;
            display: inline-block;
            border: none;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.2s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #d88a1c;
            transform: scale(1.05);
        }

        /* Tombol Edit */
        .btn-edit {
            background-color: #4e73df;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 14px;
            transition: background-color 0.3s, transform 0.2s;
            display: inline-block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-edit:hover {
            background-color: #2e59d9;
            transform: scale(1.05);
        }

        /* Tombol Delete */
        .btn-delete {
            background-color: #e74a3b;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 14px;
            transition: background-color 0.3s, transform 0.2s;
            display: inline-block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-delete:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        /* Mengatur form inline untuk delete */
        form {
            display: inline-block;
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
        </div>

        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-end">
                <a href="{{'/'}}" class="logo d-flex align-items-center me-auto">
                    <img src="assets/img/RSMB.png" alt="">
                </a>
                <nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="/">Beranda</a></li>
        <li class="dropdown">
            <a href="#"><span>Tentang kami</span>
                <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul>
                <li><a href="http://127.0.0.1:8000/page/latarbelakang.html">Latar Belakang</a></li>
                <li><a href="http://127.0.0.1:8000/page/contact.html">Contact</a></li>
            </ul>
        </li>
        <li><a href="http://127.0.0.1:8000/#services">Berita</a></li>
        <li><a href="/donasi-disini">Donasi</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

            </div>
        </div>
    </header>

    <main class="main">
    <section id="donasi" class="donasi section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Tambahkan</h2>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <!-- Tombol untuk membuka modal, sudah dimodifikasi jadi oranye dan lebih besar -->
                <button id="openModal" class="btn-open-modal">+</button>
            @endif
        </div>

        <!-- Modal -->
        <div id="donasiModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Pilih jenis yang ingin ditambahkan</h3>
                <ul>
                    <li><a href="{{ route('infaq-disini.create', ['type' => 'infaq']) }}">Infaq</a></li>
                    <li><a href="{{ route('donasi-disini.create', ['type' => 'zakat']) }}">Zakat</a></li>
                </ul>
            </div>
        </div>

    </section>
</main>

<style>
    /* Modal styles */
    .modal {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Black background with transparency */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    ul {
        list-style-type: none;
    }

    ul li a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
    }

    ul li a:hover {
        background-color: #ddd;
    }

    /* Styles for the button */
    .btn-open-modal {
        font-size: 30px; /* Increase size of the "+" */
        padding: 20px;
        background-color: #ff7f32; /* Oranye */
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: inline-block;
        text-align: center;
    }

    .btn-open-modal:hover {
        background-color: #ff8c33; /* Slightly darker orange when hovered */
    }
</style>

<script>
    // Get modal
    var modal = document.getElementById("donasiModal");

    // Get button that opens the modal
    var btn = document.getElementById("openModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

            <div class="container">
                <div class="row gy-4">
                    @forelse ($types as $type)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member shadow-lg rounded p-3" style="background: #fff;">
                                <div class="member-img">
                                    <img src="{{ asset('storage/types/' . $type->image) }}" class="img-fluid rounded"
                                        alt="{{ $type->title }}">
                                </div>
                                <div class="member-info text-center mt-3">
                                    <h4>{{ $type->title }}</h4>
                                </div>
                                <div class="donation_box2 mt-3" style="font-size: 10px; text-align: left;">
                                    <div class="d_total mb-2">
                                        <strong style="font-size: 16px;">Target : Rp
                                            {{ number_format($type->target, 0, ',', '.') }}</strong>
                                    </div>
                                    <div class="donation_progress position-relative rounded"
                                        style="height: 8px; background: #f1f1f1; margin: 0 auto;">
                                        <div class="donation_progress_bar rounded"
                                            style="background: #f5a327; height: 100%;"></div>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="{{ '/donasi/create' }}" class="btn-custom">
                                        Donasi Disini
                                    </a>
                                    @if (Auth::check() && Auth::user()->role === 'admin')
                                        <hr />
                                        <div class="mt-2">
                                            <a href="{{ route('donasi-disini.edit', $type->id) }}" class="btn-edit">Edit</a>
                                            <form action="{{ route('donasi-disini.destroy', $type->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center mt-5">
                            <div class="alert alert-warning" role="alert">
                                <strong>Data kosong!</strong> Saat ini tidak ada jenis donasi yang tersedia.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <div class="container copyright text-center mt-4">
        <p><span></span> <strong class="px-1 sitename">Lazismu RSMB</strong> <span> Relawan Kebaikan</span>
        </p>
    </div>

    <footer>
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
        <div id="preloader"></div>

        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

        <script src="assets/js/main.js"></script>
    </footer>
</body>

</html>