<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Paket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Paket</h2>
                    <a href="{{ route('paket.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
                        Tambah Paket
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-700 dark:text-gray-300">No</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-700 dark:text-gray-300">Nama Paket</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-700 dark:text-gray-300">Harga</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</th>
                                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-700 dark:text-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pakets as $paket)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-4 py-2 border-b text-sm text-center text-gray-600 dark:text-gray-300">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border-b text-sm text-center text-gray-600 dark:text-gray-300">{{ $paket->nama_paket }}</td>
                                    <td class="px-4 py-2 border-b text-sm text-center text-gray-600 dark:text-gray-300">{{ $paket->harga }}</td>
                                    <td class="px-4 py-2 border-b text-sm text-center text-gray-600 dark:text-gray-300">{{ $paket->deskripsi }}</td>
                                    <td class="px-4 py-2 border-b text-sm text-center text-gray-600 dark:text-gray-300">
                                        <a href="{{ route('paket.edit', $paket->id) }}" class="inline-block bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 mr-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
