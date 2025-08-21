@extends('layouts.app')

@section('content')
    <section class="px-8 py-8 bg-white lg:px-10">
        <div class="grid grid-cols-1 gap-12 mx-auto max-w-8xl lg:grid-cols-3">

            <!-- Artikel Utama -->
            <div class="lg:col-span-2">

                <!-- Breadcrumb -->
                <nav class="mb-6 text-sm text-gray-500">
                    <a href="{{ route('informasi.artikel.index') }}" class="hover:text-blue-600">Artikel</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800">{{ $artikel->judul }}</span>
                </nav>

                <!-- Title -->
                <h1 class="text-2xl font-bold text-gray-900 md:text-4xl">{{ $artikel->judul }}</h1>

                <!-- Meta Info -->
                <div
                    class="flex flex-col items-start justify-between mt-4 text-sm text-gray-500 md:flex-row md:items-center">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 text-xs font-semibold text-white rounded bg-primary">
                            {{ $artikel->category->nama_category ?? 'Umum' }}
                        </span>
                        <span class="text-gray-400">•</span>
                        <span>{{ $artikel->tanggal_publish->translatedFormat('d F Y') }}</span>
                    </div>

                    <!-- Share Button -->
                    <div class="mt-4 md:mt-0">
                        <button onclick="shareArtikel()"
                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-white rounded bg-primary-dark hover:bg-blue-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 12v.01M12 12v.01M20 12v.01M6 8h.01M18 8h.01M6 16h.01M18 16h.01M12 4h.01M12 20h.01" />
                            </svg>
                            Bagikan
                        </button>
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="mt-6 overflow-hidden rounded-xl w-full max-w-[800px] mx-auto bg-gray-200"
                    style="aspect-ratio: 16 / 9;">
                    {{-- Container ini akan memiliki rasio 16:9 (800x450) --}}

                    @if ($artikel->youtube_embed_url)
                        {{-- JIKA ADA LINK YOUTUBE, TAMPILKAN IFRAME --}}
                        <iframe src="{{ $artikel->youtube_embed_url }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="w-full h-full"></iframe>
                    @elseif ($artikel->thumbnail)
                        {{-- JIKA ADA GAMBAR --}}
                        <img src="{{ Storage::url($artikel->thumbnail) }}" alt="{{ $artikel->judul }}"
                            class="object-cover w-full h-full" loading="lazy">
                    @else
                        {{-- JIKA TIDAK ADA KEDUANYA --}}
                        <div class="flex items-center justify-center w-full h-full">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Article Content -->
                <div class="mt-10 text-base prose prose-lg max-w-none prose-blue">
                    {!! $artikel->isi !!}
                </div>

                <!-- Lampiran -->
                @if ($artikel->attachments)
                    <div class="p-4 mt-10 border-l-4 border-red-500 bg-red-50">
                        <h3 class="mb-3 text-lg font-semibold text-gray-700">Lampiran:</h3>
                        <a href="{{ Storage::url($artikel->attachments) }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 002.828 2.828L18 10.828M9 9l6 6" />
                            </svg>
                            Unduh Lampiran
                        </a>
                    </div>
                @endif

                <!-- Back Button -->
                <div class="mt-12">
                    <a href="{{ route('informasi.artikel.index') }}"
                        class="inline-block px-6 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded hover:bg-gray-100">
                        ← Kembali ke Daftar Artikel
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="space-y-8">
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
                <div class="p-6 bg-white shadow-lg rounded-xl">
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
    <script src="{{ asset('js/shareArtikel.js') }}"></script>
@endpush
