<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit Profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 text-center">

                    <!-- Foto Profil -->
                    <div class="flex justify-center mt-6 mb-4">
                        <img src="{{ asset('storage/' . ($user->photo ?? 'profile_photos/default.jpg')) }}" 
                             alt="Foto Profil"
                             class="w-16 h-16 rounded-full object-cover border border-amber-400 shadow">
                    </div>

                    <!-- Form Upload Foto Profil -->
                    <form method="POST" action="{{ route('profile.update-photo') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700">Pilih Foto</label>
                            <input type="file" name="photo" id="photo" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                            Upload Foto
                        </button>
                    </form>

                    <!-- Status -->
                    @if(session('status') == 'photo-updated')
                        <div class="mt-4 text-green-500">Foto profil berhasil diperbarui!</div>
                    @elseif(session('status') == 'profile-updated')
                        <div class="mt-4 text-green-500">Profil berhasil diperbarui!</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
