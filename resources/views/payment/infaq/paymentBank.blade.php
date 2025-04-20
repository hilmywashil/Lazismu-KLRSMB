@extends('partials.layout')

@section('content')
    <main id="main" class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded" data-aos="zoom-in">
                        <div class="card-body text-center">
                            <p class="h5" data-aos="fade-right">
                                Silakan transfer donasi Anda ke nomor rekening berikut:
                            </p>
                            <div class="mt-4 mb-4" data-aos="flip-left" data-aos-delay="100">
                                <p class="h4 font-weight-bold text-dark">
                                    <strong>2314 1453 5887 5339</strong>
                                </p>
                                <p class="h5">
                                    a.n. <strong>LAZISMU RSMB</strong>
                                </p>
                            </div>
                            <p class="text-muted" data-aos-delay="200">
                                Setelah melakukan transfer, silakan konfirmasi kepada admin melalui kontak yang tersedia.
                            </p>
                            <a href="{{ route('infaq.thankyou') }}" class="btn btn-success">
                                <i class="fas fa-check me-2"></i> Saya sudah melakukan pembayaran
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
@endpush

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endpush