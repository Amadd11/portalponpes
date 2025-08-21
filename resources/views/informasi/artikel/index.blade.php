@extends('layouts.app')

@section('content')
    <!-- Main Content Section -->
    <section class="px-8 py-12 bg-gray-50 md:px-8 sm:py-16">
        <div class="container mx-auto">
            <div class="flex flex-col gap-12 lg:flex-row">
                <!-- Artikel Section (Left) -->
                <div class="lg:w-2/3">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="pl-4 text-2xl font-bold text-gray-800 border-l-4 border-teal-700 md:text-3xl">
                            Artikel & Kajian Terbaru
                        </h2>
                    </div>

                    <div class="flex flex-col gap-8">
                        @forelse ($artikels as $artikel)
                            <div
                                class="flex flex-col overflow-hidden transition duration-300 bg-white shadow-lg md:flex-row rounded-xl hover:shadow-xl hover:-translate-y-1">
                                <!-- Thumbnail -->
                                <div class="w-full md:w-[320px] aspect-[4/3] flex-shrink-0">
                                    @if ($artikel->youtube_embed_url)
                                        {{-- JIKA ADA LINK YOUTUBE, TAMPILKAN IFRAME --}}
                                        <iframe src="{{ $artikel->youtube_embed_url }}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen class="w-full h-full"></iframe>
                                    @elseif ($artikel->thumbnail)
                                        {{-- JIKA TIDAK ADA VIDEO TAPI ADA GAMBAR, TAMPILKAN GAMBAR --}}
                                        <a href="{{ route('informasi.artikel.index', $artikel->slug) }}">
                                            <img class="object-cover w-full h-full"
                                                src="{{ asset(Storage::url($artikel->thumbnail)) }}"
                                                alt="Thumbnail untuk {{ $artikel->judul }}">
                                        </a>
                                    @else
                                        {{-- JIKA TIDAK ADA KEDUANYA, TAMPILKAN PLACEHOLDER --}}
                                        <a href="{{ route('informasi.artikel.index', $artikel->slug) }}"
                                            class="flex items-center justify-center w-full h-full bg-gray-200">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </a>
                                    @endif
                                </div>

                                <!-- Konten -->
                                <div class="flex flex-col justify-between flex-1 p-6">
                                    <div>
                                        <div class="flex items-center mb-2 text-sm text-gray-500">
                                            <span class="mx-2">•</span>
                                            <span>{{ $artikel->tanggal_publish->translatedFormat('d F Y') }}</span>
                                        </div>
                                        <h3 class="mb-2 text-xl font-bold text-gray-800 transition hover:text-blue-800">
                                            <a
                                                href="{{ route('informasi.artikel.show', $artikel->slug) }}">{{ Str::limit($artikel->judul, 100) }}</a>
                                        </h3>
                                        <p class="mb-4 text-gray-600">
                                            {{ Str::limit(strip_tags($artikel->isi), 200) }}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-between mt-auto">
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold text-white bg-teal-700 rounded">
                                            {{ $artikel->category->nama_category ?? 'Umum' }}
                                        </span>
                                        <a href="{{ route('informasi.artikel.show', $artikel->slug) }}"
                                            class="inline-flex items-center text-sm font-medium text-blue-800 hover:text-blue-800">
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
                            <div class="p-8 text-center bg-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="mt-4 text-gray-500">Belum ada artikel tersedia.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10">
                        {{ $artikels->links() }}
                    </div>
                </div>


                <!-- Sidebar Section (Right) -->
                <div class="lg:w-1/3">
                    <div class="p-4 mb-8 bg-white rounded-lg shadow-lg">
                        <form method="GET" action="{{ route('informasi.artikel.index') }}" class="space-y-4">
                            <!-- Filter by Category -->
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                <select id="kategori" name="kategori"
                                    class="block w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('kategori') == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Search by Title -->
                            <div>
                                <label for="q" class="block text-sm font-medium text-gray-700">Pencarian</label>
                                <input type="text" id="q" name="q" value="{{ request('q') }}"
                                    class="block w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary"
                                    placeholder="Cari artikel...">
                            </div>

                            <!-- Filter Button -->
                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full px-6 py-2 text-white bg-teal-700 rounded-lg hover:bg-teal-800 focus:outline-none">
                                    Cari
                                </button>
                            </div>
                        </form>
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
                                            <img src="{{ asset(Storage::url($item->gambar_url)) }}"
                                                alt="{{ $item->judul }}"
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
                                                <h4
                                                    class="font-semibold text-gray-800 transition group-hover:text-blue-600">
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
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/pengumuman.js') }}"></script>
@endpush
