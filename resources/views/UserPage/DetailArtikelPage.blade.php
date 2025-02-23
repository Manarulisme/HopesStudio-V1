@extends('UserLayout.MainLayout')

@section('title', 'Detail Artikel')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-4 shadow-lg mt-6 rounded-lg mb-20">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('Assets/Images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
            <div>
                <h2 class="text-lg font-semibold">Hopes Studio</h2>
                <p class="text-sm text-gray-500">3 days ago</p>
            </div>
        </div>
        <img src="{{ asset('Assets/Images/icons/shareIcon.svg') }}" alt="Share" class="w-6 h-6 cursor-pointer">
    </div>
    <img src="{{ asset('Assets/Images/ImageArtikel.png') }}" alt="Gambar Artikel" class="w-full my-4 rounded-lg">
    <h1 class="text-xl font-bold mb-2">Manfaat Pilates bagi tubuh di usia muda</h1>
    <p class="text-gray-700 text-justify mb-4">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
        to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised.
    </p>
    <p class="text-gray-700 text-justify mb-4">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
        to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised.
    </p>
    <p class="font-semibold">Ditulis oleh : <span class="text-indigo-600">Suryani Sanusi</span></p>
</div>
@endsection
