@extends('layouts.app')

@section('content')
    <div class="bg-gray-50">
        <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">

            <!-- Header Hasil Pencarian -->
            <div class="mb-12 text-center">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 uppercase sm:text-4xl">
                    Hasil Pencarian
                </h1>
                <p class="max-w-2xl mx-auto mt-4 text-lg text-gray-600">
                    Menampilkan hasil untuk kata kunci:
                    <strong class="text-teal-700">"{{ $query }}"</strong>
                </p>
                <p class="mt-1 text-sm text-gray-500">
                    Ditemukan {{ $results->count() }} hasil yang relevan.
                </p>
            </div>

            <!-- Daftar Hasil -->
            <div class="space-y-8">
                @forelse ($results as $result)
                    <div
                        class="p-6 transition-shadow duration-300 bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-lg">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between">
                            <!-- Konten Utama -->
                            <div class="flex-grow">
                                <h2 class="text-xl font-bold text-gray-800">
                                    @if ($result instanceof \App\Models\Berita)
                                        <a href="{{ route('informasi.artikel.show', $result->slug) }}"
                                            class="hover:text-teal-700">
                                            {{ $result->judul }}
                                        </a>
                                    @elseif ($result instanceof \App\Models\Pengumuman)
                                        {{ $result->judul }}
                                    @elseif ($result instanceof \App\Models\Fasilitas)
                                        <a href="{{ route('profil.fasilitas') }}#fasilitas-{{ $result->id }}"
                                            class="hover:text-teal-700">
                                            {{ $result->nama_fasilitas }}
                                        </a>
                                    @elseif ($result instanceof \App\Models\FAQ)
                                        <a href="/#faq-section" class="hover:text-teal-700">
                                            {{ $result->question }}
                                        </a>
                                    @elseif ($result instanceof \App\Models\LembagaPendidikan)
                                        {{ $result->nama_lembaga }}
                                    @elseif ($result instanceof \App\Models\ProgramUnggulan)
                                        {{ $result->nama_program }}
                                    @endif
                                </h2>

                                <p class="mt-2 text-gray-600 line-clamp-3">
                                    @if ($result instanceof \App\Models\Berita)
                                        {{ Str::limit(strip_tags($result->isi), 150) }}
                                    @elseif ($result instanceof \App\Models\Pengumuman)
                                        {{ Str::limit(strip_tags($result->deskripsi), 150) }}
                                    @elseif ($result instanceof \App\Models\Fasilitas)
                                        {{ Str::limit(strip_tags($result->deskripsi), 150) }}
                                    @elseif ($result instanceof \App\Models\FAQ)
                                        {{ Str::limit(strip_tags($result->answer), 150) }}
                                    @elseif ($result instanceof \App\Models\LembagaPendidikan || $result instanceof \App\Models\ProgramUnggulan)
                                        {{ Str::limit(strip_tags($result->deskripsi), 150) }}
                                    @endif
                                </p>
                            </div>

                            <!-- Label Tipe -->
                            <div class="flex-shrink-0 mt-4 sm:mt-0 sm:ml-6">
                                @php
                                    $label = '';
                                    $bgColor = 'bg-gray-500';

                                    if ($result instanceof \App\Models\Berita) {
                                        $label = 'Berita';
                                        $bgColor = 'bg-teal-600';
                                    } elseif ($result instanceof \App\Models\Pengumuman) {
                                        $label = 'Pengumuman';
                                        $bgColor = 'bg-yellow-600';
                                    } elseif ($result instanceof \App\Models\Fasilitas) {
                                        $label = 'Fasilitas';
                                        $bgColor = 'bg-indigo-600';
                                    } elseif ($result instanceof \App\Models\FAQ) {
                                        $label = 'FAQ';
                                        $bgColor = 'bg-pink-600';
                                    } elseif ($result instanceof \App\Models\LembagaPendidikan) {
                                        $label = 'Lembaga';
                                        $bgColor = 'bg-purple-600';
                                    } elseif ($result instanceof \App\Models\ProgramUnggulan) {
                                        $label = 'Program';
                                        $bgColor = 'bg-emerald-600';
                                    }
                                @endphp

                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold text-white rounded-full {{ $bgColor }}">
                                    {{ $label }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Tidak Ada Hasil -->
                    <div class="py-12 text-center bg-white border border-gray-200 rounded-xl">
                        <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <h3 class="mt-4 text-xl font-semibold text-gray-800">Tidak Ada Hasil Ditemukan</h3>
                        <p class="mt-2 text-gray-500">
                            Maaf, kami tidak dapat menemukan hasil yang cocok untuk kata kunci Anda.
                        </p>
                        <a href="{{ url('/') }}"
                            class="inline-block px-6 py-2 mt-6 text-sm font-medium text-white transition bg-teal-600 rounded-full hover:bg-teal-700">
                            Kembali ke Halaman Utama
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
