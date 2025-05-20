<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Carousel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Form Tambah Gambar Carousel</h2>

                    {{-- Tombol Kembali --}}
                    <a href="{{ route('index_carousel_images') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-6">
                        Kembali
                    </a>

                    {{-- Notifikasi --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('store_carousel_images') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        {{-- Kategori --}}
                        <div class="space-y-2">
                            <label for="carousel_category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                            <select name="carousel_category_id" id="carousel_category_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('carousel_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('carousel_category_id')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Gambar --}}
                        <div class="space-y-2">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar</label>
                            <input type="file" name="image" id="image" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" accept="image/*">
                            @error('image')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Caption --}}
                        <div class="space-y-2">
                            <label for="caption" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Caption (opsional)</label>
                            <input type="text" name="caption" id="caption" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('caption') }}">
                            @error('caption')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Tombol Simpan --}}
                        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
