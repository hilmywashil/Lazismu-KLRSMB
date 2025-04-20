<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jenis Infaq') }}
        </h2>
    </x-slot>

    <div class="py-0 flex justify-center items-start bg-gray-100 min-h-screen">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-lg mt-10">

            <form action="{{ route('admin.infaq.update', $infaq->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Banner (Opsional)</label>
                    <input type="file" id="image" name="image"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                    @if ($infaq->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/infaqs/' . $infaq->image) }}" alt="Banner Lama" class="h-32 object-cover rounded">
                        </div>
                    @endif
                    @error('image')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $infaq->title) }}" placeholder="Masukkan judul"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="target" class="block text-sm font-medium text-gray-700">Target</label>
                    <input type="number" id="target" name="target" value="{{ old('target', $infaq->target) }}" placeholder="Masukkan target"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
                    @error('target')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                        Update
                    </button>
                    <a href="{{ route('admin.infaq.index') }}"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow text-center block mt-2">
                        Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
