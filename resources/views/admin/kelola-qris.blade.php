<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola QRIS') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.qris.infaq') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 transition">
                    <div class="flex items-center justify-center mb-3">
                        <i class="bi bi-qr-code-scan text-4xl text-purple-500"></i>
                    </div>
                    <h5 class="text-center text-lg font-semibold">QRIS Infaq</h5>
                </a>
                <a href="{{ route('admin.qris.zakat') }}"
                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 transition">
                    <div class="flex items-center justify-center mb-3">
                        <i class="bi bi-qr-code-scan text-4xl text-yellow-500"></i>
                    </div>
                    <h5 class="text-center text-lg font-semibold">QRIS Zakat</h5>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>