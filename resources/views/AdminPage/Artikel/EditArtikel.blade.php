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
                    <h2 class="text-2xl font-bold mb-4">Edit Artikel</h2>
                    <a href="{{ route('artikel.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
                        Kembali
                    </a>
                    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">

                        @csrf
                        @method('PUT')

                        <div class="space-y-2">
                            <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                            <input type="text" name="judul" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('judul', $artikel->judul) }}">
                            @error('judul')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="konten" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten</label>
                            <textarea id="ckeditor_konten" name="konten" rows="5" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('konten', $artikel->konten ?? '') }}</textarea>
                            @error('konten')
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

                        <div class="space-y-2">
                            <label for="gambar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar</label>
                            <input type="file" name="gambar" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @if($artikel->gambar)
                                <p class="text-sm text-gray-500">Gambar saat ini: <a href="{{ asset('storage/' . $artikel->gambar) }}" target="_blank" class="text-blue-500 underline">Lihat Gambar</a></p>
                            @endif
                            @error('gambar')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor_konten');
    </script>
    @endpush
</x-app-layout>

