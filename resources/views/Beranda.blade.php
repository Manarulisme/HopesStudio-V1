<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hopes Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('Assets/Images/logo.png') }}">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-2xl shadow-lg max-w-sm text-center">
        <div class="flex justify-center mb-4">
            <img src="{{asset('Assets/Images/pilates_ilustrator.png')}}" alt="Yoga Illustration" class="rounded-lg">
        </div>
        <h1 class="text-lg font-bold text-gray-800">Hopes Studio</h1>
        <p class="text-xl font-semibold text-gray-900 mt-2">Gerak-gerik seru asyik<br> Tubuh makin kece</p>
        <p class="text-gray-600 mt-2">Yuk, bikin hari-harimu lebih berwarna dengan gerakan yang menyenangkan!</p>
        <div class="mt-4">
            <a href="{{route('login')}}">
                <button class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold">Login</button>
            </a>
            <button class="w-full mt-2 border border-gray-400 text-gray-700 py-2 rounded-lg font-semibold"><a href="{{route('register_user')}}">Register</a></button>
        </div>
    </div>
</body>
</html>
