@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <section class="relative overflow-hidden h-96">
        <img src="{{ asset('assets/images/header-sejarah.jpg') }}" alt="Header Sejarah"
            class="absolute inset-0 object-cover w-full h-full">

        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50">
            <h1 class="mb-2 text-4xl font-bold">Visi Misi</h1>
            <p class="text-sm">
                <a href="{{ url('/') }}" class="text-yellow-400 hover:underline">Beranda</a>
                <span class="mx-2">></span>
                <span>Visi Misi</span>
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="px-4 py-12 bg-gray-50 md:px-12">
        <div class="container grid grid-cols-1 gap-12 mx-auto lg:grid-cols-3">

            <!-- Artikel Visi Misi -->
            <div class="lg:col-span-2">
                <div class="w-full p-6 bg-white rounded-lg shadow-lg md:p-8">
                    <div class="space-y-10">

                        <!-- Visi -->
                        <section>
                            <div class="flex items-center mb-4 space-x-3">
                                <svg class="w-8 h-8 text-teal-700" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 2a2 2 0 00-2 2v14l6-3 6 3V4a2 2 0 00-2-2H4z" />
                                </svg>
                                <h2 class="text-2xl font-bold text-black uppercase md:text-3xl">Visi</h2>
                            </div>
                            <div class="text-base prose prose-lg max-w-none prose-p:text-justify">
                                <p>
                                    Menjadi wadah Pendidikan danpembelajaran Al Quran dan Bahasa arab unggulan yang
                                    menghasilkan
                                    generasi Muslim yangHafal Al Quran dengan Hafalan yang mutqin,berakhlak mulia
                                    sertaMengamalkanajaran Islam sesuai dengan Al Quran dan As Sunnah dengan pemahaman para
                                    Salafussholih, sertadapat berkomunikasiBahasa arabdan Bahasa inggris dengan baik.
                                </p>
                            </div>
                        </section>

                        <!-- Misi -->
                        <section>
                            <div class="flex items-center mt-8 mb-4 space-x-3">
                                <svg class="w-8 h-8 text-teal-700" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 2a2 2 0 00-2 2v14l6-3 6 3V4a2 2 0 00-2-2H4z" />
                                </svg>
                                <h2 class="text-2xl font-bold text-black uppercase md:text-3xl">Misi</h2>
                            </div>
                            <div class="text-base prose prose-lg max-w-none prose-ol:pl-4 prose-li:text-justify">
                                <ol>
                                    <li>Memberikan pembelajaran Al-Qur’an dengan bacaan yang berstandar sanad yang diajarkan
                                        langsung oleh para masyayikh dan asatidz yang berkompeten.</li>
                                    <li>Mengembangkan kemampuan siswa dalam berbahasa Arab secara lisan maupun tulisan, yang
                                        diajarkan langsung oleh syeikh dan asatidz yang berkompeten.</li>
                                    <li>Mengembangkan kemampuan siswa dalam berbahasa Inggris secara lisan maupun tulisan,
                                        yang
                                        diajarkan langsung oleh syeikh dan asatidz yang berkompeten.</li>
                                    <li>Menyediakan lingkungan belajar yang santai namun serius dengan target–target yang
                                        harus
                                        dicapai setiap pekannya.</li>
                                    <li>Mengintegrasikan nilai–nilai Islam dalam setiap aspek pembelajaran untuk membentuk
                                        karakter
                                        yang baik.</li>
                                    <li>Menanamkan kecintaan terhadap Al-Qur’an melalui pembelajaran membaca, menghafal, dan
                                        memahami maknanya.</li>
                                    <li>Membentuk karakter peserta didik yang beradab, jujur, disiplin, dan bertanggung
                                        jawab sesuai
                                        dengan tuntunan Al-Qur’an dan Sunnah.</li>
                                    <li>Menyebarkan dakwah melalui pendidikan yang berlandaskan pada manhaj salaf.</li>
                                    <li>Menjadikan Al-Qur’an sebagai dasar utama dalam kehidupan sehari-hari peserta didik,
                                        guru,
                                        dan seluruh civitas sekolah.</li>
                                </ol>
                            </div>
                        </section>

                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="space-y-10">
                <div class="p-6 bg-white shadow-lg rounded-xl">
                    <h2 class="pl-4 mb-6 text-2xl font-bold text-gray-800 border-l-4 border-red-500">
                        Pengumuman
                    </h2>

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
