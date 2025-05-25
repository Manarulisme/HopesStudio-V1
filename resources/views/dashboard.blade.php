<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-10">

                    {{-- Info Paket --}}
                    <div>
                        <h2 class="text-xl font-bold mb-4">Info Paket</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-blue-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">Paket Aktif Hari Ini</h3>
                                <p class="text-3xl font-bold">{{ $paketHariIni ?? '0' }}</p>
                            </div>
                            <div class="bg-green-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">Paket Aktif Bulan Ini</h3>
                                <p class="text-3xl font-bold">{{ $paketBulanIni ?? '0' }}</p>
                            </div>
                            <div class="bg-yellow-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">Paket Aktif Tahun Ini</h3>
                                <p class="text-3xl font-bold">{{ $paketTahunIni ?? '0' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Info Jadwal --}}
                    <div>
                        <h2 class="text-xl font-bold mb-4">Info Jadwal</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-purple-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">Booking Jadwal Hari Ini</h3>
                                <p class="text-3xl font-bold">{{ $jadwalHariIni ?? '0' }}</p>
                            </div>
                            <div class="bg-indigo-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">Booking Jadwal Bulan Ini</h3>
                                <p class="text-3xl font-bold">{{ $jadwalBulanIni ?? '0' }}</p>
                            </div>
                            <div class="bg-teal-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">Booking Jadwal Tahun Ini</h3>
                                <p class="text-3xl font-bold">{{ $jadwalTahunIni ?? '0' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Info User --}}
                    <div>
                        <h2 class="text-xl font-bold mb-4">Info User</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-pink-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">User Hari Ini</h3>
                                <p class="text-3xl font-bold">{{ $userHariIni ?? '0' }}</p>
                            </div>
                            <div class="bg-rose-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">User Bulan Ini</h3>
                                <p class="text-3xl font-bold">{{ $userBulanIni ?? '0' }}</p>
                            </div>
                            <div class="bg-orange-500 text-white p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold mb-1">User Tahun Ini</h3>
                                <p class="text-3xl font-bold">{{ $userTahunIni ?? '0' }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
