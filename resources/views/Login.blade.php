<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <div class="flex justify-center mb-6">
            <img src="/path-to-logo.png" alt="Logo" class="w-16 h-16">
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-2">Login</h2>
        <p class="text-center text-gray-500 mb-6">Silahkan lakukan Login untuk Booking Schedule</p>

        <form action="#" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email.." class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password.." class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex justify-between items-center mb-4">
                <a href="#" class="text-blue-500 text-sm">Forgot Password?</a>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Login</button>
        </form>

        <p class="text-center text-gray-600 mt-4">Belum punya akun? <a href="#" class="text-blue-500">Register</a></p>
    </div>
</body>
</html>
