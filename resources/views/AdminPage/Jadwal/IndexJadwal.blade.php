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
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Jadwal</h2>
                    <a href="{{ route('jadwal.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
                        Tambah Jadwal
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 rounded-lg shadow-md">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">No</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Tanggal</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Waktu Mulai</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Waktu Selesai</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Trainer</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Foto Ruangan</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-600 dark:text-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwals as $jadwal)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">
                                        {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }}
                                    </td>
                                    <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                                    </td>
                                    <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">{{ $jadwal->trainer }}</td>
                                    <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">
                                        <div class="flex justify-center">
                                            <a href="{{ asset('storage/' . $jadwal->foto_ruangan) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $jadwal->foto_ruangan) }}" alt="Foto Ruangan" class="w-24 h-24 object-cover rounded hover:cursor-pointer">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-b text-sm text-gray-700 dark:text-gray-300 text-center">
                                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="inline-block bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 mr-2">Edit</a>
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this schedule?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $jadwals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

