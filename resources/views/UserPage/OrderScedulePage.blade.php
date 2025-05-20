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
        <img src="{{ Storage::url($detailjadwal->foto_ruangan) }}" alt="Gym" class="w-full h-48 object-cover">
    </div>

    <div class="p-4">
        <h2 class="text-lg font-bold mb-2">Detail Booking Jadwal</h2>
        <div class="bg-white p-4 shadow-md rounded-lg border">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('booking_jadwal_user') }}" method="POST">
                @csrf
                <input type="hidden" name="jadwal_id" value="{{ $detailjadwal->id }}">

                <label class="text-sm text-gray-700">Nama</label>
                <input type="text" class="font-bold w-full px-3 py-2 border rounded-lg bg-gray-100" name="name" value="{{ auth()->user()->name }}" readonly>

                <label class="text-sm text-gray-700 mt-2">Email</label>
                <input type="text" class="font-bold w-full px-3 py-2 border rounded-lg bg-gray-100" value="{{ auth()->user()->email }}" readonly>

                <label class="text-sm text-gray-700 mt-2">No. HP</label>
                <input type="text" class="font-bold w-full px-3 py-2 border rounded-lg bg-gray-100" name="no_telepon" value="{{ auth()->user()->no_telepon ?? 'N/A' }}" readonly>

                <label class="text-sm text-gray-700 mt-2">Sesi</label>
                <input type="text" class="font-bold w-full px-3 py-2 border rounded-lg bg-gray-100" value="Sesi {{ $detailjadwal->sesi }} - Pukul : {{ $detailjadwal->waktu_mulai }} WIB" readonly>

                <label class="text-sm text-gray-700 mt-2">Ruang</label>
                <input type="text" class="font-bold w-full px-3 py-2 border rounded-lg bg-gray-100" value="{{ $detailjadwal->ruang }}" readonly>

                <label class="text-sm text-gray-700 mt-2">Pelatih</label>
                <input type="text" class="font-bold w-full px-3 py-2 border rounded-lg bg-gray-100" value="{{ $detailjadwal->trainer }}" readonly>

                <button class="mt-4 w-full bg-blue-500 text-white font-bold py-2 rounded-lg" type="submit">Book Sekarang</button>
            </form>
        </div>
    </div>
</div>
@endsection
