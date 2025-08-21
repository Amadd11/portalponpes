document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".announcement");
    let current = 0;

    function showSlide(index) {
        items.forEach((item, i) => {
            if (i === index) {
                item.classList.remove("opacity-0", "z-0");
                item.classList.add("opacity-100", "z-10");
            } else {
                item.classList.remove("opacity-100", "z-10");
                item.classList.add("opacity-0", "z-0");
            }
        });
    }

    setInterval(() => {
        current = (current + 1) % items.length;
        showSlide(current);
    }, 4000); // Ganti setiap 5 detik
});
