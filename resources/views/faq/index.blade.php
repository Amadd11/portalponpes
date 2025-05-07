@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Gallery"
            class="absolute inset-0 object-cover w-full h-full">
        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold md:text-5xl">FAQ</h1>
            <p class="text-sm md:text-base">
                <a href="{{ url('/') }}" class="text-yellow-400 hover:underline">Beranda</a>
                <span class="mx-2">></span>
                <span>FAQ</span>
            </p>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-12 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col gap-8 lg:flex-row">
                <!-- FAQ Section (Left) -->
                <div class="lg:w-2/3">
                    <div class="mb-12 text-center">
                        <h1 class="text-3xl font-bold text-gray-800 md:text-4xl">Frequently Asked Question</h1>
                        <div class="w-20 h-1 mx-auto mt-4 bg-blue-600 rounded"></div>
                    </div>

                    <div class="space-y-4">
                        @foreach ($faqs as $faq)
                            <div x-data="{ open: false }"
                                class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow">
                                <button @click="open = !open"
                                    class="flex items-center justify-between w-full p-6 text-left">
                                    <h3 class="text-lg font-semibold text-gray-800 md:text-xl">
                                        {{ $faq->question }}
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-gray-500 transition-transform duration-300"
                                        :class="{ 'transform rotate-180': open }" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="px-6 pb-6">
                                    <p class="text-gray-600">
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pengumuman Section (Right) -->
                <div class="lg:w-1/3">
                    <div class="p-6 bg-white shadow-lg rounded-xl">
                        <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-red-500">
                            Pengumuman
                        </h2>

                        <div class="space-y-4">
                            <!-- Pengumuman 1 -->
                            <div class="p-4 transition rounded-lg bg-gray-50 hover:bg-gray-100 group">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 p-2 mr-4 text-white bg-red-500 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 transition group-hover:text-red-600">
                                            Libur Akhir Semester
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600">
                                            Kegiatan belajar mengajar akan diliburkan mulai tanggal 10–20 Juni 2025.
                                        </p>
                                        <span class="inline-block mt-2 text-xs text-gray-500">2 hari yang lalu</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Pengumuman 2 -->
                            <div class="p-4 transition rounded-lg bg-gray-50 hover:bg-gray-100 group">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 p-2 mr-4 text-white bg-red-500 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 transition group-hover:text-red-600">
                                            Pengambilan Rapor
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600">
                                            Pengambilan rapor santri akan dilaksanakan pada Sabtu, 22 Juni 2025.
                                        </p>
                                        <span class="inline-block mt-2 text-xs text-gray-500">1 minggu yang lalu</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#"
                            class="inline-flex items-center mt-6 text-sm font-medium text-red-600 hover:text-red-800">
                            Lihat Semua Pengumuman
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
