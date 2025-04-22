@extends('UserLayout.MainLayout')

@section('title', 'Pembayaran Paket')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <!-- Tombol Kembali -->
    <button onclick="window.history.back()" class="text-gray-600 mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </button>

    <!-- Judul -->
    <h2 class="text-lg font-bold mt-4 mb-3">Detail Pembayaran</h2>

    <!-- Box Informasi Pembayaran -->
    <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
        <p class="text-sm text-gray-600 mb-2">Metode Pembayaran</p>
        <div class="bg-white border p-4 rounded-lg">
            <p class="text-sm font-medium mb-2">Kode Bayar: <span class="text-gray-700">#33156A1</span></p>
            <div class="flex items-center justify-between mb-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/BCA_logo.svg/2560px-BCA_logo.svg.png" alt="BCA Logo" class="h-6">
                <p class="text-sm text-right">An. Hopes Studio</p>
            </div>
            <div class="mb-2">
                <p class="text-sm text-gray-600">Nomor Rekening</p>
                <p class="text-lg font-semibold text-blue-600 tracking-wide">2831374717</p>
            </div>
            <div class="mb-2">
                <p class="text-sm text-gray-600">Jumlah Pembayaran</p>
                <p class="text-lg font-bold text-red-600">Rp. 25.000</p>
            </div>
            <p class="text-xs text-red-500 mt-2">* Screenshot apabila diperlukan</p>
        </div>
    </div>

    <!-- Petunjuk Akhir -->
    <div class="bg-gray-100 p-4 rounded-lg mt-6 text-sm text-gray-700">
        <p class="mb-3">
            Setelah anda melakukan transfer pada rekening tersebut, selanjutnya anda diharapkan untuk mengirimkan bukti transfer pada tombol di bawah ini.
        </p>
        <button class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            Konfirmasi Pembayaran
        </button>
    </div>

    <!-- Konsultasi -->
    <div class="bg-gray-100 p-4 rounded-lg mt-4 text-sm text-gray-700">
        <p class="mb-3">
            Apabila anda kesulitan dan mengalami masalah, silahkan untuk menghubungi No. Whatsapp pada tombol di bawah ini sekarang juga.
        </p>
        <button class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
            Konsultasi Masalah
        </button>
    </div>
</div>
@endsection

