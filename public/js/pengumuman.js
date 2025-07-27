document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("posterContainer");

    // Lanjutkan hanya jika kontainer pengumuman ada di halaman ini
    if (container) {
        const announcements = container.querySelectorAll(".announcement");
        let currentIndex = 0;

        if (announcements.length > 1) {
            setInterval(() => {
                // Sembunyikan slide yang sekarang
                announcements[currentIndex].classList.remove("opacity-100");
                announcements[currentIndex].classList.add("opacity-0");

                // Pindah ke slide berikutnya
                currentIndex = (currentIndex + 1) % announcements.length;

                // Tampilkan slide berikutnya
                announcements[currentIndex].classList.remove("opacity-0");
                announcements[currentIndex].classList.add("opacity-100");
            }, 5000); // Ganti gambar setiap 5 detik
        }
    }
});
