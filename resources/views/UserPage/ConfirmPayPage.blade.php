@extends('UserLayout.MainLayout')

@section('title', 'Konfirmasi Pembayaran')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 shadow-md rounded-lg mt-10 flex-grow">
    <h1 class="text-xl font-bold mb-4">Konfirmasi Pembayaran</h1>

    <label class="block text-gray-700">Kode Bayar</label>
    <input type="text" placeholder="Masukkan Kode Bayar.." class="w-full p-2 border rounded mb-4 bg-gray-200" name="kode_pembayaran">

    <label class="block text-gray-700">Nama Pengirim</label>
    <input type="text" placeholder="Masukkan Nama Pengirim Sesuai tertara di bukti transfer.." class="w-full p-2 border rounded mb-4 bg-gray-200" name="nama_pengirim">

    <label class="block text-gray-700">Tanggal Pengiriman</label>
    <input type="date" placeholder="Masukkan Tanggal Pengiriman Sesuai tertara di bukti transfer.." class="w-full p-2 border rounded mb-4 bg-gray-200" name="tanggal_pembayaran">

    <label class="block text-gray-700">Upload Bukti Transfer</label>
    <input type="file" class="w-full p-2 border rounded mb-4" name="bukti_pembayaran">

    <button class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Kirim Konfirmasi</button>
</div>

@endsection
