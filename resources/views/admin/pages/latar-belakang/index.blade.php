<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latar Belakang') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 ">

                @if ($latarbelakang->isEmpty())
                        <div class="col-span-full text-center text-gray-500">
                            <a href="{{ route('admin.latar-belakang.create') }}"
                                class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-600 transition">
                                Tambah Latar Belakang
                            </a>
                        </div>
                    </div>
                @else
                    @foreach ($latarbelakang as $latar)
                        <a href="{{ route('admin.latar-belakang.edit', $latar->id)}}"
                            class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 transition">
                            <div class="flex items-center justify-center mb-3">
                                <i class="bi bi-info-circle text-4xl text-blue-500"></i>
                            </div>
                            <h5 class="text-center text-lg font-semibold">Klik untuk edit Latar Belakang</h5>
                            <p class="text-center mt-4">{{ Str::limit($latar->isi, 400) }}</p>
                        </a>
                    @endforeach
                @endif
        </div>
    </div>
</x-app-layout>