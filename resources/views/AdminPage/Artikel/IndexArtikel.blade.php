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
                    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Artikel</h2>
                    <a href="{{ route('artikel.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
                        Tambah Artikel
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-center text-gray-700 dark:text-gray-300">
                                    <th class="px-4 py-2 border dark:border-gray-600">No</th>
                                    <th class="px-4 py-2 border dark:border-gray-600">Image</th>
                                    <th class="px-4 py-2 border dark:border-gray-600">Judul</th>
                                    <th class="px-4 py-2 border dark:border-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artikels as $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2 border text-center dark:border-gray-600 text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                            <img src="{{ asset('storage/' . $item->gambar_utama) }}" alt="" class="w-24 h-auto rounded inline-block">
                                        </td>
                                        <td class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-100 text-left">{{ $item->judul }}</td>
                                        <td class="px-4 py-2 border dark:border-gray-600 text-center">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('artikel.edit', $item->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                        Hapus
                                                    </button>
                                                </form>
                                                </form>
                                            </div>
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
