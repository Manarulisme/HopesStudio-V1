<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Artikel') }}
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

                    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4" onsubmit="syncQuill()">
                        @csrf
                        @method('PUT')

                        {{-- Judul --}}
                        <div class="space-y-2">
                            <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                            <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('judul')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Konten dengan Quill Editor --}}
                        <div class="space-y-2">
                            <label for="konten" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten</label>

                            <div id="editor" class="block w-full border border-gray-300 rounded-md shadow-sm" style="min-height: 200px;">
                                {!! old('konten', $artikel->konten ?? '') !!}
                            </div>
                            <input type="hidden" name="konten" id="konten">

                            @error('konten')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Type --}}
                        <div class="space-y-2">
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type Artikel</label>
                            <select name="type"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="headline" {{ old('type', $artikel->type) == 'headline' ? 'selected' : '' }}>Headline</option>
                                <option value="normal" {{ old('type', $artikel->type) == 'normal' ? 'selected' : '' }}>Normal</option>
                            </select>
                            @error('type')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Gambar Utama --}}
                        <div class="space-y-2">
                            <label for="gambar_utama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Utama</label>
                            <input type="file" name="gambar_utama"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @if($artikel->gambar_utama)
                                <p class="text-sm text-gray-500">
                                    Gambar saat ini:
                                    <a href="{{ asset('storage/' . $artikel->gambar_utama) }}" target="_blank" class="text-blue-500 underline">Lihat Gambar</a>
                                </p>
                            @endif
                            @error('gambar_utama')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Tombol Submit --}}
                        <button type="submit"
                            class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Quill Scripts --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        function syncQuill() {
            document.querySelector('#konten').value = quill.root.innerHTML;
        }
    </script>
</x-app-layout>
