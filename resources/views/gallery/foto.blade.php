@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Gallery"
            class="absolute inset-0 object-cover w-full h-full">
        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold md:text-5xl">Gallery</h1>
            <p class="text-sm md:text-base">
                <a href="{{ url('/') }}" class="text-yellow-400 hover:underline">Beranda</a>
                <span class="mx-2">></span>
                <span>Gallery</span>
            </p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="px-6 py-16 bg-gray-50">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4" id="gallery-grid">
                @forelse($galeris as $galeri)
                    <div
                        class="overflow-hidden transition duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <div class="relative group">
                            <img src="{{ Storage::url($galeri->gambar_url) }}" alt="{{ $galeri->judul }}"
                                class="object-cover w-full h-64 transition duration-300 group-hover:opacity-90">
                            <div
                                class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 bg-black opacity-0 bg-opacity-60 group-hover:opacity-100">
                                <a href="{{ Storage::url($galeri->gambar_url) }}"
                                    class="p-3 text-white transition duration-300 bg-blue-600 rounded-full hover:bg-blue-700"
                                    data-lightbox="gallery" data-title="{{ $galeri->judul }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 10V7m0 3h3m-3 3v3m0-3H7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="mb-2 text-lg font-semibold text-gray-800">{{ $galeri->judul }}</h3>
                            <p class="text-gray-600">{{ $galeri->deskripsi }}</p>
                        </div>
                    </div>
                @empty
                    <div class="py-12 text-center col-span-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h3 class="mt-4 text-xl font-medium text-gray-900">Belum ada galeri tersedia</h3>
                        <p class="mt-1 text-gray-500">Silakan kembali lagi nanti</p>
                    </div>
                @endforelse
            </div>

            @if ($galeris->hasPages())
                <div class="mt-12">
                    {{ $galeris->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection



@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" />
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true,
                'albumLabel': 'Gambar %1 dari %2',
                'disableScrolling': true
            });
        });
    </script>
@endpush
