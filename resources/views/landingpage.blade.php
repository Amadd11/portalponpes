@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="relative bg-black">
        <div class="swiper-container relative h-[570px]">
            <div class="swiper-wrapper">
                @foreach ($images as $bg)
                    <div class="relative swiper-slide">
                        <img src="{{ asset(Storage::url($bg->path)) }}" class="object-cover w-full h-[570px]" alt="">
                    </div>
                @endforeach
            </div>

            <!-- Overlay -->
            <div
                class="absolute inset-0 z-10 flex flex-col items-center justify-center px-4 text-center text-white bg-black bg-opacity-50">
                <h2 class="mb-2 text-xl md:text-2xl">Selamat Datang di Official Website</h2>
                <h1 class="mb-4 text-3xl font-bold text-white uppercase md:text-5xl">Yayasan Maqroah Imam Syatibi</h1>
                <p class="mb-6 text-lg">Tangerang Selatan</p>
                <!-- Search -->
                <div class="w-full max-w-md mx-auto mb-6">
                    <form action="{{ route('search') }}" method="GET" class="relative">
                        <input type="text" name="q"
                            class="w-full px-5 py-3 pr-12 text-black placeholder-gray-600 bg-white rounded-full focus:ring-2 focus:ring-yellow-500 focus:outline-none"
                            placeholder="Search......" required>
                        <button type="submit"
                            class="absolute inset-y-0 right-0 flex items-center justify-center px-4 text-white transition bg-yellow-600 rounded-r-full hover:bg-yellow-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Tombol-tombol ditaruh dalam flex-row -->
                <div class="flex flex-wrap justify-center gap-4 mt-10">
                    @if ($informasiPendaftaran->brosur_pendaftaran)
                        <a href="{{ asset('storage/' . $informasiPendaftaran->brosur_pendaftaran) }}" download
                            class="px-6 py-2 text-base font-semibold text-white transition duration-300 border-2 border-yellow-600 rounded-xl hover:bg-yellow-600/30 hover:text-white">
                            Download Brosur
                        </a>
                    @endif

                    <a href="{{ route('informasi.pendaftaran') }}"
                        class="px-6 py-2 text-base font-semibold text-white transition duration-300 border-2 border-yellow-600 rounded-xl hover:bg-yellow-600/30 hover:text-white">
                        Informasi Pendaftaran
                    </a>

                    @if ($informasiPendaftaran && $informasiPendaftaran->link_pendaftaran)
                        <a href="{{ $informasiPendaftaran->link_pendaftaran }}" target="_blank"
                            class="px-6 py-2 text-base font-semibold text-white transition duration-300 border-2 border-yellow-600 rounded-xl hover:bg-yellow-600/30 hover:text-white">
                            Daftar Sekarang
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <section class="relative z-20 px-4 py-12 mt-4 bg-white">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold md:text-3xl">
                مقرأة الإمام الشاطبي
                <br>
                <span class="block mt-2 text-2xl md:text-3xl">
                    YAYASAN MAQROAH IMAM SYATIBI
                </span>
            </h1>

            <!-- Deskripsi Yayasan -->
            <p class="max-w-3xl mx-auto mt-4 text-base text-gray-700">
                Adalah sebuah yayasan yang bergerak di bidang pendidikan Al-Quran, dakwah, dan sosial yang bernaung di atas
                manhaj Ahlussunnah Wal Jama’ah, berlandaskan Al-Quran dan As-Sunnah dengan pemahaman Salafussholeh. Adapun
                Madrasah Ibnul Awadhi adalah salah satu lembaga pendidikan formal yang berada di bawah naungan yayasan.
            </p>
        </div>
    </section>

    <!-- Bagian Pendidikan (Lembaga & Program Unggulan) -->
    <section class="py-12 bg-gradient-to-br from-teal-50 via-white to-amber-100 md:py-16">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">

            <!-- Header Utama Bagian -->
            <div class="mb-12 text-center md:mb-16">
                <h2 class="text-3xl font-bold text-teal-800 md:text-3xl">
                    Lembaga Pendidikan
                </h2>
                <div class="w-40 h-1 mx-auto mt-2 bg-primary"></div>
                <p class="max-w-3xl mx-auto mt-4 text-base text-gray-600 md:text-lg">
                    Pendidikan di Madrasah Ibnul Awadhi Al Islamiyyahh, didukung dengan program-program
                    unggulan untuk membentuk generasi Rabbani yang berakhlak mulia.
                </p>
            </div>

            <!-- Wadah untuk dua sub-bagian -->
            <div class="space-y-12 md:space-y-20">

                <!-- Sub-Bagian: Lembaga Pendidikan -->
                <div>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 md:gap-10">
                        @foreach ($lembagaPendidikan as $lembaga)
                            <!-- Kartu Lembaga -->
                            <div
                                class="p-8 text-center transition-all duration-500 bg-white border-b-4 border-gray-200 shadow-lg rounded-xl hover:shadow-2xl hover:border-teal-500 hover:-translate-y-2">
                                <!-- Logo/Icon -->
                                <div
                                    class="inline-flex items-center justify-center w-24 h-24 p-4 mx-auto bg-teal-100 rounded-full">
                                    <img src="{{ asset(Storage::url($lembaga->logo)) }}"
                                        alt="Logo {{ $lembaga->nama_lembaga }}" class="object-contain">
                                </div>
                                <h4 class="mt-6 text-xl font-bold text-gray-900">{{ $lembaga->nama_lembaga }}</h4>
                                <p class="mt-2 text-sm text-gray-600">{{ $lembaga->deskripsi }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Sub-Bagian: Program Unggulan -->
                <div>
                    <h3 class="mt-8 mb-8 text-2xl font-bold tracking-widest text-center uppercase text-amber-800 md:mb-10">
                        Program
                        Unggulan</h3>
                    <div class="flex flex-wrap justify-center gap-4 md:gap-8">
                        @foreach ($programUnggulan as $program)
                            <!-- Kartu Program -->
                            <div
                                class="flex flex-col items-center p-6 text-center transition-all duration-500 bg-white border-b-4 border-gray-200 shadow-lg w-52 rounded-xl hover:shadow-2xl hover:border-amber-500 hover:-translate-y-2">
                                <!-- Logo/Icon -->
                                <div
                                    class="inline-flex items-center justify-center w-20 h-20 p-3 rounded-full bg-amber-100">
                                    <img src="{{ asset(Storage::url($program->logo)) }}" alt="{{ $program->nama_program }}"
                                        class="object-contain">
                                </div>
                                <span
                                    class="mt-4 font-semibold text-center text-gray-800">{{ $program->nama_program }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA Daftar Sekarang (dipindahkan ke bawah luar grid) -->
    @if ($gelombangAktif)
        @php
            $now = \Carbon\Carbon::now();
            $mulai = \Carbon\Carbon::parse($gelombangAktif->tanggal_mulai);
            $selesai = \Carbon\Carbon::parse($gelombangAktif->tanggal_selesai);
        @endphp

        <section class="px-4 mx-auto py-14">
            <div
                class="max-w-screen-xl p-6 mx-auto text-center shadow-xl rounded-xl bg-gradient-to-r from-yellow-100 via-orange-100 to-lime-100">
                <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-800">
                    Informasi PSB <span id="tahun_gelombang">Tahun Pelajaran 2025/2026</span>
                </h2>

                <p class="mb-6 text-lg text-gray-700">
                    Gelombang Aktif: <strong>{{ $gelombangAktif->nama_gelombang }}</strong><br>
                    Periode: <span class="font-semibold text-orange-700">
                        {{ $mulai->translatedFormat('d F Y') }} – {{ $selesai->translatedFormat('d F Y') }}
                    </span>
                </p>

                @if ($now->lt($mulai))
                    <p class="text-lg font-semibold text-red-600">
                        Pendaftaran akan dibuka pada {{ $mulai->translatedFormat('d F Y') }}.
                    </p>
                @elseif ($now->between($mulai, $selesai))
                    <!-- Countdown -->
                    <div class="flex flex-wrap justify-center gap-4 mb-8 text-3xl font-bold text-red-600" id="countdown"
                        data-deadline="{{ $gelombangAktif->tanggal_selesai }}">
                        <div class="px-4 py-2 text-gray-800 bg-white rounded-lg shadow">
                            <span id="days">00</span><span class="ml-1 text-sm">Hari</span>
                        </div>
                        <div class="px-4 py-2 text-gray-800 bg-white rounded-lg shadow">
                            <span id="hours">00</span><span class="ml-1 text-sm">Jam</span>
                        </div>
                        <div class="px-4 py-2 text-gray-800 bg-white rounded-lg shadow">
                            <span id="minutes">00</span><span class="ml-1 text-sm">Menit</span>
                        </div>
                        <div class="px-4 py-2 text-gray-800 bg-white rounded-lg shadow">
                            <span id="seconds">00</span><span class="ml-1 text-sm">Detik</span>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ route('informasi.pendaftaran') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 text-base font-medium text-gray-800 transition-all duration-300 bg-white border rounded-full shadow hover:bg-gray-100">
                            <i class="fas fa-info-circle"></i> Lihat Informasi PSB
                        </a>

                        <a href="{{ $informasiPendaftaran }}" target="_blank"
                            class="inline-flex items-center gap-2 px-6 py-3 text-base font-medium text-white transition-all duration-300 rounded-full shadow-lg bg-gradient-to-r from-orange-400 to-yellow-400 hover:from-orange-500 hover:to-yellow-500">
                            <i class="fas fa-arrow-right"></i> Daftar Sekarang
                        </a>
                    </div>
                @else
                    <p class="text-lg font-semibold text-red-600">
                        Pendaftaran telah ditutup.
                    </p>
                    <div class="flex justify-center mt-3">
                        <a href="{{ route('informasi.pendaftaran') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 text-base font-medium text-gray-800 transition-all duration-300 bg-white border rounded-full shadow hover:bg-gray-100">
                            <i class="fas fa-info-circle"></i> Lihat Informasi PSB
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif


    <!-- Kata Pengantar dan Pengumuman -->
    <section class="relative z-20 px-4 py-12 bg-white">
        <div class="max-w-screen-xl p-6 mx-auto bg-white shadow-lg rounded-2xl md:p-6">
            <!-- Grid 2 Kolom: Kata Pengantar & Pengumuman -->
            <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-2">
                <!-- Kata Pengantar -->
                <div>
                    <h3 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-teal-700 md:text-3xl">Kata
                        Pengantar</h3>
                    <div class="space-y-4 text-justify text-gray-700 max-w-none md:text-[17px]">
                        <p class="text-center"><strong>بسم الله الرحمن الرحيم</strong></p>
                        <p>Assalamu’alaikum Warahmatullahi Wabarakatuh</p>
                        <p>Segala puji bagi Allah Subhanahu wata’ala atas berkat rahmat dan karunia-Nya kami dapat
                            meluncurkan situs web resmi <strong>Madrasah Ibnul Awadhi Al Islamiyyah (MIAA)</strong>.</p>
                        <p>Situs ini bertujuan memperkenalkan dan mempublikasikan informasi pendidikan kami agar bisa
                            diakses secara luas, cepat, dan efisien 24 jam.</p>
                        <p>Kami berkomitmen menghadirkan pendidikan yang unggul dalam Al-Qur’an, akhlak, dan kepribadian.
                            Semoga setiap langkah menjadi amal jariyah hingga hari akhir.</p>
                        <p>Mari bersama mendidik generasi Islam yang mengenal Allah, mencintai Al-Qur’an, dan bermanfaat
                            bagi umat.</p>
                        <p>Wassalamu’alaikum Warahmatullahi Wabarakatuh.</p>
                    </div>
                </div>

                <!-- Pengumuman -->
                <div class="mt-10 md:pl-6 md:mt-0">
                    <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 md:text-3xl border-primary">
                        Pengumuman
                    </h2>

                    <div id="posterContainer"
                        class="relative w-full h-[400px] mx-auto overflow-hidden shadow-lg rounded-xl">
                        @foreach ($pengumumans as $index => $item)
                            <div
                                class="absolute inset-0 flex flex-col justify-start transition-opacity duration-1000 announcement
                            {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                                <a href="{{ asset(Storage::url($item->gambar_url)) }}" data-lightbox="pengumuman-gallery"
                                    data-title="{{ $item->judul }}">
                                    <div class="relative w-full h-[340px] overflow-hidden">
                                        <img src="{{ asset(Storage::url($item->gambar_url)) }}"
                                            alt="{{ $item->judul }}"
                                            class="object-cover w-full h-full transition-all duration-300 rounded-t-xl brightness-75 hover:brightness-100"
                                            style="object-position: center;">
                                    </div>
                                </a>
                                <div
                                    class="flex flex-col items-center justify-center px-4 py-3 text-center bg-white shadow-inner rounded-b-xl h-[60px]">
                                    <h3 class="text-base font-semibold leading-snug text-gray-800">{{ $item->judul }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-12 bg-gray-100">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="pl-4 text-2xl font-bold text-gray-800 border-l-4 border-teal-700 md:text-3xl">Berita Terbaru
                </h2>
                <a href="{{ route('informasi.artikel.index') }}"
                    class="text-sm font-medium text-teal-600 hover:underline hover:text-teal-800">Lihat Semua
                    Berita →</a>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($beritas as $berita)
                    <div class="overflow-hidden transition bg-white shadow-md rounded-xl hover:shadow-lg">
                        <img src="{{ asset(Storage::url($berita->thumbnail)) }}" alt="Berita 1"
                            class="object-cover w-full h-60" width="400" height="240">
                        <div class="p-4">
                            <h3 class="mb-2 text-lg font-semibold text-gray-800">{{ $berita->judul }}</h3>
                            <p class="mb-3 text-sm text-gray-600">{{ Str::limit(strip_tags($berita->isi), 250) }}</p>
                            <a href="{{ route('informasi.artikel.show', $berita->slug) }}"
                                class="text-sm font-medium text-teal-600 hover:underline">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Auto-Scrolling Gallery -->
    <section class="px-4 py-12 bg-white">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-black">Galeri Kami</h2>
                <div class="w-32 h-1 mx-auto mt-2 bg-primary-dark"></div> <!-- Garis dekoratif yang dipusatkan -->
            </div>

            <div class="relative w-full overflow-hidden">
                <div class="absolute inset-y-0 left-0 z-10 w-12 bg-gradient-to-r from-white to-transparent"></div>
                <div class="absolute inset-y-0 right-0 z-10 w-12 bg-gradient-to-l from-white to-transparent"></div>

                <div class="inline-flex py-4 space-x-6 animate-scroll-gallery">
                    @foreach ($galleries as $gallery)
                        <div class="flex-shrink-0 w-64 h-48 overflow-hidden rounded-lg shadow-md">
                            <a href="{{ asset(Storage::url($gallery->gambar_url)) }}" data-lightbox="gallery"
                                data-title="{{ $gallery->title }}">
                                <img src="{{ asset(Storage::url($gallery->gambar_url)) }}" alt="{{ $gallery->title }}"
                                    class="object-cover w-full h-full transition duration-500 ease-in-out hover:scale-105">
                            </a>
                        </div>
                    @endforeach

                    @foreach ($galleries as $gallery)
                        <div class="flex-shrink-0 w-64 h-48 overflow-hidden rounded-lg shadow-md">
                            <a href="{{ asset(Storage::url($gallery->gambar_url)) }}" data-lightbox="gallery"
                                data-title="{{ $gallery->title }}">
                                <img src="{{ asset(Storage::url($gallery->gambar_url)) }}" alt="{{ $gallery->title }}"
                                    class="object-cover w-full h-full transition duration-500 ease-in-out hover:scale-105">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('gallery.foto') }}"
                    class="inline-flex items-center text-sm font-medium text-teal-600 hover:underline">
                    Lihat Galeri Lengkap
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Fasilitas Section - Elegant Redesign -->
    <section class="py-16 text-white bg-gradient-to-r from-amber-400 to-amber-500 sm:py-20">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-12 text-center">
                <h2 class="text-2xl font-bold tracking-tight text-black sm:text-3xl">
                    Fasilitas
                </h2>
                <p class="max-w-2xl mx-auto mt-4 text-base text-black opacity-90">
                    Kami menyediakan lingkungan belajar yang nyaman dan modern untuk mendukung proses pendidikan.
                </p>
            </div>

            <!-- Facilities Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($fasilitas as $item)
                    <!-- Facility Card -->
                    <div
                        class="overflow-hidden transition-all duration-300 bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-xl hover:-translate-y-1 group">
                        <!-- Image Container -->
                        <div class="relative aspect-[4/3]">
                            <img src="{{ asset(Storage::url($item->gambar_url)) }}" alt="{{ $item->nama_fasilitas }}"
                                class="object-cover w-full h-full">
                        </div>

                        <!-- Content Container -->
                        <div class="p-6">
                            <div class="flex items-start gap-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0 p-3 rounded-full text-amber-600 bg-amber-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <!-- Title and Description -->
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">
                                        {{ $item->nama_fasilitas }}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-3">
                                        {{ $item->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Button -->
            <div class="flex justify-center mt-16">
                <a href="{{ route('profil.fasilitas') }}"
                    class="inline-flex items-center gap-2 px-8 py-3 text-sm font-semibold text-white transition-all duration-300 bg-gray-800 rounded-full shadow-lg hover:bg-gray-900 hover:shadow-xl hover:-translate-y-0.5">
                    Lihat Semua Fasilitas
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section - Elegant Redesign -->
    <section class="py-16 bg-white sm:py-20">
        <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-12 text-center">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    Pertanyaan Yang Sering Di Ajukan
                </h2>
                <p class="max-w-2xl mx-auto mt-4 text-base text-gray-600">
                    Temukan jawaban cepat untuk pertanyaan yang paling sering diajukan mengenai pendaftaran dan program
                    kami.
                </p>
                <div class="w-24 h-1 mx-auto mt-6 bg-teal-500 rounded"></div>
            </div>

            <!-- FAQ Accordion -->
            <div class="space-y-4" x-data="{ openFAQ: 1 }"> <!-- Set the first FAQ to be open by default -->
                @foreach ($faqs as $faq)
                    <div
                        class="overflow-hidden transition-all duration-300 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <!-- Question Button -->
                        <button @click="openFAQ = openFAQ === {{ $faq->id }} ? null : {{ $faq->id }}"
                            class="flex items-center justify-between w-full p-5 text-left md:p-6 focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">
                                {{ $faq->question }}
                            </span>
                            <!-- Plus/Minus Icon -->
                            <div class="relative flex-shrink-0 w-6 h-6 ml-4">
                                <svg class="absolute inset-0 w-6 h-6 text-teal-500 transition-opacity duration-300"
                                    :class="{
                                        'opacity-0': openFAQ === {{ $faq->id }},
                                        'opacity-100': openFAQ !==
                                            {{ $faq->id }}
                                    }"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <svg class="absolute inset-0 w-6 h-6 text-teal-500 transition-opacity duration-300"
                                    :class="{
                                        'opacity-100': openFAQ === {{ $faq->id }},
                                        'opacity-0': openFAQ !==
                                            {{ $faq->id }}
                                    }"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                </svg>
                            </div>
                        </button>

                        <!-- Answer Panel -->
                        <div x-show="openFAQ === {{ $faq->id }}" x-collapse
                            class="px-5 pb-5 text-gray-700 md:px-6 md:pb-6">
                            <div class="pt-4 border-t border-gray-200">
                                <p class="leading-relaxed">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <!-- Pastikan jQuery dimuat terlebih dahulu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Kemudian tambahkan Lightbox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <!-- Skrip tambahan lainnya -->
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/pengumuman.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
    <script src="{{ asset('js/countdown.js') }}"></script>
@endpush

@push('auto-scroll-gallery')
    <style>
        @keyframes scroll-gallery {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll-gallery {
            animation: scroll-gallery 40s linear infinite;
            display: inline-flex;
            white-space: nowrap;
            will-change: transform;
        }

        .animate-scroll-gallery:hover {
            animation-play-state: paused;
        }

        /* Lightbox customizations */
        .lb-nav a.lb-prev,
        .lb-nav a.lb-next {
            opacity: 1 !important;
        }

        .lb-data .lb-close {
            margin-top: 10px;
        }

        .gallery-item a {
            display: block;
            height: 100%;
        }
    </style>
@endpush
