<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Zakat') }}
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
                                <th class="border border-gray-300 px-4 py-2">Jumlah Zakat</th>
                                <th class="border border-gray-300 px-4 py-2">Metode Pembayaran</th>
                                <th class="border border-gray-300 px-4 py-2">Jenis Zakat</th>
                                <th class="border border-gray-300 px-4 py-2">Tanggal</th>
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
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $data->zakat->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $data->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <form id="delete-all-form" action="{{ route('data-zakat.destroyAll') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Hapus Semua Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SweetAlert: Session Success --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

    {{-- SweetAlert: Konfirmasi Hapus Semua --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForm = document.getElementById('delete-all-form');

            deleteForm.addEventListener('submit', function (e) {
                e.preventDefault(); // Stop form submit

                Swal.fire({
                    title: 'Yakin ingin menghapus semua data?',
                    text: "Tindakan ini tidak bisa dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>