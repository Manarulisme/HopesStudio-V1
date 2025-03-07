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
        <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="foto paket" class="w-full h-48 object-cover">
        <div class="absolute top-2 left-2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-lg text-sm font-bold">Paket {{ $OrderPakets->jumlah_sesi }} Sesi</div>
    </div>

    <h2 class="text-lg font-bold mt-4">Deskripsi</h2>
    <div class="bg-gray-200 p-3 rounded-lg text-sm text-gray-700">
        {{ $OrderPakets->deskripsi }}
    </div>

    <h2 class="text-lg font-bold mt-4">Informasi Diri</h2>
    <div class="bg-gray-200 p-3 rounded-lg text-sm text-gray-700">
        <p><span class="font-bold">Nama</span><br>{{ Auth::user()->name }}</p>
        <p class="mt-2"><span class="font-bold">Email</span><br>{{ Auth::user()->email }}</p>
        <p class="mt-2"><span class="font-bold">No. HP</span><br>{{ Auth::user()->no_telepon }}</p>
        <p class="mt-2 flex justify-between items-center">
            <span class="font-bold">Total Harga</span>
            <span class="text-blue-500 font-bold">Rp. {{ number_format($OrderPakets->harga, 0, ',', '.') }}</span>
        </p>
    </div>

    <form action="{{ route('order-paket.store') }}" method="POST">
        @csrf
        <input type="hidden" name="OrderPakets_id" value="{{ $OrderPakets->id }}">
        <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-bold py-2 rounded-lg mb-20">Pesan Sekarang</button>
    </form>
</div>
@endsection
