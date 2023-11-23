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
