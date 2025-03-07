@extends('UserLayout.MainLayout')

@section('title', 'Pembayaran Paket')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <button onclick="window.history.back()" class="text-gray-600 mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <h2 class="text-lg font-bold mt-4">Detail Pembayaran</h2>
    <div class="bg-gray-200 p-3 rounded-lg text-sm text-gray-700">
        <p><span class="font-bold">Kode Pembayaran</span><br>{{ $pembayaran->kode_pembayaran }}</p>
        <p class="mt-2"><span class="font-bold">Nama Pengirim</span><br>{{ $pembayaran->nama_pengirim }}</p>
        <p class="mt-2"><span class="font-bold">Tanggal Pembayaran</span><br>{{ $pembayaran->tanggal_pembayaran }}</p>
        <p class="mt-2"><span class="font-bold">Status Pembayaran</span><br>{{ ucfirst($pembayaran->status_pembayaran) }}</p>
        <p class="mt-2"><span class="font-bold">Total Harga</span><br>Rp. {{ number_format($pembayaran->paket->harga, 0, ',', '.') }}</p>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" class="w-full px-3 py-2 border rounded-lg bg-gray-100">
        </div>
        <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-bold py-2 rounded-lg mb-20">Upload Bukti</button>
    </form>
</div>
@endsection
