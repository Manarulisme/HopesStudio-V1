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
                    <a href="{{ route('jadwal.create') }}" class="btn btn-primary my-3">
                        <button>Tambah Jadwal</button>
                    </a>

                    <table class="table table-bordered">
                        {{-- buat judul yang terdiri dari tanggal, waktu mulai, waktu selesai trainer, action --}}
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Trainer</th>
                            <th>Foto Ruangan</th>
                            <th>Action</th>
                        </tr>
                        {{-- buat perulangan untuk menampilkan data jadwal --}}
                        @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jadwal->tanggal }}</td>
                            <td>{{ $jadwal->waktu_mulai }}</td>
                            <td>{{ $jadwal->waktu_selesai }}</td>
                            <td>{{ $jadwal->trainer }}</td>
                            {{-- tampilkan foto yang telah di upload --}}
                            <td><img src="{{ asset('storage/' . $jadwal->foto_ruangan) }}" alt="Foto Ruangan" width="100" height="100"></td>
                            {{-- buat button edit dan delete --}}
                            <td>
                                <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this schedule?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
