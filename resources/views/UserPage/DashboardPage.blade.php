@extends('UserLayout.MainLayout')

@section('title', 'Dashboard')

@section('content')

<!-- Tambahkan Alpine.js -->
<script src="https://unpkg.com/alpinejs" defer></script>

<div class="max-w-md mx-auto bg-white min-h-screen">
    <!-- Header -->
    <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('Assets/Images/logo.png') }}" alt="Logo" class="w-8 h-8 rounded-full">
            <h1 class="text-lg font-bold">Hopes Studio</h1>
        </div>
    </div>

    <!-- Carousel -->
    <div class="p-4">
        @if ($carouselImages->count())
            <div class="relative w-full h-48 rounded-lg overflow-hidden"
                x-data="{ index: 0 }"
                x-init="setInterval(() => { index = (index + 1) % {{ $carouselImages->count() }} }, 5000)">

                @foreach ($carouselImages as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                        alt="Carousel Image"
                        class="w-full h-48 object-cover absolute top-0 left-0 transition-opacity duration-700"
                        x-show="index === {{ $loop->index }}"
                        x-transition.opacity>
                @endforeach

                <!-- Tombol Prev -->
                <button @click="index = (index - 1 + {{ $carouselImages->count() }}) % {{ $carouselImages->count() }}"
                    class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-2 py-1 rounded hover:bg-opacity-75 z-10">
                    ‹
                </button>

                <!-- Tombol Next -->
                <button @click="index = (index + 1) % {{ $carouselImages->count() }}"
                    class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-2 py-1 rounded hover:bg-opacity-75 z-10">
                    ›
                </button>
            </div>
        @else
            <div class="text-center text-gray-500">Belum ada gambar carousel.</div>
        @endif
    </div>

    <!-- Paket Terpopuler -->
    <div class="p-4 mb-16">
        <h2 class="text-lg font-bold mb-2">Paket Terpopuler</h2>
        <div class="space-y-4">

            @php
                $hasBlockedPaket = $userPakets->contains(function ($paket) {
                    return in_array($paket->status_paket, ['aktif', 'pending']);
                });
            @endphp

            @if ($hasBlockedPaket)
                <div class="mb-4 p-4 bg-yellow-100 text-yellow-800 rounded-md shadow">
                    Anda memiliki paket yang sedang berlangsung atau menunggu konfirmasi. Pemesanan baru tidak tersedia saat ini.
                </div>
            @endif

            @foreach ($pakets as $paket)
                @if ($hasBlockedPaket)
                    <div class="relative w-full h-24 rounded-lg overflow-hidden mb-4 bg-gray-200 opacity-50 cursor-not-allowed">
                        <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="{{ $paket->nama_paket }}" class="w-full h-full object-cover opacity-90">
                        <span class="absolute top-4 left-4 text-white text-xl font-bold">{{ $paket->nama_paket }}</span>
                    </div>
                @else
                    <a href="{{ route('order-paket.show', ['order_paket' => $paket->id]) }}">
                        <div class="relative w-full h-24 rounded-lg overflow-hidden mb-4 hover:scale-[1.02] transition-transform duration-300 shadow-lg">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="{{ $paket->nama_paket }}" class="w-full h-full object-cover opacity-90">
                            <span class="absolute top-4 left-4 text-white text-xl font-bold">{{ $paket->nama_paket }}</span>
                        </div>
                    </a>
                @endif
            @endforeach

        </div>
    </div>
</div>

@endsection
