<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Infaq') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Nama Donatur</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Jumlah Infaq</th>
                                <th class="border border-gray-300 px-4 py-2">Metode Pembayaran</th>
                                <th class="border border-gray-300 px-4 py-2">Jenis Infaq</th>
                                <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataInfaqs as $data)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $data->nama }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $data->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-right">Rp
                                        {{ number_format($data->jumlah, 0, ',', '.') }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $data->metode_pembayaran }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $data->infaq->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $data->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>