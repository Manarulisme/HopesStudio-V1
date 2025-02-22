<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <button onclick="window.location.href='{{ route('send_otp_user') }}'" class="text-gray-600 mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h2 class="text-2xl font-semibold mb-2">Buat password baru</h2>
        <p class="text-gray-600 mb-4">Anda dapat membuat password yang berbeda dari yang sebelumnya</p>

        <form>
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Password</label>
                <input type="password" placeholder="Masukkan password baru.." class="w-full p-3 mt-1 border rounded-lg bg-gray-100">
            </div>

            <div class="mb-6">
                <label class="block font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" placeholder="Masukkan konfirmasi password.." class="w-full p-3 mt-1 border rounded-lg bg-gray-100">
            </div>

            <button type="submit" class="w-full p-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Reset Password</button>
        </form>
    </div>
</body>
</html>
