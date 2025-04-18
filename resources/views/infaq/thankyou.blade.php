@extends('partials.layout')

@section('content')
<main id="main" class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="zoom-in">
                <!-- Icon Centang -->
                <div class="text-success mb-4" style="font-size: 100px;">
                    <i class="fas fa-check-circle"></i>
                </div>

                <!-- Judul Terima Kasih -->
                <h1 class="text-success font-weight-bold mb-3" data-aos="fade-down">Terima Kasih</h1>

                <!-- Pesan -->
                <p class="h4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    Jazakallah khairan katsiran, infaq Anda telah kami terima dan akan segera ditindaklanjuti oleh Admin.
                </p>

                <!-- Tombol ke Beranda (opsional) -->
                <a href="{{ url('/') }}" class="btn btn-success px-4 py-2 mt-2" data-aos="fade-up" data-aos-delay="200">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
@endpush

@push('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush
