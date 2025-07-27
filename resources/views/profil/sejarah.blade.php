@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Sejarah"
            class="absolute inset-0 object-cover w-full h-full">

        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold">Sejarah</h1>
            <p class="text-sm">
                <a href="{{ url('/') }}" class="text-yellow-400 hover:underline">Beranda</a>
                <span class="mx-2">></span>
                <span>Sejarah</span>
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="px-8 py-12 md:px-12 bg-gray-50">
        <div class="container grid grid-cols-1 gap-8 mx-auto md:grid-cols-3">
            <!-- Artikel Sejarah -->
            <div class="md:col-span-2">
                <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 uppercase border-l-4 border-teal-700">Sejarah</h2>

                @if ($sejarah)
                    <div class="mb-8 overflow-hidden shadow-lg rounded-xl">
                        <img src="{{ Storage::url($sejarah->gambar) }}" alt="Foto Sejarah Madrasah"
                            class="object-cover w-full h-96" loading="lazy" width="800" height="450">
                    </div>

                    <div class="prose text-gray-700 max-w-none prose-blue">
                        {!! $sejarah->isi !!}
                    </div>

                    @if ($sejarah->lampiran)
                        <div class="mt-6">
                            <a href="{{ asset(Storage::url($sejarah->lampiran)) }}" download
                                class="inline-block px-4 py-2 text-sm font-semibold text-white bg-teal-600 rounded hover:bg-teal-700">
                                Unduh Lampiran
                            </a>
                        </div>
                    @endif
                @else
                    <p class="text-gray-500">Belum ada data sejarah yang tersedia.</p>
                @endif
            </div>

            <!-- Sidebar -->
            <aside class="space-y-10">
                <!-- Pengumuman -->
                <div class="p-6 bg-white shadow-lg rounded-xl">
                    <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-red-500">Pengumuman</h2>

                    <div id="posterContainer"
                        class="relative w-full h-[400px] mx-auto overflow-hidden shadow-lg rounded-xl">
                        @foreach ($pengumumans as $index => $item)
                            <div
                                class="absolute inset-0 flex flex-col justify-start transition-opacity duration-1000 announcement
                {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
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
                                    <h3 class="text-base font-semibold leading-snug text-gray-800">
                                        {{ $item->judul }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Artikel Lainnya -->
                <div class="p-6 bg-white shadow-lg rounded-xl">
                    <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-blue-600">Artikel Lainnya</h2>
                    <div class="space-y-4">
                        @foreach ($randomPosts as $post)
                            <a href="{{ route('informasi.artikel.show', $post->slug) }}"
                                class="block p-4 transition rounded-lg bg-gray-50 hover:bg-gray-100 group">
                                <div class="flex items-start gap-4">
                                    <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->judul }}"
                                        class="object-cover w-16 h-16 rounded group-hover:opacity-80" />
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
            </aside>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/pengumuman.js') }}"></script>
@endpush
