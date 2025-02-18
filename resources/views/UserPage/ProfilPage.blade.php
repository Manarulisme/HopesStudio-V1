@extends('UserLayout.MainLayout')

@section('content')
<div class="flex justify-center items-center min-h-screen pb-16">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md relative text-center">
        <div class="bg-blue-500 h-24 rounded-t-lg"></div>
        <div class="-mt-12">
            <img src="{{asset('Assets/Images/profil_user.png')}}" alt="Profile Picture" class="w-24 h-24 rounded-full mx-auto border-4 border-white">
        </div>
        <div class="bg-gray-200 p-4 rounded-lg mt-4 text-left">
            <p><strong>Nama Lengkap:</strong> Citra Ayunda</p>
            <p><strong>Alamat:</strong> Jl. Pegangsaan Timur No.10 Jakarta Barat</p>
            <p><strong>Nomor HP:</strong> 083827272727</p>
            <p><strong>Email:</strong> citraayunda@gmail.com</p>
        </div>
        <button class="w-full bg-blue-600 text-white p-2 rounded-lg font-semibold hover:bg-blue-700 mt-4">Sunting Profil</button>
        <button class="w-full bg-red-500 text-white p-2 rounded-lg font-semibold hover:bg-red-700 mt-2"><a href="{{route('login_user')}}">Logout</a></button>
    </div>
</div>
@endsection
