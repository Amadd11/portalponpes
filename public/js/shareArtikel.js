function shareArtikel() {
    if (navigator.share) {
        navigator
            .share({
                title: "{{ $artikel->judul }}",
                url: window.location.href,
            })
            .catch(console.error);
    } else {
        alert("Fitur bagikan tidak didukung di browser ini.");
    }
}
