<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Assets/Images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md relative">
        <a href="{{route('beranda_user')}}" class="absolute left-4 top-4 text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="flex justify-center mb-4">
            <img src="{{asset('Assets/Images/logo.png')}}" alt="Logo" class="w-20 h-20">
        </div>
        <h2 class="text-2xl font-bold text-center">Register</h2>
        <p class="text-center text-gray-600 mb-4">Silahkan isi informasi diri</p>

        <form action="{{ route('register_user_post') }}" method="POST">
            @csrf
            <label class="block mb-2 font-semibold">Username</label>
            <input type="text" placeholder="Masukkan Username.." class="w-full p-3 border rounded-lg mb-4 bg-gray-100" name="name">

            <label class="block mb-2 font-semibold">Email</label>
            <input type="email" placeholder="Masukkan Email.." class="w-full p-3 border rounded-lg mb-4 bg-gray-100" name="email">

            <label class="block mb-2 font-semibold">No. Whatsapp</label>
            <input type="text" placeholder="Masukkan No. Whatsapp.." class="w-full p-3 border rounded-lg mb-4 bg-gray-100" name="no_telepon">

            <label class="block mb-2 font-semibold">Password</label>
            <input type="password" placeholder="Password.." class="w-full p-3 border rounded-lg mb-4 bg-gray-100" name="password">

            <button class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700">Register</button>
        </form>

        <p class="text-center mt-4 text-gray-600">Sudah punya akun ? <a href="{{route('login_user')}}" class="text-blue-600 font-semibold">Login</a></p>
    </div>
</body>
</html>
