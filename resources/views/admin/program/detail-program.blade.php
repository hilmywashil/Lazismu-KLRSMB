<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Dokumentasi') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Judul dan Deskripsi -->
            <div class="bg-white shadow-xl sm:rounded-2xl p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    {{ $details->first()?->dokumentasi->judul ?? 'Judul Dokumentasi' }}
                </h2>
                <p class="text-gray-600">
                    {{ $details->first()?->dokumentasi->deskripsi ?? 'Deskripsi dokumentasi belum tersedia.' }}
                </p>
            </div>

            <!-- Grid Gambar -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($details as $d)
                    @if ($d->image)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden group relative">
                            <a href="{{ asset('storage/dokumentasi/' . $d->image) }}" class="block glightbox" data-gallery="images-gallery">
                                <img src="{{ asset('storage/dokumentasi/' . $d->image) }}"
                                     alt="Gambar Dokumentasi"
                                     class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                            </a>
                        </div>
                    @endif
                @empty
                    <div class="col-span-full">
                        <p class="text-gray-500">Belum ada gambar dokumentasi.</p>
                    </div>
                @endforelse
            </div>

            <!-- Form Upload untuk Admin -->
            @if (Auth::check() && Auth::user()->role == 'admin')
                <div class="mt-10 bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Tambahkan Gambar</h3>
                    <form action="{{ route('dokumentasi.gambar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="dokumentasi_id" value="{{ $details->first()?->dokumentasi->id }}">
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Pilih Gambar</label>
                            <input type="file" name="image" id="image" accept="image/*" required class="form-control file:border file:border-gray-300 file:rounded file:px-3 file:py-2">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Upload</button>
                    </form>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
