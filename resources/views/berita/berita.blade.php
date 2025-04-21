@extends('partials.layout')

@section('content')
    <main id="main">
        <!-- ======= Section Title ======= -->
        <section class="py-5">
            <div class="container">
                <div class="section-title text-center mb-5" data-aos="fade-up">
                    <h2>Berita Kami</h2>
                    <p>Informasi terbaru seputar kegiatan dan program Lazismu KLRSMB</p>
                </div>

                <div class="row gy-4">
                    @forelse ($beritas as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-lg w-100">
                                <img src="{{ asset('storage/beritas/' . $item->image) }}" class="card-img-top"
                                    alt="{{ $item->judul }}" style="height: 220px; object-fit: cover;">

                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="text-center mb-2">
                                        <h5 class="card-title">{{ $item->judul }}</h5>
                                    </div>

                                    <p class="mb-3">{{ Str::limit(strip_tags($item->konten), 100, '...') }}</p>

                                    <div class="text-center">
                                        <a href="{{ route('berita.detail', $item->id) }}" class="btn"
                                            style="background-color: #f68f28; color: white;">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <div class="alert alert-warning">
                                <strong>Belum ada berita yang tersedia.</strong>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
