@extends('UserLayout.MainLayout')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-md mx-auto bg-white min-h-screen">
    <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('Assets/Images/logo.png') }}" alt="Logo" class="w-8 h-8 rounded-full">
            <h1 class="text-lg font-bold">Hopes Studio</h1>
        </div>
        <button>
            <a href="{{ route('konfirmasi_pembayaran_user') }}">
                <img src="{{ asset('Assets/Images/icons/confirm_button.svg') }}" class="h-6 w-6 text-blue-500" alt="Confirm Button">
            </a>
        </button>
    </div>

    <div class="p-4">
        <div class="relative w-full h-48 rounded-lg overflow-hidden">
            <img src="{{ asset('Assets/Images/hero_pilates.png') }}" alt="Workout" class="w-full h-full object-cover">
        </div>
    </div>

    <div class="p-4 mb-16">
        <h2 class="text-lg font-bold mb-2">Paket Terpopuler</h2>
        <div class="space-y-4">
            @foreach ($pakets as $paket)
            <a href="{{ route('order-paket.show', ['order_paket' => $paket->id]) }}">
                <div class="relative w-full h-24 rounded-lg overflow-hidden mb-4">
                    <img src="{{ asset('Assets/Images/dashboard-popular.png') }}" alt="{{ $paket->nama_paket }}" class="w-full h-full object-cover opacity-90">
                    <span class="absolute top-4 left-4 text-white text-xl font-bold">{{ $paket->nama_paket }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

@endsection
