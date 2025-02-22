@extends('UserLayout.MainLayout')

@section('title', 'Pesan Paket')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <button onclick="window.history.back()" class="text-gray-600 mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <div class="relative w-full rounded-lg overflow-hidden">
        <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Pilates" class="w-full h-48 object-cover">
        <div class="absolute top-2 left-2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-lg text-sm font-bold">1 Sesi</div>
    </div>

    <h2 class="text-lg font-bold mt-4">Deskripsi</h2>
    <div class="bg-gray-200 p-3 rounded-lg text-sm text-gray-700">
        Nikmati sesi pilates pribadi dengan instruktur berpengalaman. Latihan ini dirancang untuk meningkatkan fleksibilitas, kekuatan inti, dan postur tubuh, serta membantu relaksasi dan keseimbangan. Cocok untuk pemula maupun tingkat lanjut. Dapatkan pengalaman latihan yang menyegarkan dan menyehatkan tubuh dalam satu sesi!
    </div>

    <h2 class="text-lg font-bold mt-4">Informasi Diri</h2>
    <div class="bg-gray-200 p-3 rounded-lg text-sm text-gray-700">
        <p><span class="font-bold">Nama</span><br>Laila Syafawi</p>
        <p class="mt-2"><span class="font-bold">Email</span><br>lailasyafawi@gmail.com</p>
        <p class="mt-2"><span class="font-bold">No. HP</span><br>08374829299</p>
        <p class="mt-2 flex justify-between items-center">
            <span class="font-bold">Total Harga</span>
            <span class="text-blue-500 font-bold">Rp. 25.000</span>
        </p>
    </div>

    <button class="mt-4 w-full bg-blue-500 text-white font-bold py-2 rounded-lg mb-20">Pesan Sekarang</button>
</div>
@endsection
