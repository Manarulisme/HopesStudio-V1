<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md relative text-center">
        <a href="{{route('forgot_user')}}" class="absolute left-4 top-4 text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="flex justify-center mb-4">
            <img src="{{asset('Assets/Images/otp_illustrator.png')}}" alt="Illustration" class="w-40">
        </div>
        <h2 class="text-2xl font-bold">Verifikasi OTP</h2>
        <p class="text-gray-600 mb-4">Silahkan masukkan kode OTP yang telah dikirimkan ke email anda</p>

        <form>
            <div class="flex justify-center gap-2 mb-4">
                <input type="text" maxlength="1" class="w-12 h-12 text-center text-xl border rounded-lg" required>
                <input type="text" maxlength="1" class="w-12 h-12 text-center text-xl border rounded-lg" required>
                <input type="text" maxlength="1" class="w-12 h-12 text-center text-xl border rounded-lg" required>
                <input type="text" maxlength="1" class="w-12 h-12 text-center text-xl border rounded-lg" required>
            </div>

            <button class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700">Verifikasi</button>
        </form>

        <p class="mt-4 text-gray-600">Belum dapat kode? <a href="#" class="text-blue-600 font-semibold hover:underline">Kirim ulang</a></p>
    </div>
</body>
</html>
