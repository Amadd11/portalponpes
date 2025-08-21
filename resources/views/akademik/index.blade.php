@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Sejarah"
            class="absolute inset-0 object-cover w-full h-full">

        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold">Akademik</h1>
            <p class="text-sm">
                <a href="{{ url('/') }}" class="text-yellow-400 hover:underline">Beranda</a>
                <span class="mx-2">></span>
                <span>Akademik</span>
            </p>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-12 bg-gray-50 sm:py-16">
        <div class="container max-w-4xl px-4 mx-auto">
            <!-- Deskripsi Akademik -->
            <div class="p-6 mb-12 bg-white rounded-lg shadow-lg md:p-8">
                <h2 class="mb-6 text-2xl font-bold text-gray-800 uppercase md:text-3xl">Informasi Akademik</h2>
                <div class="text-base prose prose-lg max-w-none prose-p:text-justify">
                    {!! $akademiks->deskripsi ?? 'Informasi akademik akan segera tersedia.' !!}
                </div>
            </div>

            <!-- Dokumen Akademik Section -->
            <div class="p-6 bg-white rounded-lg shadow-lg md:p-8">

                {{-- Kurikulum --}}
                <article class="pb-16 mb-8 border-b border-gray-200">
                    <h3 class="mb-2 text-2xl font-bold text-gray-800 uppercase md:text-3xl">Kurikulum</h3>
                    <p class="mb-4 text-gray-600">Dokumen resmi kurikulum yang diterapkan.</p>

                    @if ($akademiks && $akademiks->kurikulum)
                        <p class="mb-3 text-sm text-gray-500">
                            <i class="mr-2 text-red-500 fas fa-file-pdf"></i>{{ basename($akademiks->kurikulum) }}
                        </p>
                        <a href="{{ Storage::url($akademiks->kurikulum) }}" download
                            class="inline-flex items-center gap-2 px-5 py-2 text-sm font-semibold text-white bg-blue-800 rounded-full hover:bg-blue-900">
                            <i class="fas fa-download"></i> Unduh Kurikulum
                        </a>
                    @else
                        <p class="inline-block px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg">
                            Tidak tersedia
                        </p>
                    @endif
                </article>

                {{-- Kalender Akademik --}}
                <article class="pb-8 mb-8 border-b border-gray-200" x-data="{ lightboxOpen: false }">
                    <h3 class="mb-2 text-2xl font-bold text-gray-800 uppercase md:text-3xl">Kalender Akademik</h3>
                    <p class="mb-4 text-gray-600">Jadwal kegiatan akademik selama satu tahun.</p>

                    @if ($akademiks && $akademiks->kalender_akademik)
                        @php
                            $extension = pathinfo($akademiks->kalender_akademik, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'webp']);
                        @endphp

                        @if ($isImage)
                            <div class="mb-4 cursor-pointer" @click="lightboxOpen = true">
                                <img src="{{ Storage::url($akademiks->kalender_akademik) }}" alt="Kalender Akademik"
                                    class="w-full transition duration-200 border border-gray-200 rounded-lg shadow-sm hover:opacity-90">
                            </div>

                            <!-- Lightbox Modal -->
                            <div x-show="lightboxOpen" x-transition
                                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-80"
                                @click.self="lightboxOpen = false" @keydown.escape.window="lightboxOpen = false"
                                style="display: none;">
                                <button @click="lightboxOpen = false"
                                    class="absolute p-2 text-white bg-black bg-opacity-50 rounded-full top-4 right-4 hover:bg-opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <img src="{{ Storage::url($akademiks->kalender_akademik) }}"
                                    class="object-contain w-full max-w-4xl max-h-[90vh] rounded shadow-lg"
                                    alt="Kalender Akademik Fullscreen">
                            </div>
                        @else
                            <p class="mb-3 text-sm text-gray-500"><i
                                    class="mr-2 text-red-500 fas fa-file-pdf"></i>{{ basename($akademiks->kalender_akademik) }}
                            </p>
                        @endif

                        <a href="{{ Storage::url($akademiks->kalender_akademik) }}" download
                            class="inline-flex items-center gap-2 px-5 py-2 mt-2 text-sm font-semibold text-white bg-blue-800 rounded-full hover:bg-blue-900">
                            <i class="fas fa-download"></i> Unduh Kalender
                        </a>
                    @else
                        <p class="inline-block px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg">
                            Tidak tersedia
                        </p>
                    @endif
                </article>

                {{-- Peraturan Akademik --}}
                <article>
                    <h3 class="mb-2 text-2xl font-bold text-gray-800 uppercase md:text-3xl">Peraturan Akademik</h3>
                    <p class="mb-4 text-gray-600">Aturan dan ketentuan akademik yang berlaku.</p>

                    @if ($akademiks && $akademiks->peraturan_akademik)
                        <p class="mb-3 text-sm text-gray-500"><i
                                class="mr-2 text-red-500 fas fa-file-pdf"></i>{{ basename($akademiks->peraturan_akademik) }}
                        </p>
                        <a href="{{ Storage::url($akademiks->peraturan_akademik) }}" download
                            class="inline-flex items-center gap-2 px-5 py-2 text-sm font-semibold text-white bg-blue-800 rounded-full hover:bg-blue-900">
                            <i class="fas fa-download"></i> Unduh Peraturan
                        </a>
                    @else
                        <p class="inline-block px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg">
                            Tidak tersedia
                        </p>
                    @endif
                </article>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
@endsection
