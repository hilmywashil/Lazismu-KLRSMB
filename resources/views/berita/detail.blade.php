@extends('partials.layout')

@section('content')
    <main id="main">
        <!-- ======= Detail Berita ======= -->
        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10" data-aos="fade-up">
                        <div class="card shadow-lg">
                            <img src="{{ asset('storage/beritas/' . $berita->image) }}" class="card-img-top"
                                alt="{{ $berita->judul }}" style="height: 400px; object-fit: cover;">

                            <div class="card-body p-4">
                                <h2 class="card-title mb-3">{{ $berita->judul }}</h2>
                                <p class="text-muted mb-4">
                                    Dipublikasikan pada {{ $berita->created_at->translatedFormat('d F Y') }}
                                </p>

                                <div class="content">
                                    {!! $berita->konten !!}
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">
                                        ← Kembali ke Daftar Berita
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
