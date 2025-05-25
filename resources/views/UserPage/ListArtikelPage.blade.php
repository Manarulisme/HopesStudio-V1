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
            <a href="{{ route('detail_artikel_user', ['slug' => $artikel->slug]) }}" class="flex items-start space-x-4 bg-white p-3 rounded-lg shadow hover:shadow-md transition">
                <!-- Gambar Thumbnail -->
                <img src="{{ asset('storage/' . $artikel->gambar_utama) }}"
                     alt="Thumbnail"
                     class="w-28 h-20 object-cover rounded-md flex-shrink-0">

                <!-- Judul dan Tanggal -->
                <div class="flex flex-col justify-between">
                    <p class="text-base font-semibold line-clamp-2 leading-snug">
                        {{ $artikel->judul }}
                    </p>
                    <p class="text-xs text-gray-500 mt-2">
                        {{ $artikel->created_at->diffForHumans() }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $artikels->links() }}
    </div>
</div>



</div>
@endsection
