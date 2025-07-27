@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Sejarah"
            class="absolute inset-0 object-cover w-full h-full">

        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold">FAQ</h1>
            <p class="text-sm">
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
                    <div class="container px-6 mx-auto">
                        <h2 class="pl-4 text-2xl font-bold text-gray-800 uppercase border-l-4 border-teal-700">
                            Frequently Asked Question</h2>
                        <p class="max-w-2xl pl-4 mt-1 mb-6 text-lg italic text-gray-600">
                            (Pertanyaan yang sering diajukan)
                        </p>
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
                    <div class="relative w-full max-w-3xl mx-auto mt-10">
                        <div class="p-6 mt-10 bg-white shadow-lg rounded-xl">
                            <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-teal-700">
                                Pengumuman
                            </h2>

                            <div id="posterContainer"
                                class="relative w-full h-[400px] mx-auto overflow-hidden shadow-lg rounded-xl">
                                @foreach ($pengumumans as $index => $item)
                                    <div
                                        class="absolute inset-0 flex flex-col justify-start transition-opacity duration-1000 announcement
                        {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                                        <!-- Lightbox anchor with fixed aspect ratio container -->
                                        <a href="{{ asset(Storage::url($item->gambar_url)) }}"
                                            data-lightbox="pengumuman-gallery" data-title="{{ $item->judul }}">
                                            <div class="relative w-full h-[340px] overflow-hidden">
                                                <img src="{{ asset(Storage::url($item->gambar_url)) }}"
                                                    alt="{{ $item->judul }}"
                                                    class="object-cover w-full h-full transition-all duration-300 rounded-t-xl brightness-75 hover:brightness-100"
                                                    style="object-position: center;">
                                            </div>
                                        </a>
                                        <div
                                            class="flex flex-col items-center justify-center px-4 py-3 text-center bg-white shadow-inner rounded-b-xl h-[60px]">
                                            <h3 class="text-base font-semibold leading-snug text-gray-800">
                                                {{ $item->judul }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="p-6 mt-10 bg-white shadow-lg rounded-xl">
                            <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-primary">
                                Artikel Lainnya
                            </h2>

                            <div class="space-y-4">
                                @foreach ($randomPosts as $post)
                                    <a href="{{ route('informasi.artikel.show', $post->slug) }}"
                                        class="block p-4 transition rounded-lg bg-gray-50 hover:bg-gray-100 group">
                                        <div class="flex items-start gap-4">
                                            <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->judul }}"
                                                class="object-cover w-16 h-16 rounded group-hover:opacity-80">
                                            <div class="flex-1">
                                                <h4
                                                    class="font-semibold text-gray-800 transition group-hover:text-blue-600">
                                                    {{ Str::limit($post->judul, 60) }}
                                                </h4>
                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ Str::limit(strip_tags($post->isi), 50) }}
                                                </p>
                                                <p class="mt-1 text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($post->tanggal_publish)->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
