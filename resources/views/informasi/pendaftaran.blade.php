@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Informasi Pendaftaran"
            class="absolute inset-0 object-cover w-full h-full">
        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold">Informasi Pendaftaran</h1>
            <p class="text-sm">
                <a href="{{ url('/') }}" class="text-yellow-400 hover:underline">Beranda</a>
                <span class="mx-2">></span>
                <span>Informasi Pendaftaran</span>
            </p>
        </div>
    </section>

    <!-- Masa Pendaftaran Section -->
    <section class="px-12 py-12 bg-white">
        <h2 class="text-3xl font-bold text-center text-gray-800">Masa Pendaftaran T.P. 2025/2026</h2>
        <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-3">
            @foreach ($gelombangs as $item)
                <div class="flex flex-col items-center justify-center p-6 text-white bg-blue-900 shadow-lg rounded-xl">
                    <div class="text-4xl">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-yellow-600">{{ $item->nama_gelombang }}</h3>
                    <p class="text-center">
                        {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('j F') }} -
                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('j F Y') }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>





    <!-- Main Content -->
    <section class="px-12 py-12 bg-gray-50 ">
        <div class="container grid grid-cols-1 gap-8 mx-auto md:grid-cols-3">

            <!-- Informasi Pendaftaran -->
            <div class="p-8 bg-white rounded-lg shadow-lg md:col-span-2">
                <h2 class="mb-6 text-3xl font-bold text-black">
                    Informasi Pendaftaran Santri Baru
                </h2>

                @if ($informasiPendaftaran)
                    <!-- Syarat Pendaftaran -->
                    <div class="mb-3">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">📌 Syarat Pendaftaran</h3>
                        <div class="prose text-gray-700 max-w-none">
                            {!! $informasiPendaftaran->syarat_pendaftaran !!}
                        </div>
                    </div>

                    <!-- Alur Pendaftaran -->
                    <div class="mb-3">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">Alur Pendaftaran</h3>
                        <div class="prose text-gray-700 max-w-none">
                            {!! $informasiPendaftaran->alur_pendaftaran !!}
                        </div>
                    </div>

                    <!-- Biaya Pendaftaran -->
                    <div class="mb-3">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">Biaya Pendaftaran</h3>
                        <div class="prose text-gray-700 max-w-none">
                            {!! $informasiPendaftaran->biaya_pendaftaran !!}
                        </div>
                    </div>

                    <!-- Lampiran -->
                    @if ($informasiPendaftaran->lampiran)
                        <div class="mb-6">
                            <ul class="space-y-2 list-none">
                                <li>
                                    <a href="{{ Storage::url($informasiPendaftaran->lampiran) }}" target="_blank"
                                        class="flex items-center space-x-2 text-blue-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span>{{ basename($informasiPendaftaran->lampiran) }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif

                    @if ($informasiPendaftaran->link_pendaftaran)
                        <div class="px-4 mx-auto">
                            <div
                                class="p-6 text-center shadow-md rounded-xl bg-gradient-to-br from-orange-100 via-yellow-100 to-lime-100">
                                <h2 class="text-2xl font-extrabold tracking-tight text-gray-800">
                                    Siap Menjadi Santri?
                                </h2>
                                <p class="mt-3 text-base text-gray-800">
                                    Daftarkan dirimu sekarang dan bergabung bersama keluarga besar
                                    <span class="font-semibold text-orange-600">Maqroah Imam Syatibi</span>.
                                </p>
                                <a href="{{ $informasiPendaftaran->link_pendaftaran }}"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 mt-6 text-sm font-medium text-white transition-all duration-300 rounded-full shadow bg-gradient-to-r from-orange-400 to-yellow-400 hover:from-orange-500 hover:to-yellow-500">
                                    <i class="fas fa-arrow-right"></i>
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    @endif
                @else
                    <p class="text-gray-500">Pendaftaran Belum Dibuka</p>
                @endif
            </div>



            <!-- Sidebar Kabar Pondok -->
            <aside class="space-y-6">
                <div class="relative w-full max-w-3xl mx-auto ">
                    <div class="p-6 bg-white shadow-lg rounded-xl">
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
                        <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-blue-600">
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
                                            <h4 class="font-semibold text-gray-800 transition group-hover:text-blue-600">
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
            </aside>

        </div>
    </section>
@endsection
