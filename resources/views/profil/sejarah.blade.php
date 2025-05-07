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
    <section class="px-12 py-12 bg-gray-50 ">
        <div class="container grid grid-cols-1 gap-8 mx-auto md:grid-cols-3">

            <!-- Artikel Sejarah -->
            <div class="flex justify-center w-full md:col-span-2">
                <div class="w-full max-w-3xl">
                    <h2 class="mb-6 text-3xl font-bold text-primary">Sejarah</h2>

                    <div class="mb-6 overflow-hidden rounded-lg shadow-sm">
                        <img src="{{ asset('assets/images/pondok-sejarah.jpg') }}" alt="Sejarah"
                            class="object-cover w-full h-60 md:h-72">
                    </div>

                    <div class="space-y-4 prose text-justify text-gray-700 max-w-none">
                        <h1 class="text-2xl font-semibold">Sejarah berdirinya Madrasah Ibnul Awadhi Al Islamiyyah</h1>

                        <p>Segala puji hanya milik Allah Subhanahu wa Ta’ala, Dzat yang telah menurunkan Al-Qur’an sebagai
                            petunjuk hidup bagi manusia...</p>

                        <p>Madrasah Ibnul Awadhi Al Islamiyyah (MIAA) bermula dari sebuah niat sederhana namun penuh
                            makna...</p>

                        <p>Menanggapi antusiasme itu, sang syaikh pun membuka kelas perdana halaqah tahsin Al-Qur’an...</p>

                        <p>Dari sinilah muncul keinginan yang lebih besar: menghadirkan sebuah lembaga pendidikan...</p>

                        <p>Dengan berpegang teguh pada manhaj Ahlus Sunnah wal Jama’ah, dan berpijak pada pemahaman Salafus
                            Shalih...</p>
                    </div>
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
