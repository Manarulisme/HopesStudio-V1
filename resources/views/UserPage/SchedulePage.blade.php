@extends('UserLayout.MainLayout')

@section('title', 'Jadwal')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <img src="{{ asset('Assets/Images/information.png') }}" class="w-full mb-4 rounded-lg" alt="Promo">

    <div class="bg-white p-4 shadow-md rounded-lg mb-4 text-center">
        <form action="{{ route('jadwal_search') }}" method="GET" class="mb-4">
        <div class="flex flex-col space-y-2 mb-4">
            <input type="date" class="w-full border rounded-lg p-2" />
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Cari Jadwal</button>
    </form>
    </div>

    <h2 class="text-lg font-bold mb-2">Jadwal hari ini</h2>
    <div class="bg-white p-4 shadow-md rounded-lg mb-24">
        @foreach ($jadwals as $jadwal)
        <div class="p-2 border-b mb-2">
            <p class="font-bold">Sesi {{ $jadwal->sesi }} - Pukul : {{ $jadwal->waktu_mulai }} <span class="text-red-500 ml-2">Peserta : {{ $jadwal->peserta }}</span></p>
            <p>Ruang : {{ $jadwal->ruang }}</p>
            <p>Pelatih : {{ $jadwal->trainer }}</p>
            <p class="text-blue-500">Kuota {{ $jadwal->kuota }}</p>
            @if ($jadwal->kuota > 0)
            <button class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Booking Sekarang</button>
            @else
            <button class="w-full bg-gray-400 text-white font-bold py-2 rounded-lg cursor-not-allowed">Booking Penuh</button>
            @endif
        </div>
        @endforeach


    </div>
</div>
@endsection
