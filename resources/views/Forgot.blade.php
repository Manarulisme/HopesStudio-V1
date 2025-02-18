<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md text-center relative">
        <a href="{{ route('login_user') }}" class="absolute left-4 top-4 text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="flex justify-center mb-4">
            <img src="{{asset('Assets/Images/forgot_illustrator.png')}}" alt="Illustration" class="w-48">
        </div>
        <h2 class="text-2xl font-bold">Lupa Password ?</h2>
        <p class="text-gray-600 mb-4">Jangan khawatir, anda bisa lakukan verifikasi</p>

        <form>
            <label class="block text-left mb-2 font-semibold">Email</label>
            <input type="email" placeholder="Masukkan Email.." class="w-full p-3 border rounded-lg mb-4 bg-gray-100">

            <button class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700">Kirim Kode</button>
        </form>
    </div>
</body>
</html>
