@extends('UserLayout.MainLayout')

@section('title', 'Sunting Profil')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <div class="flex items-center space-x-2 mb-4">
        <button onclick="window.location.href='{{ route('profil-user.index') }}'" class="text-gray-600 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h1 class="text-lg font-bold ml-2">Sunting Profil</h1>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profil-user.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex flex-col items-center mb-4">
            <img src="{{ auth()->user()->foto_profil ? asset('storage/foto_profil/' . auth()->user()->foto_profil) : asset('default-profile.png') }}" alt="Profile" class="w-24 h-24 rounded-full border object-cover">
            <label for="foto_profil" class="text-sm text-gray-600 mt-2 cursor-pointer hover:underline">Ubah foto</label>
            <input type="file" id="foto_profil" name="foto_profil" class="hidden" onchange="if(this.files.length > 0) document.getElementById('file-chosen').textContent = this.files[0].name">
            <span id="file-chosen" class="text-sm text-gray-600 mt-2"></span>

            @error('foto_profil')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="block text-gray-700">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" placeholder="Masukkan Nama Lengkap.." class="w-full px-3 py-2 border rounded-lg @error('name') border-red-500 @enderror" >
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="block text-gray-700">NIK</label>
            <input type="text" name="nik" value="{{ old('nik', auth()->user()->nik) }}" placeholder="Masukkan NIK.." class="w-full px-3 py-2 border rounded-lg @error('nik') border-red-500 @enderror" >
            @error('nik')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="block text-gray-700">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', auth()->user()->alamat) }}" placeholder="Masukkan Alamat Lengkap.." class="w-full px-3 py-2 border rounded-lg @error('alamat') border-red-500 @enderror" >
            @error('alamat')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" placeholder="Masukkan Email.." class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror" >
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">No. HP / Whatsapp</label>
            <input type="text" name="no_telepon" value="{{ old('no_telepon', auth()->user()->no_telepon) }}" placeholder="Masukkan No HP / Whatsapp.." class="w-full px-3 py-2 border rounded-lg @error('no_telepon') border-red-500 @enderror" >
            @error('no_telepon')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="mt-6 w-full bg-blue-500 text-white font-bold py-2 rounded-lg mb-20 hover:bg-blue-600 transition duration-200">Perbaharui Profil</button>
    </form>
</div>
@endsection
