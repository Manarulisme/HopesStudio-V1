@extends('UserLayout.MainLayout')

@section('title', 'List Artikel')

@section('content')
<div class="max-w-md mx-auto bg-white">
    <!-- Header dengan gambar utama -->
    <div class="relative">
        @foreach ($headlines as $headline)
            <img src="{{ asset('storage/' . $headline->gambar_utama) }}" alt="Gambar Header" class="w-full h-48 object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center p-4">
                <a href="{{ route('detail_artikel_user', ['slug' => $headline->slug]) }}" class="text-white text-xl font-bold">
                    {{ $headline->judul }}
                </a>
            </div>
        @endforeach
    </div>

    <!-- List Artikel -->
    <div class="p-4 mb-20">
        <div class="space-y-4">
            @foreach ($artikels as $artikel)
                <a href="{{ route('detail_artikel_user', ['slug' => $artikel->slug]) }}" class="flex items-center space-x-3 bg-white p-2 rounded-lg shadow">
                    <img src="{{ asset('storage/' . $artikel->gambar_utama) }}" alt="Thumbnail" class="w-20 h-20 object-cover rounded-lg">
                    <p class="text-sm font-semibold">{{ $artikel->judul }}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
