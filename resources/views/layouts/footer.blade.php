<footer class="p-8 py-4 text-gray-300 bg-gray-800">
    <div class="container flex flex-col items-center gap-8 mx-auto lg:flex-row">
        <!-- Kiri -->
        <div class="flex flex-col w-full space-y-4 lg:w-1/2">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('assets/images/logo-yayasan.jpg') }}" alt="Logo"
                    class="object-cover w-16 h-16 rounded-full">
                <h3 class="text-2xl font-bold text-gray-300 uppercase">Yayasan Maqroah
                    <br> Imam Syatibi
                </h3>
            </div>
            {{-- Tag iframe yang duplikat telah diperbaiki --}}
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.801339089209!2d106.69411180000002!3d-6.2898223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb0053f69713%3A0xa6b2d845db002d7f!2sMAQROAH%20IMAM%20SYATIBI!5e0!3m2!1sid!2sid!4v1753795341404!5m2!1sid!2sid"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="rounded shadow"></iframe>
        </div>

        <!-- Kanan -->
        {{-- Margin atas diatur ulang untuk responsivitas --}}
        <div class="flex flex-col justify-between w-full mt-8 space-y-4 lg:w-1/2 lg:mt-0">
            <!-- Lokasi -->
            <div>
                <h4 class="mb-2 text-xl font-bold">Lokasi Sekolah</h4>
                <p><i class="mr-2 fas fa-map-marker-alt"></i>Jl. Tidore No.56 Jombang, Kec. Ciputat, Kota Tangerang
                    Selatan, Banten 15414</p>
            </div>
            <!-- Kontak -->
            <div class="mt-6">
                <h4 class="mb-2 text-xl font-bold">Kontak Kami</h4>
                <p class="flex items-center">
                    <i class="mr-2 fas fa-envelope"></i>
                    <a href="mailto:maqroahimamsyatibimaisya@gmail.com"
                        class="hover:underline">maqroahimamsyatibimaisya@gmail.com</a>
                </p>
                <p class="flex items-center mt-1">
                    <i class="mr-2 fas fa-phone"></i>
                    <!-- Nomor WhatsApp yang bisa diklik -->
                    <a href="https://wa.me/6285176709523" target="_blank" class="transition-colors hover:text-teal-600">
                        +62 851-7670-9523
                    </a>
                </p>
                <p class="flex items-center mt-1">
                    <i class="mr-2 fas fa-phone"></i>
                    <!-- Nomor WhatsApp yang bisa diklik -->
                    <a href="https://wa.me/6285807042025" target="_blank" class="transition-colors hover:text-teal-600">
                        +62 858-0704-2025
                    </a>
                </p>
            </div>

            <!-- Sosmed -->
            <div class="flex mt-4 space-x-4">
                <a href="https://www.facebook.com/share/1KQM1cR85b/"
                    class="flex items-center justify-center transition border rounded-full w-9 h-9 hover:bg-gray-700"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/madrosahibnualawadhiislamiyyah/?igsh=bnYxZGw4eTl2b3B4"
                    class="flex items-center justify-center transition border rounded-full w-9 h-9 hover:bg-gray-700"><i
                        class="fab fa-instagram"></i></a>
                <a href="https://youtube.com/@maqroahimamsyatibi?si=U1W8RlqY61tTTqEZ"
                    class="flex items-center justify-center transition border rounded-full w-9 h-9 hover:bg-gray-700"><i
                        class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="pt-8 mt-8 text-sm text-center text-gray-400 border-t border-gray-700">
        &copy; {{ date('Y') }} Yayasan Maqroah Imam Syatibi. All rights reserved.
    </div>
</footer>
