<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Jadwal</h2>
                    <a href="{{ route('jadwal.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
                        Kembali
                    </a>
                    <form action="{{ route('jadwal.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal</label>
                            <input type="date" name="tanggal" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu Mulai</label>
                            <input type="time" name="waktu_mulai" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('waktu_mulai') }}">
                            @error('waktu_mulai')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu Selesai</label>
                            <input type="time" name="waktu_selesai" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('waktu_selesai') }}">
                            @error('waktu_selesai')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="foto_ruangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Ruangan</label>
                            <input type="file" name="foto_ruangan" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('foto_ruangan')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="trainer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Trainer</label>
                            <input type="text" name="trainer" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('trainer') }}">
                            @error('trainer')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="jenis_pelatihan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Pelatihan</label>
                            <select name="jenis_pelatihan" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="stik" {{ old('jenis_pelatihan') == 'stik' ? 'selected' : '' }}>Stik</option>
                                <option value="nonstik" {{ old('jenis_pelatihan') == 'nonstik' ? 'selected' : '' }}>Nonstik</option>
                            </select>
                            @error('jenis_pelatihan')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="ruang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ruangan</label>
                            <input type="text" name="ruang" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('ruang') }}">
                            @error('ruang')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="sesi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sesi</label>
                            <select name="sesi" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @for ($i = 1; $i <= 20; $i++)
                                    <option value="{{ $i }}" {{ old('sesi') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            @error('sesi')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="kuota" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kuota</label>
                            <input type="number" name="kuota" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('kuota') }}">
                            @error('kuota')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
