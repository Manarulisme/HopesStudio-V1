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
                    <h2>Konfirmasi Pembayaran</h2>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-primary my-3">
                        <button>Kembali</button>
                    </a>
                    {{-- buat form konfirmasi pembayaran yang terdiri dari input kode_pembayaran, nama_pengirim, tanggal_pembayaran, bukti_pembayaran mengarah ke pembayaran.store --}}
                    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group @error('kode_pembayaran') has-error @enderror">
                            <label for="kode_pembayaran">Kode Pembayaran</label>
                            <input type="text" name="kode_pembayaran" class="form-control" value="{{ old('kode_pembayaran') }}">
                            @error('kode_pembayaran')
                                <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('nama_pengirim') has-error @enderror">
                            <label for="nama_pengirim">Nama Pengirim</label>
                            <input type="text" name="nama_pengirim" class="form-control" value="{{ old('nama_pengirim') }}">
                            @error('nama_pengirim')
                                <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('tanggal_pembayaran') has-error @enderror">
                            <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                            <input type="datetime-local" name="tanggal_pembayaran" class="form-control" value="{{ old('tanggal_pembayaran') }}">
                            @error('tanggal_pembayaran')
                                <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('bukti_pembayaran') has-error @enderror">
                            <label for="bukti_pembayaran">Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" class="form-control">
                            @error('bukti_pembayaran')
                                <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>