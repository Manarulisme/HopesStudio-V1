@extends('UserLayout.MainLayout')

@section('title', 'Sunting Profil')


@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <div class="flex items-center space-x-2 mb-4">
        <button onclick="window.location.href='{{ route('profil_user') }}'" class="text-gray-600 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h1 class="text-lg font-bold ml-2">Sunting Profil</h1>
    </div>

    <div class="flex flex-col items-center mb-4">
        <img src="{{ asset('Assets/Images/profil_user.png') }}" alt="Profile" class="w-24 h-24 rounded-full border">
        <p class="text-sm text-gray-600 mt-2">Ubah foto</p>
    </div>

    <form>
        <div class="mb-3">
            <label class="block text-gray-700">Nama Lengkap</label>
            <input type="text" placeholder="Masukkan Nama Lengkap.." class="w-full px-3 py-2 border rounded-lg bg-gray-100">
        </div>

        <div class="mb-3">
            <label class="block text-gray-700">NIK</label>
            <input type="text" placeholder="Masukkan NIK.." class="w-full px-3 py-2 border rounded-lg bg-gray-100">
        </div>

        <div class="mb-3">
            <label class="block text-gray-700">Alamat</label>
            <input type="text" placeholder="Masukkan Alamat Lengkap.." class="w-full px-3 py-2 border rounded-lg bg-gray-100">
        </div>

        <div class="mb-3">
            <label class="block text-gray-700">Email</label>
            <input type="email" placeholder="Masukkan Email.." class="w-full px-3 py-2 border rounded-lg bg-gray-100">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">No. HP / Whatsapp</label>
            <input type="text" placeholder="Masukkan No HP / Whatsapp.." class="w-full px-3 py-2 border rounded-lg bg-gray-100">
        </div>

        <button class="mt-6 w-full bg-blue-500 text-white font-bold py-2 rounded-lg mb-20">Perbaharui Profil</button>
    </div>
    </form>
</div>

@endsection
