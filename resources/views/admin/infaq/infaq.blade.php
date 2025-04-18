<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Jenis Infaq') }}
            </h2>
            <a href="{{ route('admin.infaq.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                + Tambah Infaq
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($infaqs as $infaq)
                    <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('storage/infaqs/' . $infaq->image) }}"
                             alt="{{ $infaq->title }}"
                             class="rounded-md w-full h-48 object-cover">

                        <div class="mt-4 text-center">
                            <h4 class="text-lg font-semibold text-gray-800">{{ $infaq->title }}</h4>
                        </div>

                        <div class="mt-4 text-sm text-left">
                            <p class="font-bold text-gray-600">Target: Rp {{ number_format($infaq->target, 0, ',', '.') }}</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 50%"></div> <!-- Optional: width bisa dinamis -->
                            </div>
                        </div>

                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <hr class="my-3" />
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('admin.infaq.edit', $infaq->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.infaq.delete', $infaq->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-12 text-center">
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative">
                            <strong class="font-bold">Data kosong!</strong> Saat ini tidak ada jenis donasi yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
