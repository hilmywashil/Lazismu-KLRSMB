<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokumentasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Dokumentasi</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $dokumentasi->judul) }}"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                @error('judul')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi', $dokumentasi->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                    Simpan Perubahan
                </button>
                <a href="/"
                    class="w-full text-center bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg shadow ml-2">
                    Batal
                </a>
            </div>
        </form>
    </div>

</body>

</html>
