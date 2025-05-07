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

    <!-- Main Content -->
    <section class="px-12 py-12 bg-gray-50 ">
        <div class="container grid grid-cols-1 gap-8 mx-auto md:grid-cols-3">

            <!-- Informasi Pendaftaran -->
            <div class="p-8 bg-white rounded-lg shadow-lg md:col-span-2">
                <h2 class="mb-6 text-3xl font-bold text-primary">
                    Informasi Pendaftaran Santri Baru
                </h2>

                @if ($informasiPendaftaran)
                    <!-- Syarat Pendaftaran -->
                    <div class="mb-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">📌 Syarat Pendaftaran</h3>
                        <div class="prose text-gray-700 max-w-none">
                            {!! $informasiPendaftaran->syarat_pendaftaran !!}
                        </div>
                    </div>

                    <!-- Alur Pendaftaran -->
                    <div class="mb-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">🛤️ Alur Pendaftaran</h3>
                        <div class="prose text-gray-700 max-w-none">
                            {!! $informasiPendaftaran->alur_pendaftaran !!}
                        </div>
                    </div>

                    <!-- Biaya Pendaftaran -->
                    <div class="mb-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-800">💰 Biaya Pendaftaran</h3>
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


                    <!-- Tombol Daftar -->
                    @if ($informasiPendaftaran->link_pendaftaran)
                        <div class="mt-10 text-center">
                            <a href="{{ $informasiPendaftaran->link_pendaftaran }}" target="_blank"
                                class="inline-block px-6 py-3 text-white transition bg-yellow-600 rounded-lg hover:bg-yellow-700">
                                Daftar Sekarang
                            </a>
                        </div>
                    @endif
                @else
                    <p class="text-gray-500">Informasi pendaftaran belum tersedia.</p>
                @endif
            </div>



            <!-- Sidebar Kabar Pondok -->
            <aside class="space-y-6">
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-primary">Kabar Pondok</h3>
                        <a href="#"
                            class="px-3 py-1 text-sm text-white transition rounded bg-primary hover:bg-primary-dark">View
                            More</a>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h4 class="font-semibold text-gray-800 text-md">Jiwa dalam Menuntut Ilmu</h4>
                            <p class="mt-1 text-sm text-gray-600">Dalam perjalanan menuntut ilmu, adab adalah kunci utama...
                            </p>
                            <p class="mt-2 text-xs text-gray-400">Sun, 27 April 2025 | 7:53</p>
                        </div>
                        <hr>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-md">Ujian Pendidikan Kesetaraan</h4>
                            <p class="mt-1 text-sm text-gray-600">Santri mengikuti ujian dengan penuh semangat dan
                                kedisiplinan...</p>
                            <p class="mt-2 text-xs text-gray-400">Sun, 27 April 2025 | 8:00</p>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </section>
@endsection
