document.addEventListener("DOMContentLoaded", function () {
  var menuButton = document.getElementById("menu");
  var mobileMenu = document.querySelector("mobile-menu");

  menuButton.addEventListener("click", function () {
    if (mobileMenu.style.display === "block") {
      mobileMenu.style.display = "none";
    } else {
      mobileMenu.style.display = "block";
    }
  });
});

// slider card

document.addEventListener("DOMContentLoaded", function () {
  // Ambil elemen slider
  var slider = document.querySelector(".slider-card");

  // Ambil tombol panah
  var prevBtn = slider.querySelector(".position-absolute.start-0");
  var nextBtn = slider.querySelector(".position-absolute.end-0");

  // Inisialisasi variabel untuk melacak indeks slide
  var currentSlide = 0;

  // Ambil jumlah total slide
  var totalSlides = slider.querySelectorAll(".card-fitur").length;

  // Tambahkan event listener untuk tombol panah sebelumnya
  prevBtn.addEventListener("click", function () {
    showSlide(currentSlide - 1);
  });

  // Tambahkan event listener untuk tombol panah berikutnya
  nextBtn.addEventListener("click", function () {
    showSlide(currentSlide + 1);
  });

  // Fungsi untuk menampilkan slide sesuai indeks
  function showSlide(index) {
    // Atur ulang indeks jika lebih besar dari totalSlides
    if (index >= totalSlides) {
      currentSlide = 0;
    } else if (index < 0) {
      // Atur ulang indeks jika kurang dari 0
      currentSlide = totalSlides - 1;
    } else {
      currentSlide = index;
    }

    // Hitung pergeseran (translateX) berdasarkan indeks slide
    var shiftAmount = -currentSlide * 100 + "%";

    // Terapkan pergeseran pada elemen slider
    slider.style.transform = "translateX(" + shiftAmount + ")";
  }
});

// slider card end
