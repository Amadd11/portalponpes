<footer class="p-8 py-4 text-gray-300 bg-gray-800">
    <div class="container flex flex-col items-center gap-8 mx-auto lg:flex-row">
        <!-- Kiri -->
        <div class="flex flex-col space-y-4 lg:w-1/2">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('assets/images/logo-ponpes.png') }}" alt="Logo SLB" class="w-20 h-20">
                <h3 class="text-2xl font-bold text-gray-300">Yayasan Maqroah Imam Syatibi
                    <br>
                </h3>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d509933.8502318125!2d101.6359573890625!3d-3.132149499999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e317a71a59da9c3%3A0xf273836985d4a7e8!2sSLB%20N%20Lebong!5e0!3m2!1sid!2sid!4v1742559839922!5m2!1sid!2sid"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="rounded shadow"></iframe>
        </div>

        <!-- Kanan -->
        <div class="flex flex-col justify-between space-y-4 lg:w-1/2 mt-15">
            <!-- Lokasi -->
            <div>
                <h4 class="mb-2 text-xl font-bold">Lokasi Sekolah</h4>
                <p><i class="mr-2 fas fa-map-marker-alt"></i>Jl. Tidore No.56 Jombang, Kec. Ciputat, Kota Tangerang
                    Selatan, Banten 15414</p>
            </div>
            <!-- Kontak -->
            <div class="mt-6">
                <h4 class="mb-2 text-xl font-bold">Kontak Kami</h4>
                <p><i class="mr-2 fas fa-envelope"></i> maqroahimamsyatibi@gmail.com</p>
                <p><i class="mr-2 fas fa-phone"></i> 0842 815131</p>
            </div>

            <!-- Sosmed -->
            <div class="flex mt-4 space-x-4">
                <a href="#"
                    class="flex items-center justify-center transition border rounded-full w-9 h-9 hover:bg-gray-700"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="#"
                    class="flex items-center justify-center transition border rounded-full w-9 h-9 hover:bg-gray-700"><i
                        class="fab fa-instagram"></i></a>
                <a href="#"
                    class="flex items-center justify-center transition border rounded-full w-9 h-9 hover:bg-gray-700"><i
                        class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="mt-8 text-sm text-center text-gray-400">
        &copy; {{ date('Y') }} Yayasan Maqroah Imam Syatibi. All rights reserved.
    </div>
</footer>
