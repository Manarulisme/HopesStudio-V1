@extends('UserLayout.MainLayout')

@section('title', 'Cari Jadwal')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <button onclick="window.location.href='{{ route('jadwal_user') }}'" class="text-gray-600 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <h1 class="text-lg font-bold ml-2">Cari Jadwal</h1>

    <div class="bg-white p-4 shadow-md rounded-lg mb-4 text-center">
        <div class="flex flex-col space-y-2 mb-4">
            <input type="date" class="w-full border rounded-lg p-2" />
        </div>
        <button class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Cari Jadwal</button>
    </div>

    <h2 class="text-lg font-bold mb-2">Hasil Pencarian</h2>
    <div class="bg-white p-4 shadow-md rounded-lg mb-24">
        <div class="p-2 border-b mb-2 bg-gray-300 text-gray-600">
            <p class="font-bold">Sesi 1 - Pukul : 10.00 WIB <span class="text-red-500 ml-2">Peserta : 4</span></p>
            <p>Ruang : A04</p>
            <p>Pelatih : Syaila Maliha</p>
            <p class="text-blue-500">Kuota 0</p>
            <button class="w-full bg-gray-400 text-white font-bold py-2 rounded-lg cursor-not-allowed">Booking Penuh</button>
        </div>
        <div class="p-2 border-b mb-2">
            <p class="font-bold">Sesi 2 - Pukul : 13.00 WIB <span class="text-red-500 ml-2">Peserta : 1</span></p>
            <p>Ruang : A04</p>
            <p>Pelatih : Syaila Maliha</p>
            <p class="text-blue-500">Kuota 3</p>
            <button class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Booking Sekarang</button>
        </div>
        <div class="p-2 border-b mb-2">
            <p class="font-bold">Sesi 3 - Pukul : 16.00 WIB <span class="text-red-500 ml-2">Peserta : 2</span></p>
            <p>Ruang : A04</p>
            <p>Pelatih : Syaila Maliha</p>
            <p class="text-blue-500">Kuota 2</p>
            <button class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Booking Sekarang</button>
        </div>
        <div class="p-2 mb-2">
            <p class="font-bold">Sesi 4 - Pukul : 19.00 WIB <span class="text-red-500 ml-2">Peserta : 3</span></p>
            <p>Ruang : A04</p>
            <p>Pelatih : Syaila Maliha</p>
            <p class="text-blue-500">Kuota 1</p>
            <button class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Booking Sekarang</button>
        </div>
    </div>
</div>
@endsection
