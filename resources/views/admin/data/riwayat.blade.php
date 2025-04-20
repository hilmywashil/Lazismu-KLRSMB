<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Infaq & Zakat') }}
        </h2>
    </x-slot>

    <div class="py-8 px-4 bg-gray-100 min-h-screen">

        {{-- TABEL INFAQ --}}
        <div class="bg-white shadow-md rounded-lg p-6 mb-10">
            <h3 class="text-lg font-bold text-gray-700 mb-4">Riwayat Infaq</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-200 text-sm">
                        <tr>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border text-right">Jumlah</th>
                            <th class="px-4 py-2 border">Metode Pembayaran</th>
                            <th class="px-4 py-2 border text-center">Jenis Infaq</th>
                            <th class="px-4 py-2 border text-center">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInfaqs as $data)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $data->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $data->email }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">
                                    Rp {{ number_format($data->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">{{ $data->metode_pembayaran }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $data->jenisInfaq->title ?? '-' }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $data->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- TABEL ZAKAT --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-700 mb-4">Riwayat Zakat</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-200 text-sm">
                        <tr>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border text-right">Jumlah</th>
                            <th class="px-4 py-2 border">Metode Pembayaran</th>
                            <th class="px-4 py-2 border text-center">Jenis Zakat</th>
                            <th class="px-4 py-2 border text-center">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataZakats as $data)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $data->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $data->email }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">
                                    Rp {{ number_format($data->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">{{ $data->metode_pembayaran }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $data->zakat->title ?? '-' }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $data->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
