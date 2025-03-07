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
                    <h2>Jadwal</h2>
                    <a href="{{ route('jadwal.index') }}" class="btn btn-primary my-3">
                        <button>Kembali</button>
                        </a>
<form action="{{ route('jadwal.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group
    @error('tanggal')
        has-error
    @enderror">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
        @error('tanggal')
            <span class="help-block
            text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group
    @error('waktu_mulai')
        has-error
    @enderror">
        <label for="waktu_mulai">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') }}">
        @error('waktu_mulai')
            <span class="help-block
            text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group
    @error('waktu_selesai')
        has-error
    @enderror">
        <label for="waktu_selesai">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') }}">
        @error('waktu_selesai')
            <span class="help-block
            text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group
    @error('foto_ruangan')
    has-error
    @enderror">
        <label for="foto_ruangan">Foto Ruangan</label>
        <input type="file" name="foto_ruangan" class="form-control">
        @error('foto_ruangan')
            <span class="help-block text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group
    @error('trainer')
        has-error
    @enderror">
        <label for="trainer">Trainer</label>
        <input type="text" name="trainer" class="form-control" value="{{ old('trainer') }}">
        @error('trainer')
            <span class="help-block
            text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group
    @error('jenis_pelatihan')
        has-error
    @enderror">
        <label for="jenis_pelatihan">Jenis Pelatihan</label>
        <select name="jenis_pelatihan" class="form-control">
            <option value="stik" {{ old('jenis_pelatihan') == 'stik' ? 'selected' : '' }}>Stik</option>
            <option value="nonstik" {{ old('jenis_pelatihan') == 'nonstik' ? 'selected' : '' }}>Nonstik</option>
        </select>
        @error('jenis_pelatihan')
            <span class="help-block
            text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group
    @error('kuota')
        has-error
    @enderror">
        <label for="kuota">Kuota</label>
        <input type="number" name="kuota" class="form-control" value="{{ old('kuota') }}">
        @error('kuota')
            <span class="help-block
            text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>








                </div>
            </div>
        </div>
    </div>
</x-app-layout>
