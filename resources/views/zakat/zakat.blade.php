@extends('partials.layout')

@section('content')
    <main id="main">
        <!-- ======= Section Title ======= -->
        <section class="py-5">
            <div class="container">
                <div class="section-title text-center mb-5" data-aos="fade-up">
                    <h2>Jenis Zakat</h2>
                    <p>Pilih jenis Zakat</p>
                </div>

                <div class="row gy-4">
                    @forelse ($zakats as $zakat)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-lg w-100">
                                <img src="{{ asset('storage/zakats/' . $zakat->image) }}" class="card-img-top"
                                    alt="{{ $zakat->title }}" style="height: 220px; object-fit: cover;">

                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="text-center mb-2">
                                        <h5 class="card-title">{{ $zakat->title }}</h5>
                                    </div>

                                    <p class="mb-2"><strong>Target:</strong> Rp {{ number_format($zakat->target, 0, ',', '.') }}
                                    </p>
                                    <div class="progress mb-3" style="height: 8px;">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 50%; background-color: #f68f28;" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href="{{ route('zakat.kirim-zakat', ['zakat' => $zakat->id]) }}" class="btn"
                                            style="background-color: #f68f28; color: white;">
                                            Zakat Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <div class="alert alert-warning">
                                <strong>Belum ada jenis infaq yang tersedia.</strong>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection