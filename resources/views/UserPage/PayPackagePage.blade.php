@extends('UserLayout.MainLayout')

@section('title', 'Paket Pembayaran')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <h1 class="text-lg font-bold mb-4">Metode Pembayaran</h1>
    <div class="bg-white p-4 shadow-md rounded-lg mb-4 text-center">
        <p class="font-semibold">Kode Bayar : <span class="text-gray-700">#33156A1</span></p>
        <div class="flex flex-col items-center my-4">
            <img src="{{ asset('Assets/Images/icons/logo_bca.png') }}" alt="BCA Logo" class="h-10">
            <span class="mt-2 italic text-lg font-bold">An. Hopes Studio</span>
        </div>
        <div class="flex items-center justify-center space-x-2">
            <img src="{{ asset('Assets/Images/icons/copy_text.svg') }}" alt="Copy" class="w-5 h-5 cursor-pointer" onclick="copyToClipboard('2831374717')">
            <p class="text-lg font-bold text-gray-800">2831374717</p>
        </div>
        <div class="flex items-center justify-center space-x-2 mt-2">
            <img src="{{ asset('Assets/Images/icons/copy_text.svg') }}" alt="Copy" class="w-5 h-5 cursor-pointer" onclick="copyToClipboard('25000')">
            <p class="text-lg font-bold text-red-500">Rp. 25.000</p>
        </div>
        <p class="text-red-500 text-sm mt-2">&#9679; Screenshot apabila diperlukan</p>
    </div>

    <h2 class="text-lg font-bold mb-2">Petunjuk Akhir</h2>
    <div class="bg-white p-4 shadow-md rounded-lg mb-4">
        <p class="text-gray-700">Setelah anda melakukan transfer pada rekening tersebut, selanjutnya anda diharapkan untuk mengirimkan bukti transfer pada tombol di bawah ini.</p>
        <button class="mt-4 w-full bg-blue-500 text-white font-bold py-2 rounded-lg">Konfirmasi Pembayaran</button>
    </div>

    <div class="bg-white p-4 shadow-md rounded-lg mb-16">
        <p class="text-gray-700">Apabila anda kesulitan dan mengalami masalah, silahkan untuk menghubungi No. Whatsapp pada tombol di bawah ini sekarang juga.</p>
        <button class="mt-4 w-full bg-green-500 text-white font-bold py-2 rounded-lg">Konsultasi Masalah</button>
    </div>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Teks telah disalin: ' + text);
        }).catch(err => {
            console.error('Gagal menyalin teks:', err);
        });
    }
</script>

@endsection
