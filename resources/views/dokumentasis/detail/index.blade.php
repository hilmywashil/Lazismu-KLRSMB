@extends('partials.layout')

@section('content')
    <main class="main">
        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">
            <div class="container">
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ $details->first()?->dokumentasi->judul }}</h2>
                    <p>{{ $details->first()?->dokumentasi->deskripsi }}</p>
                </div>
                <!-- Gallery Grid -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" data-aos="fade-up">
                    @forelse ($details as $d)
                        @if ($d->image)
                            <div class="col">
                                <a class="glightbox" data-gallery="images-gallery"
                                    href="{{ asset('storage/dokumentasi/' . $d->image) }}">
                                    <img src="{{ asset('storage/dokumentasi/' . $d->image) }}" class="img-fluid rounded-3"
                                        style="aspect-ratio: 4 / 3; object-fit: cover;" alt="">
                                </a>
                            </div>
                        @endif
                    @empty
                        <p class="text-muted">Belum ada gambar dokumentasi.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <!-- Button to Trigger Modal -->
    @if (Auth::check() && Auth::user()->role == 'admin')
        <div class="col">
            <button type="button" class="btn floating-button" data-bs-toggle="modal" data-bs-target="#uploadModal" 
                style="position: fixed; bottom: 20px; left: 20px; z-index: 1000; background-color: #007bff; color: white; border-radius: 50%; width: 50px; height: 50px; font-size: 24px; display: flex; align-items: center; justify-content: center;">
                +
            </button>
        </div>
    @endif

    {{-- Modal for Uploading Image --}}
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Tambahkan Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.program.gambar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="dokumentasi_id"
                                value="{{ $details->first()?->dokumentasi->id }}">
                            <label for="image" class="form-label">Pilih Gambar</label>
                            <input type="file" name="image" accept="image/*" required class="form-control" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
