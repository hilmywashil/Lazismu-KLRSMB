<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($users as $user)
                    <div class="bg-white rounded-lg shadow p-5 hover:shadow-lg transition duration-200">
                        <div class="flex items-center gap-3 mb-3">
                            <i class="bi bi-person-circle text-3xl text-blue-600"></i>
                            <div>
                                <h3 class="text-md font-semibold text-gray-800">{{ $user->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        Tidak ada pengguna terdaftar.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
