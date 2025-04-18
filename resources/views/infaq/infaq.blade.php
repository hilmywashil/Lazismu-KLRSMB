@extends('partials.layout')

@section('content')
    <main id="main">
        <!-- ======= Section Title ======= -->
        <section class="py-5">
            <div class="container">
                <div class="section-title text-center mb-5" data-aos="fade-up">
                    <h2>Jenis Infaq</h2>
                    <p>Pilih jenis infaq yang ingin Anda bantu</p>
                </div>

                <div class="row gy-4">
                    @forelse ($infaqs as $infaq)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-lg w-100">
                                <img src="{{ asset('storage/infaqs/' . $infaq->image) }}" class="card-img-top"
                                    alt="{{ $infaq->title }}" style="height: 220px; object-fit: cover;">

                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="text-center mb-3">
                                        <h5 class="card-title">{{ $infaq->title }}</h5>
                                    </div>

                                    <p class="mb-2"><strong>Target:</strong> Rp {{ number_format($infaq->target, 0, ',', '.') }}
                                    </p>
                                    <div class="progress mb-3" style="height: 8px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href="{{ route('infaq.kirim-infaq', ['infaq' => $infaq->id]) }}"
                                            class="btn btn-success">
                                            Donasi Sekarang
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