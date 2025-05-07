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
    <section class="px-12 py-12 bg-gray-50">
        <div class="container grid grid-cols-1 gap-8 mx-auto md:grid-cols-3">

            <!-- Artikel Misi -->
            <div class="flex justify-center md:col-span-2">
                <div class="w-full max-w-3xl space-y-8">

                    <!-- Visi -->
                    <section>
                        <div class="flex items-center mb-4 space-x-2">
                            <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 2a2 2 0 00-2 2v14l6-3 6 3V4a2 2 0 00-2-2H4z" />
                            </svg>
                            <h2 class="text-xl font-bold uppercase text-primary">Visi</h2>
                        </div>
                        <p class="leading-relaxed text-gray-700">
                            Menjadi wadah Pendidikan danpembelajaran Al Quran dan Bahasa arab unggulan yang menghasilkan
                            generasi Muslim yangHafal Al Quran dengan Hafalan yang mutqin,berakhlak mulia
                            sertaMengamalkanajaran Islam sesuai dengan Al Quran dan As Sunnah dengan pemahaman para
                            Salafussholih, sertadapat berkomunikasiBahasa arabdan Bahasa inggris dengan baik.
                        </p>
                    </section>

                    <!-- Misi -->
                    <section>
                        <div class="flex items-center mb-4 space-x-2">
                            <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 2a2 2 0 00-2 2v14l6-3 6 3V4a2 2 0 00-2-2H4z" />
                            </svg>
                            <h2 class="text-xl font-bold uppercase text-primary">Misi</h2>
                        </div>
                        <ol class="space-y-2 leading-relaxed text-gray-700 list-decimal list-inside">
                            <li>Memberikan pembelajaran Al-Qur’an dengan bacaan yang berstandar sanad yang diajarkan
                                langsung oleh para masyayikh dan asatidz yang berkompeten.</li>
                            <li>Mengembangkan kemampuan siswa dalam berbahasa Arab secara lisan maupun tulisan, yang
                                diajarkan langsung oleh syeikh dan asatidz yang berkompeten.</li>
                            <li>Mengembangkan kemampuan siswa dalam berbahasa Inggris secara lisan maupun tulisan, yang
                                diajarkan langsung oleh syeikh dan asatidz yang berkompeten.</li>
                            <li>Menyediakan lingkungan belajar yang santai namun serius dengan target–target yang harus
                                dicapai setiap pekannya.</li>
                            <li>Mengintegrasikan nilai–nilai Islam dalam setiap aspek pembelajaran untuk membentuk karakter
                                yang baik.</li>
                            <li>Menanamkan kecintaan terhadap Al-Qur’an melalui pembelajaran membaca, menghafal, dan
                                memahami maknanya.</li>
                            <li>Membentuk karakter peserta didik yang beradab, jujur, disiplin, dan bertanggung jawab sesuai
                                dengan tuntunan Al-Qur’an dan Sunnah.</li>
                            <li>Menyebarkan dakwah melalui pendidikan yang berlandaskan pada manhaj salaf.</li>
                            <li>Menjadikan Al-Qur’an sebagai dasar utama dalam kehidupan sehari-hari peserta didik, guru,
                                dan seluruh civitas sekolah.</li>
                        </ol>
                    </section>

                </div>
            </div>

            <!-- Sidebar Kabar Pondok -->
            <aside class="space-y-6">
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-primary">Kabar Pondok</h3>
                        <a href="#"
                            class="px-3 py-1 text-sm text-white transition rounded bg-primary hover:bg-primary-dark">View
                            More</a>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <h4 class="font-semibold text-gray-800 text-md">Jiwa dalam Menuntut Ilmu</h4>
                            <p class="mt-1 text-sm text-gray-600">Dalam perjalanan menuntut ilmu, adab adalah kunci utama...
                            </p>
                            <p class="mt-2 text-xs text-gray-400">Sun, 27 April 2025 | 7:53</p>
                        </div>
                        <hr>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-md">Ujian Pendidikan Kesetaraan</h4>
                            <p class="mt-1 text-sm text-gray-600">Santri mengikuti ujian dengan penuh semangat dan
                                kedisiplinan...</p>
                            <p class="mt-2 text-xs text-gray-400">Sun, 27 April 2025 | 8:00</p>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </section>
@endsection
