@extends('partials.layout')

@section('content')
    <main class="main">
        <section id="hero" class="hero section">
            <div style="margin-bottom: 50px;" data-aos="fade-up">
                <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                    data-bs-interval="5000">
                    @if ($heroes->isEmpty())
                        <div class="carousel-item active"
                            style="background-color:#f68f28; background-image: url('assets/img/placeholder.jpg'); background-size: cover; background-position: center; display: flex; justify-content: center; align-items: center; padding: 40px 0;">
                            <div class="text-center text-white">
                                <h3>Banner Kosong</h3>
                                <p>Silakan unggah gambar banner untuk ditampilkan di sini.</p>
                            </div>
                        </div>
                    @else
                        @foreach ($heroes as $index => $h)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                                style="background-color:#f68f28; background-image: url('assets/img/background.jpg'); background-size: cover; background-position: center; display: flex; justify-content: center; align-items: center; padding: 40px 0;">
                                <img src="{{ asset('storage/heroes/' . $h->image) }}" alt="" class="img-fluid"
                                    style="aspect-ratio: 16 / 9; width: 70%; object-fit: cover; border-radius: 20px;">
                            </div>
                        @endforeach
                    @endif

                    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                    </a>
                    <ol class="carousel-indicators"></ol>
                </div>
            </div>
        </section>

        <section id="featured-services" class="featured-services section">
            <div class="container">
                <div class="row gy-2">
                    <div class="section-title text-center" data-aos="fade-up">
                        <h2>Program Utama Lazismu</h2>
                    </div>
                    @foreach ($dokumentasis as $dok)
                        <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-item position-relative"
                                style="padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 100%; margin: 0 auto; background: #fff; display: flex; flex-direction: column; justify-content: space-between;">
                                <div>
                                    <h4 style="font-size: 16px; font-weight: bold;"><a
                                            href="{{ route('detail.dokumentasi', $dok->id) }}"
                                            class="stretched">{{ $dok->judul }}</a></h4>
                                    <p style="font-size: 14px;">{{ $dok->deskripsi }}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    @if ($dokumentasis->isEmpty())
                        <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="200">
                            <p>Belum ada yang tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section id="call-to-action" class="call-to-action section accent-background">
            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Program Spesial Lazismu</h3>
                            <p>Ambulans untuk Negri.</p>
                            <p>Siap Siaga Antar Jemput Pasien & Kegawatdaruratan</p>
                            <a class="cta-btn" href="#appointment">Hubungi</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</span>
                            </li>
                            <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in
                                    voluptate
                                    velit.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis
                                    aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore
                                    eu fugiat nulla
                                    pariatur.</span></li>
                        </ul>
                        <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non
                            proident.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                      {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                          "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "centeredSlides": true,
                        "pagination": {
                          "el": ".swiper-pagination",
                          "type": "bullets",
                          "clickable": true
                        },
                        "breakpoints": {
                          "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 0
                          },
                          "768": {
                            "slidesPerView": 3,
                            "spaceBetween": 20
                          },
                          "1200": {
                            "slidesPerView": 5,
                            "spaceBetween": 20
                          }
                        }
                      }
                    </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                                href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg"
                                    class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                                href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg"
                                    class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                                href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg"
                                    class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                                href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg"
                                    class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                                href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg"
                                    class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                                href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg"
                                    class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                                href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg"
                                    class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                                href="assets/img/gallery/gallery-8.jpg"><img src="assets/img/gallery/gallery-8.jpg"
                                    class="img-fluid" alt=""></a></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Gallery Section -->
        <section id="contact" class="contact section">
            <div class="container my-5">
                <div class="section-title text-center mb-4">
                    <h2>Lokasi</h2>
                    <p>Hubungi kami untuk informasi lebih lanjut.</p>
                </div>
                <div class="contact-section">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17805.612238599082!2d107.61528638922135!3d-6.932896422096376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e87ddb7a5863%3A0x17cc7ee41569932a!2sRumah%20Sakit%20Muhammadiyah%20Bandung!5e0!3m2!1sid!2sid!4v1736407803282!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection