<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Konfirmasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Pembayaran</h2>
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary my-3">
                        <button>Tambah Konfirmasi</button>
                    </a>

                    <table class="table table-bordered">
                        {{-- buat judul sesuai yang tertera di tabel pembayaran database --}}
                        <tr>
                            <th>No</th>
                            <th>Kode Pembayaran</th>
                            <th>Nama Pengirim</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Bukti Pengiriman</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        {{-- buat perulangan untuk menampilkan data di atas --}}
                        @foreach ($pembayarans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_pembayaran }}</td>
                                <td>{{ $item->nama_pengirim }}</td>
                                <td>{{ $item->tanggal_pembayaran }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="" style="width: 100px">
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('pembayaran.edit', $item->id) }}" class="btn btn-warning">
                                        <button>Edit</button>
                                    </a>
                                    <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                       

                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
