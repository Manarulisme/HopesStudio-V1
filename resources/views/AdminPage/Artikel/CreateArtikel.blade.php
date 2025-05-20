<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold">Artikel</h2>
                    <a href="{{ route('artikel.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 my-3">
                        <button>Kembali</button>
                    </a>
                    {{-- buat form artikel yang terdiri dari input judul, konten, gambar_utama  mengarah ke artikel.store --}}
                    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                            <input type="text" name="judul" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('judul') }}">
                            @error('judul')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="konten" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten</label>
                            <textarea name="konten" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('konten') }}</textarea>
                            @error('konten')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="gambar_utama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Utama</label>
                            <input type="file" name="gambar_utama" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('gambar_utama')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type Artikel</label>
                            <select name="type" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="headline" {{ old('type') == 'headline' ? 'selected' : '' }}>Headline</option>
                                <option value="normal" {{ old('type') == 'normal' ? 'selected' : '' }}>Normal</option>
                            </select>
                            @error('type')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

