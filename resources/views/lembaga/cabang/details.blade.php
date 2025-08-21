@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-80">
        <img src="{{ Storage::url($cabang->lembagaPendidikan->logo) }}" alt="Header {{ $cabang->nama }}"
            class="absolute inset-0 object-cover w-full h-full blur-sm">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center px-4 text-center text-white">
            <h1 class="mb-2 text-4xl font-bold tracking-tight md:text-5xl">{{ $cabang->nama }}</h1>
            <div class="text-sm md:text-base breadcrumbs">
                <ul>
                    <li><a href="{{ url('/') }}" class="text-amber-400 hover:underline">Beranda</a></li>
                    <li><a
                            href="{{ route('lembaga.show', $cabang->lembagaPendidikan->slug) }}">{{ $cabang->lembagaPendidikan->nama_lembaga }}</a>
                    </li>
                    <li>{{ $cabang->nama }}</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="px-4 py-12 bg-gray-50 md:px-12">
        <div class="container grid grid-cols-1 gap-12 mx-auto lg:grid-cols-3">
            <!-- Konten Utama (Kolom Kiri) -->
            <div class="p-6 bg-white rounded-lg shadow-lg lg:col-span-2 md:p-8">
                <h2 class="mb-4 text-2xl font-bold text-black md:text-3xl">{{ $cabang->nama }}</h2>
                <p class="mb-6 text-gray-600">{{ $cabang->deskripsi_singkat }}</p>

                <div class="pt-6 border-t border-gray-200">
                    <div class="prose prose-lg max-w-none prose-p:text-justify prose-p:leading-relaxed">
                        {!! $cabang->konten_lengkap !!}
                    </div>
                </div>
            </div>
            <!-- Sidebar (Kolom Kanan) -->
            <aside class="space-y-10">
                <!-- Pengumuman -->
                <div class="p-6 mt-4 bg-white shadow-lg rounded-xl">
                    <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-red-500">Pengumuman</h2>
                    <div class="space-y-4">
                        @foreach ($pengumumans as $item)
                            <a href="{{ route('pengumuman.show', $item->slug) }}"
                                class="block p-4 transition rounded-lg bg-gray-50 hover:bg-gray-100 group">
                                <div class="flex items-start gap-4">
                                    <img src="{{ asset(Storage::url($item->gambar_url)) }}" alt="{{ $item->judul }}"
                                        class="object-cover w-16 h-16 rounded group-hover:opacity-80" />
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 transition group-hover:text-red-600">
                                            {{ Str::limit($item->judul, 80) }}
                                        </h4>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ Str::limit(strip_tags($item->deskripsi), 50) }}
                                        </p>
                                        <p class="mt-1 text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($item->tanggal_publish)->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Artikel Lainnya -->
                <div class="p-6 mt-4 bg-white shadow-lg rounded-xl">
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
