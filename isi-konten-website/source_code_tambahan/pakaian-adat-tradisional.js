// Toggle search box visibility
document.getElementById("search-icon").addEventListener("click", function(event) {
    const searchBox = document.getElementById("search-box");
    if (searchBox.style.display === "none" || searchBox.style.display === "") {
        searchBox.style.display = "flex";
        searchBox.classList.add("active"); // Tambahkan kelas aktif
    } else {
        searchBox.style.display = "none";
        searchBox.classList.remove("active"); // Hapus kelas aktif
    }
    event.stopPropagation(); // Prevent the click event from bubbling up to the document
});

// Hide search box if clicked outside
document.addEventListener("click", function(event) {
    const searchBox = document.getElementById("search-box");
    const searchIcon = document.getElementById("search-icon");
    
    // Check if the clicked element is inside the search box or search icon
    if (!searchBox.contains(event.target) && !searchIcon.contains(event.target)) {
        searchBox.style.display = "none";
        searchBox.classList.remove("active"); // Hapus kelas aktif
    }
});

let lastScrollTop = 0; // Menyimpan posisi scroll terakhir

window.addEventListener("scroll", function() {
    const navbar = document.querySelector(".navbar");
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    // Jika scroll lebih besar dari posisi scroll terakhir
    if (currentScroll > lastScrollTop) {
        // Scroll ke bawah
        navbar.classList.remove("show");
        navbar.classList.add("hide");
    } else {
        // Scroll ke atas
        navbar.classList.remove("hide");
        navbar.classList.add("show");
    }

    // Jika scroll mencapai ujung atas
    if (currentScroll === 0) {
        navbar.classList.add("at-top");
    } else {
        navbar.classList.remove("at-top");
    }
    
    // Update posisi scroll terakhir
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Untuk posisi scroll ke atas pada mobile
});



// EFEK ANIMASI PADA BAGIAN ARTIKEL

let animationApplied = false; // Menandakan apakah animasi sudah diterapkan

window.addEventListener('scroll', function() {
    const blackPage = document.querySelector('.black-page');
    const contentBox = document.querySelector('.content-box');
    const rectBlackPage = blackPage.getBoundingClientRect();

    // Cek apakah black page terlihat di viewport
    if (rectBlackPage.top <= window.innerHeight && rectBlackPage.bottom >= 0) {
        // Pastikan hanya animasi untuk black page yang dijalankan dan belum diterapkan
        if (!animationApplied) {
            contentBox.classList.add('show'); // Tambahkan kelas untuk memicu transisi
            animationApplied = true; // Tandai bahwa animasi telah diterapkan
        }
    } else {
        // Jika black page tidak terlihat, tidak melakukan apa-apa
        // Animasi tidak akan dihapus, tetap pada status 'show'
    }
});




// hamburger menu dan keperluannya
// Hamburger menu functionality
const hamburgerMenu = document.getElementById('hamburger-menu');
const menuOverlay = document.getElementById('menu-overlay');
const closeBtn = document.getElementById('close-btn');

hamburgerMenu.addEventListener('click', () => {
    menuOverlay.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    menuOverlay.style.display = 'none';
});
