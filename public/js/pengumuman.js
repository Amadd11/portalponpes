document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".announcement");
    if (items.length > 0) {
        let current = 0;

        const rotateAnnouncements = () => {
            items[current].classList.remove("opacity-100");
            items[current].classList.add("opacity-0");

            current = (current + 1) % items.length;

            items[current].classList.remove("opacity-0");
            items[current].classList.add("opacity-100");
        };

        const intervalId = setInterval(rotateAnnouncements, 5000);

        // Cleanup on component unmount
        return () => clearInterval(intervalId);
    }
});
