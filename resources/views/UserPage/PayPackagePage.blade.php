@extends('UserLayout.MainLayout')

@section('title', 'Pembayaran Paket')

@section('content')
<div class="max-w-md mx-auto bg-white min-h-screen p-4">
    <h2 class="text-lg font-bold mt-4 mb-3">Detail Pembayaran</h2>

    <!-- Box Informasi Pembayaran -->
    <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
        <p class="text-sm text-gray-600 mb-2">Metode Pembayaran</p>
        <div class="bg-white border p-4 rounded-lg">
            <p class="text-sm font-medium mb-2">
                Kode Bayar:
                <span class="text-gray-700">{{ $pembayaran->kode_pembayaran }}</span>
            </p>

            <div class="flex items-center justify-between mb-3">
                <img src="{{ asset('Assets/Images/logo/logo_bank_bca.png') }}" alt="BCA Logo" class="h-6">
                <p class="text-sm text-right">An. Dwi I Sudargo</p>
            </div>

            <div class="mb-2 flex items-center space-x-2">
                <div>
                    <p class="text-sm text-gray-600">Nomor Rekening</p>
                    <p id="nomorRekening" class="text-lg font-semibold text-blue-600 tracking-wide select-all">2550021211</p>
                </div>
                <button id="copyBtn"
                    class="bg-blue-500 hover:bg-blue-700 text-white text-sm px-3 py-1 rounded transition"
                    title="Salin nomor rekening">
                    Copy
                </button>
            </div>

            <div class="mb-2">
                <p class="text-sm text-gray-600">Jumlah Pembayaran</p>
                <p class="text-lg font-bold text-red-600">
                    Rp. {{ number_format($pembayaran->paket->harga, 0, ',', '.') }}
                </p>
            </div>

            <p class="text-xs text-red-500 mt-2">* Screenshot apabila diperlukan</p>
        </div>
    </div>

    <!-- Petunjuk Akhir -->
    <div class="bg-gray-100 p-4 rounded-lg mt-6 text-sm text-gray-700">
        <p class="mb-3">
            Setelah anda melakukan transfer pada rekening tersebut, selanjutnya anda diharapkan untuk mengirimkan bukti transfer pada menu paket atau tombol di bawah ini.
        </p>
        <a href="{{ route('paket_user') }}"
           class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition text-center block">
            Konfirmasi Pembayaran
        </a>
    </div>

    <!-- Konsultasi -->
    <div class="bg-gray-100 p-4 rounded-lg mt-4 text-sm text-gray-700">
        <p class="mb-3">
            Apabila anda kesulitan dan mengalami masalah, silahkan untuk menghubungi No. Whatsapp pada tombol di bawah ini sekarang juga.
        </p>
        <a href="https://wa.link/gfx9hq" target="_blank"
           class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition text-center block">
            Konsultasi Masalah
        </a>
    </div>
</div>

<script>
    document.getElementById('copyBtn').addEventListener('click', function () {
        const nomor = document.getElementById('nomorRekening').textContent.trim();
        navigator.clipboard.writeText(nomor).then(() => {
            alert('Nomor rekening berhasil disalin: ' + nomor);
        }).catch(() => {
            alert('Gagal menyalin nomor rekening, silakan salin manual.');
        });
    });
</script>
@endsection
