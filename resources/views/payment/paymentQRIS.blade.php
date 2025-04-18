@extends('partials.layout')

@section('content')
    <main id="main">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded" data-aos="zoom-in">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <!-- Gambar QRIS -->
                                <div class="col-md-6 text-center mb-4 mb-md-0" data-aos="zoom-in">
                                    <img src="{{ asset('assets/img/infaq.jpeg') }}" alt="QRIS Donasi"
                                        class="img-fluid qris-img" data-aos="flip-left" data-aos-delay="100"
                                        onclick="showFullQRIS(this)" style="cursor: pointer;">
                                </div>

                                <!-- Tulisan -->
                                <div class="col-md-6 text-center text-md-left" data-aos="fade-left">
                                    <h5 class="mb-4">Scan QRIS di samping untuk melanjutkan pembayaran Infaq</h5>
                                    <p class="h5 mt-4 mb-4"><strong>a.n. LAZISMU KL RS MUHAMMADIYAH INFAQ</strong></p>
                                    <a href="{{ route('infaq.thankyou') }}" class="btn btn-success">
                                        <i class="fas fa-check me-2"></i> Saya sudah melakukan pembayaran
                                    </a>

                                </div>
                                <!-- Tombol Selesai -->
                                <div class="col-12 text-center mt-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Fullscreen -->
    <div id="qrModal" class="modal" onclick="closeFullQRIS()"
        style="display:none; position:fixed; z-index:1050; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center;">
        <img id="qrModalImg" src="" alt="QRIS Fullscreen" style="max-width:90%; max-height:90%;">
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .qris-img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #qrModal {
            display: none;
        }

        #qrModal img {
            border-radius: 10px;
        }
    </style>
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

            function showFullQRIS(img) {
                const modal = document.getElementById('qrModal');
                const modalImg = document.getElementById('qrModalImg');
                modalImg.src = img.src;
                modal.style.display = 'flex';
            }

        function closeFullQRIS() {
            document.getElementById('qrModal').style.display = 'none';
        }
    </script>
@endpush