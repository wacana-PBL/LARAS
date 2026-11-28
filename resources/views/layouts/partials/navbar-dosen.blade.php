<header class="w-full bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-24 flex items-center justify-between">

        <!-- Brand Logo -->
        <a href="{{ route('dosen.dashboard') }}" style="font-family: 'Krona One', sans-serif;"
            class="text-xl sm:text-2xl tracking-wider text-black uppercase">
            LARAS
        </a>

        <!-- Navigation Links -->
        <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-800">
            <a href="{{ route('dosen.dashboard') }}"
                class="{{ request()->routeIs('dosen.dashboard') ? 'text-[#EE7816] font-semibold' : 'hover:text-[#EE7816]' }} transition">
                Dashboard
            </a>
            <a href="{{ route('dosen.bimbingan') }}"
                class="{{ request()->routeIs('dosen.bimbingan') ? 'text-[#EE7816] font-semibold' : 'hover:text-[#EE7816]' }} transition">
                Bimbingan
            </a>
            <a href="{{ route('dosen.pengajuan') }}"
                class="{{ request()->routeIs('dosen.pengajuan') ? 'text-[#EE7816] font-semibold' : 'hover:text-[#EE7816]' }} transition">
                Pengajuan
            </a>
            <a href="{{ route('dosen.jadwal') }}"
                class="{{ request()->routeIs('dosen.jadwal') ? 'text-[#EE7816] font-semibold' : 'hover:text-[#EE7816]' }} transition">
                Jadwal
            </a>
            <a href="{{ route('dosen.detail-penilaian') }}"
                class="{{ request()->routeIs('dosen.detail-penilaian') ? 'text-[#EE7816] font-semibold' : 'hover:text-[#EE7816]' }} transition">
                Penilaian
            </a>
        </nav>

        <!-- User & Logout Pill -->
        <div class="flex items-center bg-[#EE7816] rounded-full p-1.5 pl-3 space-x-3 shadow-sm">
            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" title="Keluar"
                    class="w-9 h-9 rounded-lg bg-[#D35D53] hover:bg-red-600 text-white flex items-center justify-center transition cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>

            <!-- Profile Avatar Circle -->
            <a href="{{ route('dosen.profil') }}" title="Profil Dosen"
                class="w-11 h-11 rounded-full bg-[#7A7A7A] border border-gray-400/30 overflow-hidden flex items-center justify-center hover:ring-2 hover:ring-white transition">
                <img src="https://ui-avatars.com/api/?name=Dosen+LARAS&background=7A7A7A&color=fff" alt="Avatar Dosen" class="w-full h-full object-cover">
            </a>
        </div>

    </div>
</header>