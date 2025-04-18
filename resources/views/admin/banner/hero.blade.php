<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Banner untuk Halaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($heroes as $h)
                            <div class="border rounded-lg overflow-hidden shadow-lg group relative">
                                <a href="{{ asset('storage/heroes/' . $h->image) }}" target="_blank">
                                    <div class="w-full relative" style="padding-bottom: 56.25%;">
                                        <img src="{{ asset("storage/heroes/{$h->image}") }}" alt="Banner"
                                            class="absolute top-0 left-0 w-full h-full object-cover">
                                    </div>
                                </a>
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 space-x-2">
                                    <a href="{{ asset('storage/heroes/' . $h->image) }}" target="_blank"
                                        class="btn btn-primary text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">
                                        Lihat
                                    </a>
                                    <form action="{{ route('admin.hero.delete', $h->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger text-white bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <div class="mt-6">
                            <h4 class="text-xl font-semibold mb-2 text-left">Upload Gambar Baru</h4>
                            <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data"
                                class="space-y-4">
                                @csrf
                                <div class="flex items-center space-x-4">
                                    <input type="file"
                                        class="mt-1 block w-2/3 text-sm text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                        id="image" name="image" accept="image/*" required>
                                    <button type="submit"
                                        class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                                        Upload
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mt-4 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>