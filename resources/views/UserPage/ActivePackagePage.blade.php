@extends('UserLayout.MainLayout')

@section('title', 'Paket Aktif')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen">
    <!-- Header Banner -->
    <div class="relative w-full h-40">
        <img src="{{ asset('Assets/Images/promo_paket.png') }}" alt="Banner" class="w-full h-full object-cover">
    </div>

    <!-- Paket Aktif -->
    <div class="p-4">
        <h2 class="text-lg font-bold">Paket Aktif</h2>
        @if($pakets && $pakets->count() > 0)
            @foreach($pakets as $paket)
                <div class="relative w-full h-24 rounded-lg overflow-hidden mt-2">
                    <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="1 Sesi" class="w-full h-full object-cover opacity-90">
                    <span class="absolute top-4 left-4 text-white text-xl font-bold">{{ $paket->paket->nama_paket }}</span>
                    <span class="absolute top-4 right-4 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">{{ $paket->status_paket }}</span>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">No active packages found.</p>
        @endif
    </div>

    <!-- Jadwal Aktif -->
    <div class="p-4">
        <h2 class="text-lg font-bold">Jadwal Aktif</h2>
        <div class="text-gray-500 text-sm">10 Februari 2025</div>

        <div class="bg-gray-200 p-2 mt-2 rounded-lg">
            <p class="text-gray-600 text-sm">Kode Jadwal</p>
            <p class="text-black font-bold">0712F212</p>
        </div>

        <div class="bg-white p-4 mt-2 rounded-lg shadow flex items-center space-x-4">
            <div class="text-blue-500">
                <img src="{{ asset('Assets/Images/icons/jadwal_aktif.svg') }}" alt="jadwal_aktif" class="w-8 h-8">
            </div>
            <div class="flex-1">
                <p class="font-bold">Sesi 1 - Pukul : 10.00 WIB</p>
                <p class="text-sm text-gray-600">Ruang : A04</p>
                <p class="text-sm text-gray-600">Pelatih : Syaila Maliha</p>
            </div>
            <div class="text-right">
                <p class="text-red-500 text-sm font-semibold">Reschedule</p>
                <p class="text-blue-500 text-sm font-semibold">Cancel</p>
            </div>
        </div>
    </div>
</div>

@endsection
