@extends('layouts.app')

@section('content')
    <!-- Pop-up Brosur Pendaftaran -->
    <div id="popup" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-70">
        <div class="bg-white rounded-xl shadow-2xl w-[95%] max-w-3xl mx-4 md:mx-8 animate-fadeIn">
            <img src="{{ asset('assets/images/brosur-pendaftaran.jpg') }}" alt="Informasi Pop-up"
                class="w-full rounded-t-xl object-cover max-h-[500px]">
            <div class="p-6 space-y-4 text-center">
                <p class="text-gray-600">Silakan lihat brosur untuk informasi lengkap mengenai pendaftaran.</p>
                <button id="closePopup" class="px-6 py-2 text-white transition bg-teal-700 rounded-md hover:bg-teal-800">
                    OK
                </button>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative bg-black">
        <div class="swiper-container relative h-[570px]">
            <div class="swiper-wrapper">
                @foreach ($images as $bg)
                    <div class="relative swiper-slide">
                        <img src="{{ asset(Storage::url($bg->path)) }}" class="object-cover w-full h-[570px]"
                            alt="">
                    </div>
                @endforeach
            </div>

            <!-- Overlay -->
            <div
                class="absolute inset-0 z-10 flex flex-col items-center justify-center px-4 text-center text-white bg-black bg-opacity-50">
                <h2 class="mb-2 text-xl md:text-2xl">Selamat Datang di Official Website</h2>
                <h1 class="mb-4 text-3xl font-bold text-white uppercase md:text-5xl">Yayasan Maqroah Imam Syatibi</h1>
                <p class="mb-6 text-lg">Tangerang Selatan</p>

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

    <!-- Program Unggulan -->
    <section class="relative z-20 px-4 py-12 mt-4 bg-white">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold">
                مدرسة ابن العواضى السلمية
                <br>
                <span class="block mt-2 text-xl">
                    MADRASAH IBNUL AWADHI AL ISLAMIYYAH (MIAA)
                </span>
            </h1>
            <p class="max-w-3xl mx-auto mt-4 text-base text-gray-700">
                Adalah sekolah dengan bermanhaj Ahlussunnah Wal Jama’ah yang berlandaskan Al-Quran dan As-Sunnah dengan
                pemahaman para Salafussholeh, dibawah Yayasan Maqroah Imam Syatibi.
            </p>
        </div>

        <div class="max-w-screen-xl p-6 mx-auto bg-white shadow-lg rounded-2xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold uppercase md:text-2xl">Program Unggulan</h2>
            </div>

            <div class="flex flex-wrap justify-center gap-6">
                @foreach ($programUnggulan as $program)
                    <div
                        class="flex flex-col items-center w-[140px] px-4 py-5 border border-yellow-400 rounded-lg hover:shadow-md transition">
                        <img src="{{ asset(Storage::url($program->logo)) }}" alt="{{ $program->nama_program }}"
                            class="w-16 h-16 mb-3">
                        <span
                            class="text-sm font-semibold text-center text-primary-dark">{{ $program->nama_program }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Daftar Sekarang (dipindahkan ke bawah luar grid) -->
    @if ($gelombangAktif)
        <section class="px-4 mx-auto py-14">
            <div
                class="max-w-screen-xl p-6 mx-auto text-center shadow-xl rounded-xl bg-gradient-to-r from-yellow-100 via-orange-100 to-lime-100">
                <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-800">
                    Informasi PSB <span id="tahun_gelombang">Tahun Pelajaran 2025/2026</span>
                </h2>

                <p class="mb-6 text-lg text-gray-700">
                    Gelombang Aktif: <strong>{{ $gelombangAktif->nama_gelombang }}</strong><br>
                    Berakhir pada: <span class="font-semibold text-orange-700">
                        {{ \Carbon\Carbon::parse($gelombangAktif->tanggal_selesai)->translatedFormat('d F Y') }}
                    </span>
                </p>

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
            </div>
        </section>
    @endif

    <!-- Kata Pengantar dan Pengumuman -->
    <section class="relative z-20 px-4 py-12 bg-white">
        <div class="max-w-screen-xl p-6 mx-auto bg-white shadow-lg rounded-2xl">
            <!-- Grid 2 Kolom: Kata Pengantar & Pengumuman -->
            <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-2">
                <!-- Kata Pengantar -->
                <div>
                    <h3 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-teal-700">Kata Pengantar</h3>
                    <div class="space-y-4 text-justify text-gray-700 max-w-none">
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
                    <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-primary">
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
                                        <img src="{{ asset(Storage::url($item->gambar_url)) }}" alt="{{ $item->judul }}"
                                            class="object-cover w-full h-full transition-all duration-300 rounded-t-xl brightness-75 hover:brightness-100"
                                            style="object-position: center;">
                                    </div>
                                </a>
                                <div
                                    class="flex flex-col items-center justify-center px-4 py-3 text-center bg-white shadow-inner rounded-b-xl h-[60px]">
                                    <h3 class="text-base font-semibold leading-snug text-gray-800">{{ $item->judul }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="px-4 py-12 bg-gray-100">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="pl-4 text-2xl font-bold text-gray-800 border-l-4 border-teal-700">Berita Terbaru</h2>
                <a href="{{ route('informasi.artikel.index') }}"
                    class="text-sm font-medium text-teal-600 hover:underline hover:text-teal-800">Lihat Semua
                    Berita →</a>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($beritas as $berita)
                    <div class="overflow-hidden transition bg-white shadow-md rounded-xl hover:shadow-lg">
                        <img src="{{ asset(Storage::url($berita->thumbnail)) }}" alt="Berita 1"
                            class="object-cover w-full h-60">
                        <div class="p-4">
                            <h3 class="mb-2 text-lg font-semibold text-gray-800">{{ $berita->judul }}</h3>
                            <p class="mb-3 text-sm text-gray-600">{{ Str::limit(strip_tags($berita->isi), 150) }}</p>
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
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-800 md:text-2xl">Galeri Kami</h2>

            <div class="relative overflow-hidden">
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
                <a href="#" class="inline-flex items-center text-sm font-medium text-teal-600 hover:underline">
                    Lihat Galeri Lengkap
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section class="py-16 text-white bg-gradient-to-r from-orange-400 to-yellow-400">
        <div class="max-w-6xl px-4 mx-auto">
            <!-- Header -->
            <div class="mb-10 text-center">
                <h2 class="mb-2 text-3xl font-bold">Fasilitas</h2>
                <p class="text-xl opacity-80">Fasilitas Madrasah Ibnu Al-Awadhi Al-Islamiyah</p>
                <div class="w-16 h-1 mx-auto mt-4 bg-white rounded"></div>
            </div>

            <!-- Facilities Grid -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($fasilitas as $item)
                    <div class="overflow-hidden bg-white rounded-lg shadow-lg group">
                        <div class="relative p-3">
                            <div class="aspect-[4/3] overflow-hidden rounded-xl"> <!-- 4:3 ratio -->
                                <img src="{{ asset(Storage::url($item->gambar_url)) }}"
                                    alt="{{ $item->nama_fasilitas }}"
                                    class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
                            </div>
                        </div>

                        <div class="px-4 pb-4">
                            <h3 class="mb-1 text-base font-bold text-gray-800">
                                {{ $item->nama_fasilitas }}
                            </h3>
                            <p class="text-sm text-gray-600 line-clamp-3">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Button -->
            <div class="flex justify-center mt-10">
                <a href="#"
                    class="px-6 py-2 text-sm font-semibold text-white transition bg-teal-600 rounded-full hover:bg-teal-700">
                    Lihat Semua
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-6xl px-4 mx-auto">
            <div class="mb-10 text-center">
                <h2 class="mb-2 text-2xl font-bold text-gray-800">Pertanyaan Yang Sering Diajukan</h2>
                <p class="text-sm opacity-80">Berikut adalah beberapa pertanyaan yang sering diajukan oleh para Orang Tua
                </p>
                <div class="w-16 mx-auto mt-4 rounded bg-primary"></div>
            </div>

            <div class="space-y-4" x-data="{ openFAQ: null }">
                <!-- Pertanyaan dan Jawaban FAQ -->
                <div x-data="{ openFAQ: null }"> <!-- Menginisialisasi Alpine.js dengan openFAQ -->
                    @foreach ($faqs as $faq)
                        <div class="bg-white rounded-lg shadow-md">
                            <!-- Tombol Pertanyaan -->
                            <button @click="openFAQ = openFAQ === {{ $faq->id }} ? null : {{ $faq->id }}"
                                class="flex items-center justify-between w-full p-6 text-left">
                                <h3 class="text-lg font-semibold text-gray-800 md:text-xl">
                                    {{ $faq->question }}
                                </h3>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-500 transition-transform duration-300"
                                    :class="{ 'transform rotate-180': openFAQ === {{ $faq->id }} }" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Jawaban -->
                            <div x-show="openFAQ === {{ $faq->id }}" x-collapse
                                class="p-6 text-gray-700 rounded-b-lg bg-gray-50">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

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
