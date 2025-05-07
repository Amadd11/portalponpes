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

                <!-- Tombol-tombol ditaruh dalam flex-row -->
                <div class="flex flex-wrap justify-center gap-4 mt-10">
                    <a href="#"
                        class="px-6 py-2 text-base font-semibold text-white transition duration-300 border-2 border-yellow-600 rounded-xl hover:bg-yellow-600/30 hover:text-white">
                        Download Brosur
                    </a>
                    <a href="{{ route('informasi.pendaftaran') }}"
                        class="px-6 py-2 text-base font-semibold text-white transition duration-300 border-2 border-yellow-600 rounded-xl hover:bg-yellow-600/30 hover:text-white">
                        Informasi Pendaftaran
                    </a>
                    @if ($informasiPendaftaran)
                        <a href="{{ $informasiPendaftaran }}" target="_blank"
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

    <!-- Kata Pengantar dan Pengumuman -->
    <section class="relative z-20 px-4 py-12 bg-white">
        <div class="max-w-screen-xl p-6 mx-auto bg-white shadow-lg rounded-2xl">
            <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-2">
                <!-- Kata Pengantar -->
                <div>
                    <h3 class="mb-6 text-2xl font-bold text-center text-gray-800">Kata Pengantar</h3>
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


                <!-- Pengumuman Section with Lightbox -->
                <div class="mt-10 md:pl-6 md:mt-0">
                    <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-red-500">
                        Pengumuman
                    </h2>

                    <div id="posterContainer"
                        class="relative w-full h-[400px] mx-auto overflow-hidden shadow-lg rounded-xl">
                        @foreach ($pengumumans as $index => $item)
                            <div
                                class="absolute inset-0 flex flex-col justify-start transition-opacity duration-1000 announcement
                {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                                <!-- Lightbox anchor with fixed aspect ratio container -->
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

                <script>
                    // JavaScript untuk otomatis mengganti pengumuman
                    document.addEventListener('DOMContentLoaded', function() {
                        const items = document.querySelectorAll(".announcement");
                        if (items.length > 0) {
                            let current = 0;

                            const rotateAnnouncements = () => {
                                items[current].classList.remove("opacity-100");
                                items[current].classList.add("opacity-0");

                                current = (current + 1) % items.length;

                                items[current].classList.remove("opacity-0");
                                items[current].classList.add("opacity-100");
                            };

                            const intervalId = setInterval(rotateAnnouncements, 5000);

                            // Cleanup on component unmount
                            return () => clearInterval(intervalId);
                        }
                    });
                </script>


            </div>
        </div>
    </section>


    <!-- Berita Terbaru -->
    <section class="px-4 py-12 bg-gray-100">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800 md:text-2xl">Berita Terbaru</h2>
                <a href="#" class="text-sm font-medium text-teal-600 hover:underline hover:text-teal-800">Lihat Semua
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
                            <a href="#" class="text-sm font-medium text-teal-600 hover:underline">Baca
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
            <h2 class="mb-6 text-xl font-bold text-center text-gray-800 md:text-2xl">Galeri Kami</h2>

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

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-6xl px-4 mx-auto">
            <div class="mb-10 text-center">
                <h2 class="mb-2 text-3xl font-bold text-gray-800">Pertanyaan Yang Sering Diajukan</h2>
                <p class="text-sm opacity-80">Berikut adalah beberapa pertanyaan yang sering diajukan oleh para Orang Tua
                </p>
                <div class="w-16 mx-auto mt-4 rounded bg-primary"></div>
            </div>

            <div class="space-y-4" x-data="{ openFAQ: null }">
                @foreach ($faqs as $faq)
                    <div class="bg-white rounded-lg shadow-md">
                        <button @click="openFAQ === {{ $faq->id }} ? openFAQ = null : openFAQ = {{ $faq->id }}"
                            class="w-full px-6 py-4 text-xl font-semibold text-left text-gray-800 bg-gray-100 rounded-t-lg hover:bg-gray-200 focus:outline-none">
                            {{ $faq->question }}
                        </button>
                        <div x-show="openFAQ === {{ $faq->id }}" x-collapse
                            class="p-6 text-gray-700 rounded-b-lg bg-gray-50">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
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
