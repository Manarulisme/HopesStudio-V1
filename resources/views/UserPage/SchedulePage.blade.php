@extends('UserLayout.MainLayout')

@section('title', 'Jadwal')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">


    {{-- Carousel Info Image Jadwal --}}
    @if ($infoImages->isNotEmpty())
    <div id="carousel-info-jadwal" class="relative w-full h-40 rounded-lg overflow-hidden mb-6">
        <div class="flex transition-transform duration-500 ease-in-out" style="transform: translateX(0);" data-current-index="0">
            @foreach ($infoImages as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Info Jadwal {{ $loop->iteration }}" class="w-full h-40 object-cover flex-shrink-0">
            @endforeach
        </div>

        <button onclick="prevSlide('carousel-info-jadwal')"
                class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-2 py-1 rounded">
            &#10094;
        </button>
        <button onclick="nextSlide('carousel-info-jadwal')"
                class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-2 py-1 rounded">
            &#10095;
        </button>
    </div>
    @endif

    <div class="bg-white p-4 shadow-md rounded-lg mb-4 text-center">
        {{-- Notifikasi jika tanggal tidak diisi --}}
        @if ($errors->has('tanggal'))
            <p class="text-red-500 text-sm mb-2">{{ $errors->first('tanggal', 'Tanggal harus diisi.') }}</p>
        @endif

        {{-- Form pencarian tanggal --}}
        <form action="{{ route('jadwal_search') }}" method="GET" class="mb-4">
            <div class="flex flex-col space-y-2 mb-4">
                <input type="date" name="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}" class="w-full border rounded-lg p-2" />
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Cari Jadwal</button>
        </form>
    </div>

    @php
        $selectedDate = \Carbon\Carbon::parse(request('tanggal', date('Y-m-d')));
        $today = \Carbon\Carbon::today();
    @endphp

    <h2 class="text-lg font-bold mb-2">
        @if ($selectedDate->isSameDay($today))
            Jadwal Hari Ini
        @else
            Jadwal Tanggal {{ $selectedDate->translatedFormat('d F Y') }}
        @endif
    </h2>

    <div class="bg-white p-4 shadow-md rounded-lg mb-24">
        @if ($jadwals->isEmpty())
            <p class="text-center text-red-500">Tidak ada jadwal tersedia untuk tanggal ini.</p>
        @else
            @foreach ($jadwals as $jadwal)
            <div class="p-2 border-b mb-2">
                <p class="font-bold">
                    Sesi {{ $jadwal->sesi }} - Pukul : {{ date('H:i', strtotime($jadwal->waktu_mulai)) }}
                    <span class="text-red-500 ml-2">Peserta : {{ $jadwal->peserta }}</span>
                </p>
                <p>Ruang : {{ $jadwal->ruang }}</p>
                <p>Pelatih : {{ $jadwal->trainer }}</p>
                <p class="text-blue-500">Kuota {{ $jadwal->kuota }}</p>

                @if ($jadwal->kuota > 0 && !$jadwal->isBooked)
                    <a href="{{ route('booking-jadwal.show', ['booking_jadwal' => $jadwal->id]) }}" class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg text-center block">Booking Sekarang</a>
                @elseif ($jadwal->isBooked)
                    <button class="w-full bg-gray-400 text-white font-bold py-2 rounded-lg cursor-not-allowed" disabled>Anda Sudah Booking</button>
                @else
                    <button class="w-full bg-gray-400 text-white font-bold py-2 rounded-lg cursor-not-allowed">Booking Penuh</button>
                @endif
            </div>
            @endforeach
        @endif
    </div>
</div>

<script>
    function updateCarousel(carouselId) {
        const carousel = document.getElementById(carouselId);
        const track = carousel.querySelector('div.flex');
        const currentIndex = parseInt(track.dataset.currentIndex || 0);
        const slideWidth = carousel.offsetWidth;
        track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }

    function prevSlide(carouselId) {
        const carousel = document.getElementById(carouselId);
        const track = carousel.querySelector('div.flex');
        let currentIndex = parseInt(track.dataset.currentIndex || 0);
        const slidesCount = track.children.length;
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : slidesCount - 1;
        track.dataset.currentIndex = currentIndex;
        updateCarousel(carouselId);
    }

    function nextSlide(carouselId) {
        const carousel = document.getElementById(carouselId);
        const track = carousel.querySelector('div.flex');
        let currentIndex = parseInt(track.dataset.currentIndex || 0);
        const slidesCount = track.children.length;
        currentIndex = (currentIndex < slidesCount - 1) ? currentIndex + 1 : 0;
        track.dataset.currentIndex = currentIndex;
        updateCarousel(carouselId);
    }
</script>

@endsection
