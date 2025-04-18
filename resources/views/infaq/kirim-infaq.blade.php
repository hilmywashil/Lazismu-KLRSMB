@extends('partials.layout')

@section('content')
    <main id="main">
        <section class="py-5">
            <div class="container">
                <div class="section-title text-center mb-4" data-aos="fade-up">
                    <h2>Kirim Infaq</h2>
                    <p>Silakan isi formulir di bawah ini untuk berdonasi.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{ route('infaq.kirim-infaq.store') }}" method="POST"
                            class="bg-white p-4 shadow rounded" data-aos="fade-up" data-aos-delay="100">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required
                                    value="{{ old('nama') }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required
                                    value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Donasi (Rp)</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required min="1000"
                                    value="{{ old('jumlah') }}">
                            </div>

                            <div class="mb-3">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                                    <option value="">-- Pilih Metode Pembayaran --</option>
                                    <option value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>
                                        Transfer Bank</option>
                                    <option value="e-wallet" {{ old('metode_pembayaran') == 'e-wallet' ? 'selected' : '' }}>
                                        E-Wallet / QRIS</option>
                                    <option value="Cash" {{ old('metode_pembayaran') == 'Cash' ? 'selected' : '' }}>Cash
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis Infaq</label>
                                <input type="text" class="form-control" value="{{ $infaq->title }}" disabled>
                                <input type="hidden" name="infaq_id" value="{{ $infaq_id }}">
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Kirim Donasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection