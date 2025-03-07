@extends('UserLayout.MainLayout')

@section('title', 'Profil')

@section('content')
<div class="flex justify-center items-center min-h-screen pb-16">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md relative text-center">
        <div class="bg-blue-500 h-24 rounded-t-lg"></div>
        <div class="-mt-12">
            <img src="{{ asset('path/to/profile/pictures/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full mx-auto border-4 border-white">
        </div>
        <div class="bg-gray-200 p-4 rounded-lg mt-4 text-left">
            <p><strong>Nama Lengkap:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Alamat:</strong> {{ Auth::user()->alamat }}</p>
            <p><strong>Nomor HP:</strong> {{ Auth::user()->no_telepon }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>
        <a href="{{ route('profil-user.edit', Auth::user()->id) }}">
            <button class="w-full bg-blue-600 text-white p-2 rounded-lg font-semibold hover:bg-blue-700 mt-4">Sunting Profil</button>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full bg-red-500 text-white p-2 rounded-lg font-semibold hover:bg-red-700 mt-2">Logout</button>
        </form>

    </div>
</div>
@endsection
