@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Gallery"
            class="absolute inset-0 object-cover w-full h-full">
        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold md:text-5xl">Brosur</h1>
            <p class="text-sm md:text-base">
                <a href="{{ url('/') }}" class="text-yellow-400 hover:underline">Beranda</a>
                <span class="mx-2">></span>
                <span>Brosur</span>
            </p>
        </div>
    </section>

    <!-- Main Content Section with Alpine.js for modal functionality -->
    <section class="py-16 bg-gray-50 sm:py-16" x-data="{ isModalOpen: false, modalImage: '' }">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                    Brosur
                </h2>
                <div class="w-24 h-1 mx-auto mt-2 bg-teal-500 rounded"></div>
            </div>

            <!-- Brochure Grid -->
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                {{-- Data dinamis dari controller --}}
                @forelse ($brosurs as $brosur)
                    <!-- Brochure Card -->
                    <div
                        class="overflow-hidden transition-all duration-300 bg-white border border-gray-200 rounded-lg shadow-md group hover:shadow-xl hover:-translate-y-1">
                        <a href="{{ Storage::url($brosur->gambar) }}" data-lightbox="brosur"
                            data-title="{{ $brosur->judul }}">
                            <div class="relative overflow-hidden aspect-[3/4]">
                                <img src="{{ Storage::url($brosur->gambar) }}" alt="{{ $brosur->judul }}"
                                    class="object-cover w-full h-full transition-transform duration-500 ease-in-out group-hover:scale-105">
                            </div>
                        </a>
                        <div class="p-5 text-center">
                            <h3 class="font-bold text-gray-800">{{ $brosur->judul }}</h3>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center bg-white border border-gray-200 rounded-lg sm:col-span-2 lg:col-span-3">
                        <p class="text-gray-600">Belum ada brosur yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

        </div>

        <!-- Modal for Image Preview -->
        <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-80" style="display: none;">

            <!-- Modal Content -->
            <div @click.away="isModalOpen = false" class="relative w-full max-w-4xl max-h-full">
                <img :src="modalImage" alt="Brosur Detail"
                    class="object-contain w-full h-auto max-h-[90vh] rounded-lg shadow-2xl">

                <!-- Close Button -->
                <button @click="isModalOpen = false"
                    class="absolute flex items-center justify-center w-10 h-10 text-white bg-gray-800 rounded-full -top-4 -right-4 hover:bg-red-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" />
@endpush
