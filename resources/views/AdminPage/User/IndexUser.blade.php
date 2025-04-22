<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">User</h2>
                    <div class="mt-4 mb-4">
                        <a href="{{ route('user.create') }}" class="btn btn-primary my-3">
                            <button class="px-4 py-2 bg-blue-500 text-white dark:bg-blue-700 dark:text-gray-100 rounded">
                                Tambah User
                            </button>
                        </a>
                    </div>

                    <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">No</th>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">Username</th>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">Email</th>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">Role</th>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200 text-center">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200 text-center">{{ $item->name }}</td>
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200 text-center">{{ $item->email }}</td>
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200 text-center">{{ $item->role }}</td>
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200 text-center">
                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">
                                            <button class="px-4 py-2 bg-yellow-500 text-white dark:bg-yellow-600 dark:text-gray-100 rounded">
                                                Edit
                                            </button>
                                        </a>
                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button class="px-4 py-2 bg-red-500 text-white dark:bg-red-600 dark:text-gray-100 rounded" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Hapus
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
</x-app-layout>
