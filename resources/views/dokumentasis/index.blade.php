<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Program Lazismu') }}
            </h2>
            <a href="{{ route('admin.program.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                + Tambah Program
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($dokumentasis as $item)
                    <div class="group relative bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->judul }}</h3>
                            <p class="text-gray-600">{{ $item->deskripsi }}</p>
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 space-x-2">
                            <a href="{{ route('admin.program.show', $item->id) }}"
                                class="text-white bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">
                                Lihat
                            </a>
                            <a href=""
                                class="text-white bg-yellow-500 px-4 py-2 rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('admin.program.delete', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>