<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Profil Anda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 text-center">

                    <!-- Ikon Profil -->
                    <div class="flex justify-center mt-6 mb-4">
                        <i class="bi bi-person-circle text-6xl text-gray-600"></i>
                    </div>

                    <!-- Data Pengguna -->
                    <div class="text-lg font-semibold text-gray-800">
                        <p>{{ $user->name }}</p>
                        <p>{{ $user->email }}</p>
                        <p>Role anda : {{ $user->role }}</p>
                    </div>

                    <!-- Status -->
                    @if(session('status') == 'profile-updated')
                        <div class="mt-4 text-green-500">Profil berhasil diperbarui!</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
