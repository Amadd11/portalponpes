@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-80">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Pengumuman"
            class="absolute inset-0 object-cover w-full h-full">
        <div
            class="absolute inset-0 flex flex-col items-center justify-center px-4 text-center text-white bg-black bg-opacity-60">
            <h1 class="mb-2 text-4xl font-bold tracking-tight md:text-5xl">Pengumuman</h1>
            <div class="text-sm md:text-base breadcrumbs">
                <ul>
                    <li><a href="{{ url('/') }}" class="text-amber-400 hover:underline">Beranda</a></li>
                    <li>Pengumuman</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="px-8 py-12 bg-gray-50 md:px-8 sm:py-16">
        <div class="container mx-auto">
            <div class="flex flex-col gap-12 lg:flex-row">
                <!-- Daftar Pengumuman (Kiri) -->
                <div class="lg:w-2/3">
                    <h2 class="pl-4 mb-8 text-3xl font-bold text-gray-800 border-l-4 border-teal-700">
                        Pengumuman
                    </h2>
                    <div class="space-y-8">
                        @forelse ($pengumumans as $pengumuman)
                            <div
                                class="flex flex-col overflow-hidden transition duration-300 bg-white shadow-lg md:flex-row rounded-xl hover:shadow-xl hover:-translate-y-1">
                                <!-- Thumbnail -->
                                <div class="w-full md:w-[320px] aspect-[4/3] flex-shrink-0"> <img <a
                                        href="{{ route('pengumuman.show', $pengumuman->slug) }}">
                                    <img src="{{ Storage::url($pengumuman->gambar_url) }}" alt="{{ $pengumuman->judul }}"
                                        class="object-cover w-full h-full">
                                    </a>
                                </div>

                                <!-- Konten -->
                                <div class="flex flex-col justify-between flex-1 p-6">
                                    <div>
                                        <div class="flex items-center mb-2 text-sm text-gray-500">
                                            <span>{{ $pengumuman->created_at->translatedFormat('d F Y') }}</span>
                                        </div>
                                        <h3 class="mb-2 text-xl font-bold text-gray-800 transition hover:text-teal-700">
                                            <a
                                                href="{{ route('pengumuman.show', $pengumuman->slug) }}">{{ Str::limit($pengumuman->judul, 100) }}</a>
                                        </h3>
                                        <p class="mb-4 text-gray-600">
                                            {{ Str::limit(strip_tags($pengumuman->deskripsi), 120) }}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-end mt-auto">
                                        <a href="{{ route('pengumuman.show', $pengumuman->slug) }}"
                                            class="inline-flex items-center text-sm font-medium text-blue-800 hover:underline">
                                            Baca Selengkapnya
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center bg-white rounded-xl sm:col-span-2">
                                <p class="text-gray-500">Belum ada pengumuman yang dipublikasikan.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $pengumumans->links() }}
                    </div>
                </div>

                <!-- Sidebar (Kanan) -->
                <aside class="lg:w-1/3">
                    <!-- Artikel Lainnya -->
                    <div class="p-6 mt-4 bg-white shadow-lg rounded-xl">
                        <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-blue-600">Artikel
                            Lainnya</h2>
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
        </div>
    </section>
@endsection
