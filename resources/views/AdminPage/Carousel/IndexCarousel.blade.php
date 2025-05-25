<x-app-layout>
    <x-slot name="header">
        {{-- Judul dihapus --}}
    </x-slot>

    {{-- Alpine.js untuk modal --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Carousel Image </h2>

                    <div class="flex justify-between items-center mb-4">
                        <a href="{{ route('create_carousel_images') }}" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-md font-semibold transition duration-200">
                            + Tambah Gambar
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-6 py-3 text-center font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Gambar</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($carouselImages as $image)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">
                                        <td class="px-6 py-4 text-center">
                                            {{ ($carouselImages->currentPage() - 1) * $carouselImages->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div x-data="{ open: false }">
                                                <img @click="open = true"
                                                    src="{{ asset('storage/' . $image->image_path) }}"
                                                    alt="carousel"
                                                    class="cursor-pointer w-40 h-28 object-cover rounded shadow border border-gray-300 dark:border-gray-600 hover:scale-105 transition-transform duration-300">

                                                <!-- Modal -->
                                                <div x-show="open"
                                                    x-transition
                                                    @click.away="open = false"
                                                    class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
                                                    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow max-w-3xl relative">
                                                        <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-xl font-bold">×</button>
                                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Preview" class="max-h-[80vh] w-auto mx-auto rounded">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">{{ $image->category->name ?? '-' }}</td>
                                        <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
<form action="{{ route('carousel_images.destroy', $image->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="inline-block bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-semibold transition">
        Hapus
    </button>
</form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-6 text-gray-500 dark:text-gray-400">Belum ada gambar carousel.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-4 px-4">
                            {{ $carouselImages->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
