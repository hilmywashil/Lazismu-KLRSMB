<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Berita') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <img src="{{ asset("storage/beritas/{$berita->image}") }}" alt="{{ $berita->judul }}"
                    class="w-full h-72 object-cover">

                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $berita->judul }}</h1>

                    <p class="text-sm text-gray-500 mb-4">
                        Dipublikasikan pada: {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                    </p>

                    <div class="text-gray-700 leading-relaxed">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>

                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <div class="mt-6 flex gap-4">
                            <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.berita.delete', $berita->id) }}" method="POST"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data tidak bisa dikembalikan setelah dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
