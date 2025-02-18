<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md text-center relative">
        <a href="{{route('beranda_user')}}" class="absolute left-4 top-4 text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="flex justify-center mb-4">
            <img src="{{asset('Assets/Images/logo.png')}}" alt="Logo" class="w-24">
        </div>
        <h2 class="text-2xl font-bold">Login</h2>
        <p class="text-gray-600 mb-4">Silahkan lakukan Login untuk Booking Schedule</p>

        <form>
            <label class="block text-left mb-2 font-semibold">Email</label>
            <input type="email" placeholder="Masukkan Email.." class="w-full p-3 border rounded-lg mb-4 bg-gray-100">

            <label class="block text-left mb-2 font-semibold">Password</label>
            <input type="password" placeholder="Masukkan Password.." class="w-full p-3 border rounded-lg mb-2 bg-gray-100">

            <div class="text-right mb-4">
                <a href="{{route('forgot_user')}}" class="text-blue-600 hover:underline">Forgot Password ?</a>
            </div>

            <button class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700">Login</button>
        </form>

        <p class="mt-4 text-gray-600">Belum punya akun ? <a href="{{route('register_user')}}" class="text-blue-600 font-semibold hover:underline">Register</a></p>
    </div>
</body>
</html>
