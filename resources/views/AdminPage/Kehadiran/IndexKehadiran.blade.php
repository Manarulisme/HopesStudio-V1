<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Konfirmasi Kehadiran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Konfirmasi Kehadiran</h2>

                    {{-- Filter dan pencarian --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <div class="flex items-center gap-2">
                            <label for="lengthSelect" class="text-sm text-gray-700 dark:text-gray-200">Tampilkan</label>
                            <select id="lengthSelect"
                                class="border border-gray-300 rounded-md px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-sm text-gray-700 dark:text-gray-200">data</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <label for="searchInput" class="text-sm text-gray-700 dark:text-gray-200">Cari:</label>
                            <input type="text" id="searchInput"
                                class="border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                                placeholder="Cari...">
                        </div>
                    </div>

                    {{-- Tabel kehadiran --}}
                    <div class="overflow-x-auto">
                        <table id="kehadiranTable" class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 rounded-lg text-sm">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-3 border-b text-center font-semibold text-gray-600 dark:text-gray-300">No</th>
                                    <th class="px-4 py-3 border-b text-center font-semibold text-gray-600 dark:text-gray-300">Nama Peserta</th>
                                    <th class="px-4 py-3 border-b text-center font-semibold text-gray-600 dark:text-gray-300">Tanggal Pelatihan</th>
                                    <th class="px-4 py-3 border-b text-center font-semibold text-gray-600 dark:text-gray-300">Waktu</th>
                                    <th class="px-4 py-3 border-b text-center font-semibold text-gray-600 dark:text-gray-300">Ruang & Sesi</th>
                                    <th class="px-4 py-3 border-b text-center font-semibold text-gray-600 dark:text-gray-300">Jenis Pelatihan</th>
                                    <th class="px-4 py-3 border-b text-center font-semibold text-gray-600 dark:text-gray-300">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kehadirans as $kehadiran)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                                        <td class="px-4 py-2 border-b text-gray-700 dark:text-gray-300">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 border-b text-gray-700 dark:text-gray-300">{{ $kehadiran->user->name }}</td>
                                        <td class="px-4 py-2 border-b text-gray-700 dark:text-gray-300">
                                            {{ \Carbon\Carbon::parse($kehadiran->tanggal_booking)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="px-4 py-2 border-b text-gray-700 dark:text-gray-300">
                                            {{ \Carbon\Carbon::parse($kehadiran->waktu_mulai)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($kehadiran->waktu_selesai)->format('H:i') }}
                                        </td>
                                        <td class="px-4 py-2 border-b text-gray-700 dark:text-gray-300">
                                            Ruang: {{ $kehadiran->jadwal->ruang }}<br>
                                            Sesi: {{ $kehadiran->jadwal->sesi }}
                                        </td>
                                        <td class="px-4 py-2 border-b text-gray-700 dark:text-gray-300">
                                            {{ ucfirst($kehadiran->jadwal->jenis_pelatihan) }}
                                        </td>
                                        <td class="px-4 py-2 border-b text-gray-700 dark:text-gray-300">
                                            <div class="flex justify-center gap-2">
                                                <form method="POST" action="{{ route('kehadiran.status', $kehadiran->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="selesai">
                                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                                        Hadir
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('kehadiran.status', $kehadiran->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="batal">
                                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                        Tidak Hadir
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 gap-2">
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            Menampilkan {{ $kehadirans->firstItem() }} - {{ $kehadirans->lastItem() }} dari {{ $kehadirans->total() }} data
                        </div>
                        <div>
                            {{ $kehadirans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script DataTable local filter --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('searchInput');
            const lengthSelect = document.getElementById('lengthSelect');
            const table = document.getElementById('kehadiranTable').getElementsByTagName('tbody')[0];
            const rows = Array.from(table.rows);

            function filterTable() {
                const search = searchInput.value.toLowerCase();
                const limit = parseInt(lengthSelect.value);
                let count = 0;

                rows.forEach(row => {
                    const match = row.innerText.toLowerCase().includes(search);
                    if (match && count < limit) {
                        row.style.display = '';
                        count++;
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterTable);
            lengthSelect.addEventListener('change', filterTable);

            filterTable();
        });
    </script>
</x-app-layout>

