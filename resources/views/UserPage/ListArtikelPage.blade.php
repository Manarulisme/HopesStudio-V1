@extends('UserLayout.MainLayout')

@section('title', 'List Artikel')

@section('content')
<div class="max-w-md mx-auto bg-white">
    <!-- Header dengan gambar utama -->
    <div class="relative">
        <img src="{{ asset('Assets/Images/featureImage.png') }}" alt="Gambar Header" class="w-full h-48 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center p-4">
            <h1 class="text-white text-xl font-bold">Manfaat Pilates bagi tubuh di usia muda</h1>
        </div>
    </div>

    <!-- List Artikel -->
    <div class="p-4 mb-20">
        <div class="space-y-4">
            <div class="flex items-center space-x-3 bg-white p-2 rounded-lg shadow">
                <img src="{{ asset('Assets/Images/ImageArtikel.png') }}" alt="Thumbnail" class="w-20 h-20 object-cover rounded-lg">
                <p class="text-sm font-semibold">Judul Artikel untuk isian di web Hopes Store supaya lebih dikenal</p>
            </div>
            <div class="flex items-center space-x-3 bg-white p-2 rounded-lg shadow">
                <img src="{{ asset('Assets/Images/ImageArtikel.png') }}" alt="Thumbnail" class="w-20 h-20 object-cover rounded-lg">
                <p class="text-sm font-semibold">Judul Artikel untuk isian di web Hopes Store supaya lebih dikenal</p>
            </div>
            <div class="flex items-center space-x-3 bg-white p-2 rounded-lg shadow">
                <img src="{{ asset('Assets/Images/ImageArtikel.png') }}" alt="Thumbnail" class="w-20 h-20 object-cover rounded-lg">
                <p class="text-sm font-semibold">Judul Artikel untuk isian di web Hopes Store supaya lebih dikenal</p>
            </div>
            <div class="flex items-center space-x-3 bg-white p-2 rounded-lg shadow">
                <img src="{{ asset('Assets/Images/ImageArtikel.png') }}" alt="Thumbnail" class="w-20 h-20 object-cover rounded-lg">
                <p class="text-sm font-semibold">Judul Artikel untuk isian di web Hopes Store supaya lebih dikenal</p>
            </div>
        </div>
    </div>
</div>
@endsection
