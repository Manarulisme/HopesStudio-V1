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
                    <h2>Paket</h2>
                    <a href="{{ route('paket.index')) }}" class="btn btn-primary my-3">
                        <button>Kembali</button>
                        </a>
                    <form action="{{ route('paket.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_sesi" class="form-label
                            ">Jumlah Sesi</label>
                            <input type="text" class="form-control" id="jumlah_sesi" name="jumlah_sesi">
                        </div>

                        <div class="mb-3">
                            <label for="masa_aktif_hari" class="form-label">Masa Aktif Hari</label>
                            <input type="text" class="form-control" id="masa_aktif_hari" name="masa_aktif_hari">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
