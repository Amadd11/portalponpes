document.addEventListener("DOMContentLoaded", () => {
    const countdown = document.getElementById("countdown");
    const deadlineStr = countdown.dataset.deadline;
    const deadline = new Date(deadlineStr).getTime();

    const updateCountdown = () => {
        const now = new Date().getTime();
        const distance = deadline - now;

        if (distance <= 0) {
            countdown.innerHTML =
                "<span class='text-xl font-semibold text-gray-800'>Pendaftaran telah ditutup</span>";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("days").textContent = String(days).padStart(
            2,
            "0"
        );
        document.getElementById("hours").textContent = String(hours).padStart(
            2,
            "0"
        );
        document.getElementById("minutes").textContent = String(
            minutes
        ).padStart(2, "0");
        document.getElementById("seconds").textContent = String(
            seconds
        ).padStart(2, "0");
    };

    updateCountdown(); // panggil langsung saat load
    setInterval(updateCountdown, 1000); // update tiap detik
});
