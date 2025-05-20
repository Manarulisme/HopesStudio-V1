@extends('UserLayout.MainLayout')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-md mx-auto bg-white min-h-screen">
    <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('Assets/Images/logo.png') }}" alt="Logo" class="w-8 h-8 rounded-full">
            <h1 class="text-lg font-bold">Hopes Studio</h1>
        </div>
    </div>

    <div class="p-4">
        <div id="carousel-hero" class="relative w-full h-48 rounded-lg overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out transform">
                <img src="{{ asset('Assets/Images/hero_pilates.png') }}" alt="Workout" class="w-full h-full object-cover">
                <img src="{{ asset('Assets/Images/hero_pilates.png') }}" alt="Workout" class="w-full h-full object-cover">
            </div>
            <button onclick="prevSlide('carousel-hero')" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1">Prev</button>
            <button onclick="nextSlide('carousel-hero')" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1">Next</button>
        </div>

        <script>
            function updateCarousel(carouselId) {
                const carousel = document.getElementById(carouselId);
                const slideWidth = carousel.children[0].offsetWidth;
                carousel.style.transform = `translateX(-${carousel.dataset.currentIndex * slideWidth}px)`;
            }

            function prevSlide(carouselId) {
                const carousel = document.getElementById(carouselId);
                const currentIndex = parseInt(carousel.dataset.currentIndex || 0);
                carousel.dataset.currentIndex = (currentIndex > 0) ? currentIndex - 1 : 1;
                updateCarousel(carouselId);
            }

            function nextSlide(carouselId) {
                const carousel = document.getElementById(carouselId);
                const currentIndex = parseInt(carousel.dataset.currentIndex || 0);
                carousel.dataset.currentIndex = (currentIndex < 1) ? 0 : currentIndex + 1;
                updateCarousel(carouselId);
            }

            setInterval(() => {
                nextSlide('carousel-hero');
            }, 5000);
        </script>
    </div>

    <div class="p-4 mb-16">
        <h2 class="text-lg font-bold mb-2">Paket Terpopuler</h2>
        <div class="space-y-4">

            @php
            // Cek apakah user punya paket dengan status 'aktif' atau 'pending'
            $hasBlockedPaket = $userPakets->contains(function ($paket) {
                return in_array($paket->status_paket, ['aktif', 'pending']);
            });
        @endphp

        {{-- Opsional: Notifikasi --}}
        @if ($hasBlockedPaket)
            <div class="mb-4 p-4 bg-yellow-100 text-yellow-800 rounded-md shadow">
                Anda memiliki paket yang sedang berlangsung atau menunggu konfirmasi. Pemesanan baru tidak tersedia saat ini.
            </div>
        @endif

        {{-- Loop semua pilihan paket --}}
        @foreach ($pakets as $paket)
            @if ($hasBlockedPaket)
                {{-- Disable klik jika ada paket aktif atau pending --}}
                <div class="relative w-full h-24 rounded-lg overflow-hidden mb-4 bg-gray-200 dark:bg-gray-800 opacity-50 cursor-not-allowed">
                    <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="{{ $paket->nama_paket }}" class="w-full h-full object-cover opacity-90">
                    <span class="absolute top-4 left-4 text-white dark:text-gray-300 text-xl font-bold">{{ $paket->nama_paket }}</span>
                </div>
            @else
                {{-- Bisa klik jika tidak ada paket aktif/pending --}}
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
