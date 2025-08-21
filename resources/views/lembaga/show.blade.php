@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-80">
        <img src="{{ Storage::url($lembaga->logo) }}" alt="Header {{ $lembaga->nama_lembaga }}"
            class="absolute inset-0 object-cover w-full h-full blur-sm">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
            <h1 class="mb-2 text-4xl font-bold tracking-tight md:text-5xl">{{ $lembaga->nama_lembaga }}</h1>
            <div class="text-sm md:text-base breadcrumbs">
                <ul>
                    <li><a href="{{ url('/') }}" class="text-amber-400 hover:underline">Beranda</a></li>
                    <li>Lembaga</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="px-4 py-12 bg-gray-50 md:px-12">
        <div class="container grid grid-cols-1 gap-12 mx-auto lg:grid-cols-3">
            <!-- Konten Utama (Kolom Kiri) -->
            <div class="p-6 bg-white rounded-lg shadow-lg lg:col-span-2 md:p-8">
                <div class="flex items-center gap-4 mb-6">
                    <img src="{{ Storage::url($lembaga->logo) }}" alt="Logo {{ $lembaga->nama_lembaga }}"
                        class="w-20 h-20 rounded-full">
                    <div>
                        <h2 class="text-2xl font-bold text-black md:text-3xl">{{ $lembaga->nama_lembaga }}</h2>
                        <p class="text-gray-600">{{ $lembaga->deskripsi }}</p>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-200">
                    <div class="text-base prose prose-lg max-w-none prose-p:text-justify prose-p:leading-relaxed">
                        {!! $lembaga->deskripsi_panjang !!}
                    </div>
                </div>
                @if ($lembaga->cabangs->isNotEmpty())
                    <div class="pt-8 mt-8 border-t border-gray-200">
                        <h3 class="mb-4 text-xl font-bold text-gray-800">Cabang Tersedia</h3>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 md:gap-10">
                            @foreach ($lembaga->cabangs as $cabang)
                                <a href="{{ route('lembaga.cabang.details', $cabang->slug) }}"
                                    class="block p-8 text-center transition-all duration-500 bg-white border-b-4 border-gray-200 shadow-lg rounded-xl hover:shadow-2xl hover:border-teal-500 hover:-translate-y-2">

                                    <div
                                        class="inline-flex items-center justify-center w-24 h-24 p-4 mx-auto bg-teal-100 rounded-full">
                                        {{-- Pastikan model Cabang Anda memiliki atribut 'logo' --}}
                                        <img src="{{ asset(Storage::url($cabang->logo)) }}" alt="Logo {{ $cabang->nama }}"
                                            class="object-contain">
                                    </div>

                                    <h4 class="mt-6 text-xl font-bold text-gray-900">{{ $cabang->nama }}</h4>

                                    {{-- Pastikan model Cabang Anda memiliki atribut 'deskripsi' atau sesuaikan --}}
                                    <p class="mt-2 text-sm text-gray-600">{{ $cabang->deskripsi }}</p>
                                </a>
                            @endforeach
                        </div>

                    </div>
                @endif
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
                                            {{ Str::limit($post->judul, 80) }}
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
