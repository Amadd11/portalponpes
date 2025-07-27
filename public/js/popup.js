// document.addEventListener("DOMContentLoaded", function () {
//     const popup = document.getElementById("popup");
//     const closeBtn = document.getElementById("closePopup");

//     const lastShown = localStorage.getItem("popupLastShown");
//     const now = Date.now();
//     const interval = 5 * 60 * 1000; // 5 menit

//     // Tampilkan popup jika belum pernah muncul atau sudah lewat 5 menit
//     if (!lastShown || now - lastShown > interval) {
//         popup.classList.remove("hidden");
//     }

//     function closePopup() {
//         popup.classList.add("hidden");
//     }

//     // Tombol OK ditekan
//     closeBtn.addEventListener("click", function () {
//         localStorage.setItem("popupLastShown", Date.now());
//         closePopup();
//     });

//     // Klik di luar modal
//     popup.addEventListener("click", function (e) {
//         if (e.target === popup) {
//             closePopup();
//         }
//     });
// });
