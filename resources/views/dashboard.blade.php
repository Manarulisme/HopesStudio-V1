<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="col-span-3">
        <h2 class="text-xl font-bold mb-2">Info Paket</h2>
    </div>
    <div class="bg-blue-500 text-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Paket Aktif User Hari Ini</h3>
        <p class="text-sm">{{ $paketHariIni ?? '0' }}</p>
    </div>
    <div class="bg-green-500 text-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Paket Aktif User Bulan Ini</h3>
        <p class="text-sm">{{ $paketBulanIni ?? '0' }}</p>
    </div>
    <div class="bg-yellow-500 text-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Paket Aktif User Tahun Ini</h3>
        <p class="text-sm">{{ $paketTahunIni ?? '0' }}</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
    <div class="col-span-3">
        <h2 class="text-xl font-bold mb-2">Info Jadwal</h2>
    </div>
    <div class="bg-purple-500 text-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Jadwal Booking User Hari Ini</h3>
        <p class="text-sm">{{ $jadwalHariIni ?? '0' }}</p>
    </div>
    <div class="bg-indigo-500 text-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Jadwal Booking User Bulan Ini</h3>
        <p class="text-sm">{{ $jadwalBulanIni ?? '0' }}</p>
    </div>
    <div class="bg-teal-500 text-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Jadwal Booking User Tahun Ini</h3>
        <p class="text-sm">{{ $jadwalTahunIni ?? '0' }}</p>
    </div>
</div>
{{-- Add spacing before the horizontal rule --}}
                 <hr class="mt-4">
                    <h2 class="mt-6">Info Image Utama</h2>
                    <div class="relative w-full overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out transform" id="carousel-utama">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 1" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 2" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 3" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 4" class="w-1/3 flex-shrink-0">
                        </div>
                        <button onclick="prevSlide('carousel-utama')" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1">Prev</button>
                        <button onclick="nextSlide('carousel-utama')" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1">Next</button>
                    </div>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Tambah Gambar</button>

                    <h2 class="mt-6">Info Image Paket</h2>
                    <div class="relative w-full overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out transform" id="carousel-paket">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 1" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 2" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 3" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 4" class="w-1/3 flex-shrink-0">
                        </div>
                        <button onclick="prevSlide('carousel-paket')" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1">Prev</button>
                        <button onclick="nextSlide('carousel-paket')" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1">Next</button>
                    </div>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Tambah Gambar</button>

                    <h2 class="mt-6">Info Image Jadwal</h2>
                    <div class="relative w-full overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out transform" id="carousel-jadwal">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 1" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 2" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 3" class="w-1/3 flex-shrink-0">
                            <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="Slide 4" class="w-1/3 flex-shrink-0">
                        </div>
                        <button onclick="prevSlide('carousel-jadwal')" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1">Prev</button>
                        <button onclick="nextSlide('carousel-jadwal')" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1">Next</button>
                    </div>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Tambah Gambar</button>

                    <script>
                        function updateCarousel(carouselId) {
                            const carousel = document.getElementById(carouselId);
                            const slideWidth = carousel.children[0].offsetWidth;
                            carousel.style.transform = `translateX(-${carousel.dataset.currentIndex * slideWidth}px)`;
                        }

                        function prevSlide(carouselId) {
                            const carousel = document.getElementById(carouselId);
                            const currentIndex = parseInt(carousel.dataset.currentIndex || 0);
                            carousel.dataset.currentIndex = (currentIndex > 0) ? currentIndex - 1 : carousel.children.length - 3;
                            updateCarousel(carouselId);
                        }

                        function nextSlide(carouselId) {
                            const carousel = document.getElementById(carouselId);
                            const currentIndex = parseInt(carousel.dataset.currentIndex || 0);
                            carousel.dataset.currentIndex = (currentIndex < carousel.children.length - 3) ? currentIndex + 1 : 0;
                            updateCarousel(carouselId);
                        }

                        window.addEventListener('resize', () => {
                            updateCarousel('carousel-utama');
                            updateCarousel('carousel-paket');
                            updateCarousel('carousel-jadwal');
                        });
                    </script>
            </div>


        </div>
    </div>
</x-app-layout>
