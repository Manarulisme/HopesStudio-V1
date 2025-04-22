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
                    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Pembayaran</h2>
                    <a href="{{ route('pembayaran.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
                        Tambah Konfirmasi
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 rounded-lg">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">No</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Kode Pembayaran</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Nama Pengirim</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Tanggal Pembayaran</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Bukti Pengiriman</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Status</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayarans as $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                                        <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">{{ $item->kode_pembayaran }}</td>
                                        <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">{{ $item->nama_pengirim }}</td>
                                        <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">{{ $item->tanggal_pembayaran }}</td>
                                        <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">
                                            <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" target="_blank" class="flex justify-center">
                                                <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="w-24 h-auto rounded hover:cursor-pointer">
                                            </a>
                                        </td>
                                        <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">{{ $item->status }}</td>
                                        <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">
                                            <a href="{{ route('pembayaran.edit', $item->id) }}" class="inline-block bg-green-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                                Konfirmasi
                                            </a>
                                            <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    Tolak
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
