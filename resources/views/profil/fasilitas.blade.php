@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Sejarah"
            class="absolute inset-0 object-cover w-full h-full">

        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold">Fasilitas</h1>
            <p class="text-sm">
                <a href="{{ url('/') }}" class="text-yellow-400 hover:underline">Beranda</a>
                <span class="mx-2">></span>
                <span>Fasilitas</span>
            </p>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section class="px-8 py-12 bg-gray-50">
        <div class="container px-6 mx-auto">
            <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 uppercase border-l-4 border-teal-700">Fasilitas Pondok
            </h2>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($fasilitas as $item)
                    <!-- Facility Card (Redesigned) -->
                    <div
                        class="overflow-hidden transition-all duration-300 bg-white rounded-lg shadow-md group hover:shadow-xl">
                        <!-- Image Container with zoom effect and a fixed 4:3 aspect ratio -->
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="{{ asset(Storage::url($item->gambar_url)) }}" alt="{{ $item->nama_fasilitas }}"
                                class="object-cover w-full h-full transition-transform duration-500 ease-in-out group-hover:scale-105">
                        </div>

                        <!-- Content Container with a top border for separation -->
                        <div class="p-6 border-t border-gray-100">
                            <h3 class="text-lg font-bold text-gray-800">
                                {{ $item->nama_fasilitas }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
