<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Paket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Tambah Paket</h2>
                    <a href="{{ route('paket.index') }}" class="inline-block mb-6 text-white bg-blue-500 hover:bg-blue-600 font-medium py-2 px-4 rounded">
                        Kembali
                    </a>
                    <form action="{{ route('paket.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="nama_paket" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Paket</label>
                            <input type="text" id="nama_paket" name="nama_paket" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga</label>
                            <input type="text" id="harga" name="harga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="jumlah_sesi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Sesi</label>
                            <input type="text" id="jumlah_sesi" name="jumlah_sesi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="masa_aktif_hari" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Masa Aktif Hari</label>
                            <input type="text" id="masa_aktif_hari" name="masa_aktif_hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
