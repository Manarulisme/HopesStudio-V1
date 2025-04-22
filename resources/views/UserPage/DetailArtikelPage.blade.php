@extends('UserLayout.MainLayout')

@section('title', 'Detail Artikel')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-4 shadow-lg mt-6 rounded-lg mb-20">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('Assets/Images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
            <div>
                <h2 class="text-lg font-semibold">Hopes Studio</h2>
                <p class="text-sm text-gray-500">{{ $artikel->updated_at->diffForHumans() }}</p>
            </div>
        </div>
        <img src="{{ asset('Assets/Images/icons/shareIcon.svg') }}" alt="Share" class="w-6 h-6 cursor-pointer">
    </div>
    <img src="{{ asset('storage/' . $artikel->gambar_utama) }}" alt="Gambar Artikel" class="w-full my-4 rounded-lg">
    <h1 class="text-xl font-bold mb-2">{{ $artikel->judul }}</h1>
    <p class="text-gray-700 text-justify mb-4">
        {!! $artikel->konten !!}
    </p>

    <p class="font-semibold">Ditulis oleh :
        <span class="text-indigo-600">
            {{ $artikel->user->name}}
        </span>
    </p>
</div>
@endsection
