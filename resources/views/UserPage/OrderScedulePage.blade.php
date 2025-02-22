@extends('UserLayout.MainLayout')

@section('title', 'Jadwal Sesi')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen pb-20">
    <div class="relative">
        <button onclick="window.history.back()" class="absolute top-4 left-4 bg-white p-2 rounded-full shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <img src="{{ asset('Assets/Images/ImageRoom.png') }}" alt="Gym" class="w-full h-48 object-cover">
    </div>

    <div class="p-4">
        <h2 class="text-lg font-bold mb-2">Detail Pesan Jadwal</h2>
        <div class="bg-white p-4 shadow-md rounded-lg border">
            <p class="text-sm text-gray-700">Nama</p>
            <p class="font-bold">Laila Syafawi</p>

            <p class="text-sm text-gray-700 mt-2">Email</p>
            <p class="font-bold">lailasyafawi@gmail.com</p>

            <p class="text-sm text-gray-700 mt-2">No. HP</p>
            <p class="font-bold">08374829299</p>

            <p class="text-sm text-gray-700 mt-2">Sesi</p>
            <p class="font-bold">Sesi 2 - Pukul : 13.00 WIB</p>

            <p class="text-sm text-gray-700 mt-2">Ruang</p>
            <p class="font-bold">A04</p>

            <p class="text-sm text-gray-700 mt-2">Pelatih</p>
            <p class="font-bold">Syaila Maliha</p>
        </div>

        <button class="mt-4 w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Booking Sekarang</button>
    </div>
</div>
@endsection
