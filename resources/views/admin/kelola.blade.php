<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Konten Website') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Kartu Kelola Banner -->
                <a href="{{ route('admin.hero') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 transition">
                    <div class="flex items-center justify-center mb-3">
                        <i class="bi bi-image text-4xl text-blue-500"></i>
                    </div>
                    <h5 class="text-center text-lg font-semibold">Kelola Banner</h5>
                </a>

                <!-- Kartu Kelola Berita -->
                <a href="{{ route('admin.infaq.index') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 transition">
                    <div class="flex items-center justify-center mb-3">
                        <i class="bi bi-wallet2 text-4xl text-green-500"></i>
                    </div>
                    <h5 class="text-center text-lg font-semibold">Kelola Jenis Infaq</h5>
                </a>

                <!-- Kartu Kelola Galeri -->
                <a href="{{ route('admin.program') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 transition">
                    <div class="flex items-center justify-center mb-3">
                        <i class="bi bi-collection text-4xl text-purple-500"></i>
                    </div>
                    <h5 class="text-center text-lg font-semibold">Kelola Program Lazismu</h5>
                </a>

                <!-- Tambah kartu lainnya sesuai kebutuhan -->
            </div>
        </div>
    </div>
</x-app-layout>