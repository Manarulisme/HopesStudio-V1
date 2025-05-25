@extends('UserLayout.MainLayout')

@section('title', 'Paket Aktif')

@section('content')

<!-- Alpine.js untuk carousel -->
<script src="https://unpkg.com/alpinejs" defer></script>

<div class="max-w-md mx-auto bg-white min-h-screen">

    <!-- Flash Messages -->
    <div class="p-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-2">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-2">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Carousel Info Image Paket -->
    <div class="p-4">
        @if($infoImages->count())
            <div class="relative w-full h-40 rounded-lg overflow-hidden"
                 x-data="{ index: 0 }"
                 x-init="setInterval(() => { index = (index + 1) % {{ $infoImages->count() }} }, 5000)">
                @foreach ($infoImages as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                         alt="Info Image Paket"
                         class="w-full h-40 object-cover absolute top-0 left-0 transition-opacity duration-700"
                         x-show="index === {{ $loop->index }}"
                         x-transition.opacity>
                @endforeach

                <button @click="index = (index - 1 + {{ $infoImages->count() }}) % {{ $infoImages->count() }}"
                        class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-2 py-1 rounded hover:bg-opacity-75 z-10">
                    ‹
                </button>

                <button @click="index = (index + 1) % {{ $infoImages->count() }}"
                        class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white px-2 py-1 rounded hover:bg-opacity-75 z-10">
                    ›
                </button>
            </div>
        @else
            <div class="text-center text-gray-500">Belum ada gambar info paket.</div>
        @endif
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
                    <span class="absolute bottom-4 left-4 text-white text-xs">Sisa Sesi: {{ $paket->sisa_sesi }}</span>

                    @if($paket->status_paket === 'pending' && is_null($paket->pembayaran->bukti_pembayaran))
                        <a href="{{ route('konfirmasi_pembayaran_user', ['id' => $paket->pembayaran_id]) }}"
                           class="absolute bottom-4 right-4 bg-green-500 text-white text-xs px-3 py-1 rounded-full">
                            Konfirmasi Pembayaran
                        </a>
                    @elseif($paket->status_paket === 'pending' && !empty($paket->pembayaran->bukti_pembayaran))
                        <span class="absolute bottom-4 right-4 bg-yellow-500 text-white text-xs px-3 py-1 rounded-full">
                            <span class="text-black">Menunggu Persetujuan</span>
                        </span>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-gray-500">Tidak ada paket aktif.</p>
        @endif
    </div>

    <!-- Jadwal Aktif -->
    <div class="p-4">
        <h2 class="text-lg font-bold">Jadwal Booking</h2>

        @if($bookJadwals && $bookJadwals->count() > 0)
            @foreach($bookJadwals as $jadwal)

<div class="bg-gray-200 p-2 mt-2 rounded-lg">
    <div class="flex items-center space-x-2">
        <img src="{{ asset('Assets/Images/icons/calender.png') }}" alt="date" class="w-4 h-4">
        <p class="text-black font-bold text-sm">
            {{ \Carbon\Carbon::parse($jadwal->tanggal_booking)->translatedFormat('d F Y') }}
        </p>
    </div>
</div>


                <div class="bg-white p-4 mt-2 rounded-lg shadow flex items-center space-x-4">
                    <div class="text-blue-500">
                        <img src="{{ asset('Assets/Images/icons/jadwal_aktif.svg') }}" alt="jadwal_aktif" class="w-8 h-8">
                    </div>
                    <div class="flex-1">
                        <p class="font-bold">Sesi {{ $jadwal->jadwal->sesi ?? '-' }} - Pukul : {{ \Carbon\Carbon::parse($jadwal->jadwal->waktu_mulai)->format('H:i') ?? '-' }} WIB</p>
                        <p class="text-sm text-gray-600">Ruang : {{ $jadwal->jadwal->ruang ?? '-' }}</p>
                        <p class="text-sm text-gray-600">Pelatih : {{ $jadwal->jadwal->trainer ?? '-' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-500 font-semibold">{{ $jadwal->status }}</p>
                        <form method="POST" action="{{ route('booking-jadwal.destroy', $jadwal->id) }}"
                              onsubmit="return confirm('Yakin ingin membatalkan jadwal ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm font-semibold hover:underline">Cancel</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500 mt-2">Tidak ada jadwal aktif saat ini.</p>
        @endif
    </div>

</div>

@endsection
