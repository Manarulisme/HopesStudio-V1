@extends('UserLayout.MainLayout')

@section('title', 'Detail Artikel')

@section('content')
<div class="max-w-md mx-auto bg-white p-4 mt-4 mb-20">
    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('Assets/Images/logo.png') }}" alt="Logo" class="w-8 h-8 rounded-full">
            <div>
                <h2 class="text-base font-semibold">Hopes Studio</h2>
                <p class="text-xs text-gray-500">{{ $artikel->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>

    <!-- Gambar Artikel -->
    <img src="{{ asset('storage/' . $artikel->gambar_utama) }}" alt="Gambar Artikel" class="w-full h-48 object-cover rounded-lg mb-4">

    <!-- Judul dan Konten -->
    <h1 class="text-lg font-bold mb-2">{{ $artikel->judul }}</h1>
    <div class="text-sm text-gray-700 text-justify mb-4">
        {!! $artikel->konten !!}
    </div>

    <!-- Penulis -->
    <p class="text-sm font-semibold">
        Ditulis oleh:
        <span class="text-indigo-600">{{ $artikel->user->name }}</span>
    </p>

    <!-- Link Kembali -->
    <div class="mt-6">
        <a href="{{ route('list_artikel_user') }}" class="text-blue-500 hover:underline">< Kembali</a>
    </div>
</div>
@endsection
