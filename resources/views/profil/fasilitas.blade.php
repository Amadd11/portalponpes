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

            <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
                <!-- Card 1 -->
                @foreach ($fasilitas as $item)
                    <div class="p-6 transition bg-white rounded-lg shadow hover:shadow-lg">
                        <img src="{{ asset(Storage::url($item->gambar_url)) }}" alt="Fasilitas 1"
                            class="object-cover w-full h-40 mb-4 rounded-md">
                        <h3 class="mb-2 text-xl font-semibold text-black">{{ $item->nama_fasilitas }}</h3>
                        <p class="text-sm text-gray-600">{{ $item->deskripsi }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
