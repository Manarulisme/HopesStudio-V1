<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Artikel</h2>
                    <a href="{{ route('artikel.index') }}" class="btn btn-primary my-3">
                        <button>Kembali</button>
                    </a>
                    {{-- buat form artikel yang terdiri dari input judul, konten, gambar_utama  mengarah ke artikel.store --}}
                    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group @error('judul') has-error @enderror">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
                            @error('judul')
                                <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('konten') has-error @enderror">
                            <label for="konten">Konten</label>
                            <textarea name="konten" class="form-control">{{ old('konten') }}</textarea>
                            @error('konten')
                                <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('gambar_utama') has-error @enderror">
                            <label for="gambar_utama">Gambar Utama</label>
                            <input type="file" name="gambar_utama" class="form-control">
                            @error('gambar_utama')
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