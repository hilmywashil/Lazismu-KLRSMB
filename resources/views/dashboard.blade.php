<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 text-center">

                    <!-- Judul -->
                    <h3 class="text-xl font-semibold mb-2">Selamat datang kembali!</h3>

                    <!-- Foto Profil -->
                    <div class="flex justify-center mt-6 mb-4">
                        <img src="{{ asset('assets/img/1715950650650.jpg') }}" 
                             alt="Foto Profil"
                             class="w-16 h-16 rounded-full object-cover border border-amber-400 shadow">
                    </div>

                  
                    <!-- Informasi Pengguna -->
                    <p class="text-lg font-medium text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    
                    @if (Auth::user()->role ?? false)
                        <p class="text-sm text-gray-500 italic mt-1">Role: {{ Auth::user()->role }}</p>
                    @endif

                    <!-- Status Login -->
                    <p class="text-gray-600 mt-4">{{ __("You're logged in!") }}</p>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-center gap-4 mt-6 flex-wrap">
                        <!-- Tombol Beranda -->
                        <a href="{{ url('/') }}" 
                           style="background-color:#f5a327; color: #1f2937;" 
                           class="btn font-semibold py-2 px-6 rounded-lg shadow transition duration-200 hover:brightness-110">
                            Beranda
                        </a>

                        <!-- Tombol Edit Profil -->
                        <a href="{{ route('profile.edit') }}"
                           style="background-color:#f5a327; color: #1f2937;" 
                           class="btn font-semibold py-2 px-6 rounded-lg shadow transition duration-200 hover:brightness-110">
                            Edit Profil
                        </a>

                   <!-- Tombol Logout (Merah) -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"
            style="background-color:#e3342f; color: white;" 
            class="btn font-semibold py-2 px-6 rounded-lg shadow transition duration-200 hover:brightness-110">
        Logout
    </button>
</form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
