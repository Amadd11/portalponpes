{{-- Top Contact Bar --}}
<div class="flex justify-between px-20 py-2 text-base text-white bg-primary">
    <div class="flex items-center gap-2">
        <img src="{{ asset('assets/images/logo-ponpes.png') }}" alt="Logo" class="h-10">
        <span class="font-semibold uppercase font-poppins ">Yayasan Maqroah
            <br>Imam Syatibi
        </span>
    </div>
    <div class="items-center hidden gap-4 md:flex">
        <div class="flex items-center gap-1">
            <span>📞</span> <span>0821 4390 1334</span>
        </div>
        |
        <div class="flex items-center gap-1">
            <span>📞</span> <span>0852 3482 5621</span>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="relative z-50 bg-white shadow-md" x-data="{ open: false }">
    <div class="container flex items-center justify-between px-4 py-8 mx-auto">
        <!-- Hamburger (mobile) -->
        <button @click="open = !open" class="z-10 md:hidden focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Menu (Desktop Centered) -->
        <ul class="absolute hidden gap-6 text-black transform -translate-x-1/2 md:flex left-1/2">
            <li><a href="{{ url('/') }}" class="font-semibold text-teal-700">BERANDA</a></li>
            <li class="relative group">
                <button class="flex items-center text-black transition hover:text-teal-700">
                    PROFIL
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Dropdown Menu (Desktop) -->
                <div
                    class="absolute z-30 invisible w-40 py-2 mt-2 transition-all duration-200 translate-y-2 bg-white rounded shadow opacity-0 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
                    <a href="{{ route('profil.sejarah') }}"
                        class="block px-4 py-2 text-black hover:bg-gray-100">Sejarah</a>
                    <a href="{{ route('profil.fasilitas') }}"
                        class="block px-4 py-2 text-black hover:bg-gray-100">Fasilitas</a>
                    <a href="{{ route('profil.visimisi') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Visi &
                        Misi</a>
                </div>
            </li>
            <li><a href="{{ route('akademik.index') }}">AKADEMIK</a></li>
            <li class="relative group">
                <button class="flex items-center text-black transition hover:text-teal-700">
                    INFORMASI
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Dropdown Menu (Desktop) -->
                <div
                    class="absolute z-30 invisible py-2 mt-2 transition-all duration-200 translate-y-2 bg-white rounded shadow opacity-0 w-70 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">
                    <a href="{{ route('informasi.pendaftaran') }}"
                        class="block px-4 py-2 text-black hover:bg-gray-100">Pendaftaran</a>
                    <a href="{{ route('informasi.artikel.index') }}"
                        class="block px-4 py-2 text-black hover:bg-gray-100 whitespace-nowrap">Artikel
                        dan Kajian</a>
                </div>
            </li>
            <li><a href="{{ route('gallery.foto') }}">GALLERY</a></li>
            <li><a href="#">BROSUR</a></li>
            <li><a href="{{ route('faq.index') }}">FAQ</a></li>
        </ul>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition x-cloak @click.away="open = false"
        class="fixed inset-y-0 z-40 px-6 pt-24 pb-6 overflow-y-auto bg-white backdrop-blur-sm md:hidden w-[50vw] left-0 rounded-r-3xl"
        x-data="{ profilOpen: false, infoOpen: false }">
        <ul class="flex flex-col space-y-2 text-primary">
            <li>
                <a href="{{ url('/') }}"
                    class="py-2 block border-b {{ request()->is('/') ? 'text-yellow-600 font-semibold' : '' }}">
                    BERANDA
                </a>
            </li>

            <!-- PROFIL -->
            <li>
                <button @click="profilOpen = !profilOpen"
                    class="flex items-center justify-between w-full py-2 border-b focus:outline-none">
                    <span>PROFIL</span>
                    <svg :class="profilOpen ? 'rotate-90' : ''" class="w-4 h-4 transition-transform" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="profilOpen" x-collapse class="pl-4 text-sm text-gray-700">
                    <a href="{{ route('profil.sejarah') }}" class="block py-1">Sejarah</a>
                    <a href="{{ route('profil.fasilitas') }}" class="block py-1">Fasilitas</a>
                    <a href="{{ route('profil.visimisi') }}" class="block py-1">Visi & Misi</a>
                </div>
            </li>

            <li>
                <a href="{{ route('akademik.index') }}" class="block py-2 border-b">AKADEMIK</a>
            </li>

            <!-- INFORMASI -->
            <li>
                <button @click="infoOpen = !infoOpen"
                    class="flex items-center justify-between w-full py-2 border-b focus:outline-none">
                    <span>INFORMASI</span>
                    <svg :class="infoOpen ? 'rotate-90' : ''" class="w-4 h-4 transition-transform" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="infoOpen" x-collapse class="pl-4 text-sm text-gray-700">
                    <a href="{{ route('informasi.pendaftaran') }}" class="block py-1">Pendaftaran</a>
                    <a href="{{ route('informasi.artikel.index') }}" class="block py-1">Artikel dan Kajian</a>
                </div>
            </li>

            <li><a href="{{ route('gallery.foto') }}" class="block py-2 border-b">GALLERY</a></li>
            <li><a href="#" class="block py-2 border-b">BROSUR</a></li>
            <li><a href="{{ route('faq.index') }}" class="block py-2 border-b">FAQ</a></li>
        </ul>
    </div>

</nav>
