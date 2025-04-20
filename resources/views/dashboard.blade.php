<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Selamat Datang, Admin!') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Sapaan --}}
            <div class="mb-6 bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Halo Admin 👋</h3>
                <p class="text-gray-600">Semoga harimu menyenangkan! Silakan kelola fitur dan data melalui menu berikut.</p>
            </div>

            {{-- Kelola Menu --}}
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelola Menu</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <a href="{{ route('admin.infaq.index') }}" class="block bg-white shadow-md rounded-lg p-6 hover:shadow-lg hover:bg-blue-50 transition duration-200 text-center">
                        <div class="flex flex-col items-center">
                            <i class="bi bi-cash-stack text-3xl text-blue-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Jenis Infaq</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.zakat.index') }}" class="block bg-white shadow-md rounded-lg p-6 hover:shadow-lg hover:bg-green-50 transition duration-200 text-center">
                        <div class="flex flex-col items-center">
                            <i class="bi bi-box2-heart text-3xl text-green-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Jenis Zakat</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.program') }}" class="block bg-white shadow-md rounded-lg p-6 hover:shadow-lg hover:bg-purple-50 transition duration-200 text-center">
                        <div class="flex flex-col items-center">
                            <i class="bi bi-layout-text-window text-3xl text-purple-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Program Lazismu</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.hero') }}" class="block bg-white shadow-md rounded-lg p-6 hover:shadow-lg hover:bg-red-50 transition duration-200 text-center">
                        <div class="flex flex-col items-center">
                            <i class="bi bi-image text-3xl text-red-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Banner utama Website</span>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Kelola Data --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelola Data</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <a href="" class="block bg-white shadow-md rounded-lg p-6 hover:shadow-lg hover:bg-yellow-50 transition duration-200 text-center">
                        <div class="flex flex-col items-center">
                            <i class="bi bi-journal-text text-3xl text-yellow-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Data Infaq & Zakat</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.pengguna') }}" class="block bg-white shadow-md rounded-lg p-6 hover:shadow-lg hover:bg-red-50 transition duration-200 text-center">
                        <div class="flex flex-col items-center">
                            <i class="bi bi-people-fill text-3xl text-red-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Data Pengguna</span>
                        </div>
                    </a>
                    <a href="" class="block bg-white shadow-md rounded-lg p-6 hover:shadow-lg hover:bg-indigo-50 transition duration-200 text-center">
                        <div class="flex flex-col items-center">
                            <i class="bi bi-database-fill-gear text-3xl text-indigo-600 mb-2"></i>
                            <span class="text-sm font-semibold text-gray-700">Data Lainnya</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
