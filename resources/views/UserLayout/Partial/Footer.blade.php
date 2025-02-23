<!-- Sticky Navigation Menu -->
<nav class="fixed bottom-0 left-0 w-full bg-white shadow-md py-2">
    <div class="flex justify-around text-[#0D99FF]">
        <a href="{{ route('dashboard_user') }}" class="flex flex-col items-center text-sm">
            <img src="{{ asset('Assets/Images/icons/home_menu.svg') }}" class="w-6 h-6" alt="Home Menu">
            Beranda
        </a>
        <a href="{{ route('paket_user') }}" class="flex flex-col items-center text-sm">
            <img src="{{ asset('Assets/Images/icons/paket_menu.svg') }}" class="w-6 h-6" alt="Paket Menu">
            Paket
        </a>
        <a href="{{ route('jadwal_user') }}" class="flex flex-col items-center text-sm bg-[#0D99FF] text-white p-2 rounded-full">
            <img src="{{ asset('Assets/Images/icons/jadwal_menu.svg') }}" class="w-6 h-6" alt="Jadwal Menu">Jadwal
        <a href="{{ route('list_artikel_user') }}" class="flex flex-col items-center text-sm">
            <img src="{{ asset('Assets/Images/icons/artikel_menu.svg') }}" class="w-6 h-6" alt="Artikel Menu">
            Artikel
        </a>
        <a href="{{ route('profil_user') }}" class="flex flex-col items-center text-sm">
            <img src="{{ asset('Assets/Images/icons/profil_menu.svg') }}" class="w-6 h-6" alt="Profil Menu">
            Saya
        </a>
    </div>
</nav>
