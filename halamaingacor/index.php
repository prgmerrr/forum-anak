<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.21.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap"
        rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
    /* Custom Styles */
    /* navbar */
    .header {
        position: absolute;
        width: 100%;
        z-index: 1000;

    }





    /* Custom Styles */
    .sec1 {
        position: relative;
        z-index: 2;
    }

    body {

        scroll-behavior: smooth;
        position: relative;
    }

    /* Adjust padding for the header */

    /* Adjust the logo and other styles as needed */
    .logo a {
        color: #c61a1a;
        /* Change text color */
    }

    .navbar-nav {
        background-color: #fef8f5;
    }

    .navbar-nav a {
        font-size: 18px;
        font-weight: bold;
        font-family: "Open Sans", sans-serif;
        text-decoration: none;
        color: #000;

    }

    /* Adjust the hover color for the navbar links */
    .navbar-nav a:hover {
        border-color: #ffeeaf;
        background-color: #ffeeaf;
        color: #000;
        }

    .navbar-nav a {
        border: 2px solid transparent;
        padding: 3px;
        border-radius: 10px;
        margin: 0 0 0 0;
        transition: 0.3s;
    }

    /* SEARCH FORM */
    #search-form {
        position: relative;
        margin: -0.4rem 0 0 0;
    }

    /* Adjust other styles as needed */



    .img-fluid {
        max-width: 100%;
        /* Make the image responsive */
        height: auto;
    }

    body {

        scroll-behavior: smooth;
        position: relative;
    }


    /* Set a fixed height for the carousel on larger screens */


    .sec1 {
        background-image: url("img/paperbg.png");
        /* Add other background properties as needed */
        background-size: cover;
        /* Adjust as needed */
        background-position: center;
        /* Adjust as needed */
        background-repeat: no-repeat;
        /* Adjust as needed */
    }


    .footer a {
        color: #323232;
        text-decoration: none;
    }

    .footer {
        background-color: #FFF3C4;
        padding: 20px 0;
        color: #323232;
        text-decoration: none;
    }

    .judul-1 {
        color: #ffd25e;
        font-family: "Open Sans", sans-serif;
        font-weight: bold;
        text-shadow: 2px 2px 4px #805c00;
        /* Adjust values for the shadow effect */
    }

    .text-1 {
        color: #7f0500;
        font-family: "open sans", sans-serif;
        text-shadow: 2px 2px 6px #000000c7;
    }

    .judul-2 {
        color: #ffd25e;
        font-family: "Open Sans", sans-serif;
        font-weight: bold;
        text-shadow: 2px 2px 4px #805c00;
        /* Adjust values for the shadow effect */
    }

    .text-2 {
        color: #7f0500;
        font-family: "open sans", sans-serif;
        text-shadow: 2px 2px 6px #000000c7;
    }

    .logo {
        display: flex;
        align-items: center;
        margin: 10px 0 0 0px;
    }

    .logo a {
        text-decoration: none;
        display: flex;
        align-items: center;
        color: #fdce20;
    }

    .logo-foranggis {
        width: 60px;
        height: auto;
        margin-left: 30px;
    }


    .navbar-toggler-icon {
        background-color: #fdce20;
        color: #22668d;
    }

    .navbar-toggler-icon {
        background-color: #fef8f5;
    }

    .logo {
        width: 90px;
        height: 80px;
    }

    nav.navbar {
        background-color: #fef8f5;
    }
    </style>
    <title>Nibiru</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top " style=" z-index: 1000;">
        <div class="container-fluid">
            <a class="navbar-brand ms-4" href="#">
                <img src="img/logo-foranggis.png" alt="Logo" width="50" height="44" class="" />
                <b style="color: #fdce20"> Foranggis</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ms-auto =mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Event</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Fitur
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Nibiru</a></li>
                            <li><a class="dropdown-item" href="#">Laporan</a></li>
                            <li><a class="dropdown-item" href="#">Sofo</a></li>
                            <li><a class="dropdown-item" href="#">Aspirasi</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <style>
    #hero {
        width: 100%;
        height: 70vh;

        background: url('img/paperbg.png') center/cover no-repeat;
        /* Use the correct path to your image */

        border-bottom: 2px solid #fcebe3;
        margin: 0;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #4e4039;
    }

    #hero h1 {
        font-size: 48px;
        font-weight: 700;
        line-height: 56px;
        margin: 0;
        color: inherit;
    }

    #hero h2 {
        color: #a08f86;
        margin: 15px 0 0 0;
        font-size: 24px;
    }

    #hero .btn-get-started {
        font-family: "Raleway", sans-serif;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 8px 28px;
        border-radius: 5px;
        transition: 0.9s;
        margin-top: 30px;
        color: #000;
        background: #ffeeaf;
    }

    #hero .btn-get-started:hover {
        background: #fae598;
        border-radius: 20px;

    }

    @media (max-width: 991px) {
        #hero {
            height: calc(100vh - 72px);
        }

        #hero h1 {
            font-size: 28px;
            line-height: 36px;
        }

        #hero h2 {
            font-size: 18px;
            line-height: 24px;
        }
    }

    @media (max-width: 768px) {
        #hero h1 {
            font-size: 28px;
            line-height: 36px;
        }

        #hero h2 {
            font-size: 18px;
            line-height: 24px;
        }
    }

    @media (max-width: 575px) {
        #hero h1 {
            font-size: 24px;
            line-height: 32px;
        }

        #hero h2 {
            font-size: 16px;
            line-height: 22px;
        }
    }
    </style>
<section id="hero" class="d-flex align-items-center">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/w/1.png" class="mt-5 d-block w-100" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="images/w/2.png" class="mt-5 d-block w-100" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="images/w/3.png" class="mt-5 d-block w-100" alt="Image 3">
                </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <!-- <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Bettter digital experience with webpas</h1>
                    <h2 style="color: #fdce20;">
                        We are team of talented designers making websites with webpas
                    </h2>
                    <div>
              <a href="#about" class="btn-get-started scrollto">Get Started</a>
              <button class="button" id="prevHeroBackgroundButton">
                Previous
              </button>
              <button class="button" id="nextHeroBackgroundButton">Next</button>
            </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="img/3.png" class="img-fluid animated" alt="" />
                </div>
            </div>
        </div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-4p9nVTCAXqWV9u3hZz4XrdoqseQEG5E4hEtFj+6r4H4ztc1fzEJQtkxyKkAbcF3F" crossorigin="anonymous">
        </script>
        <script>
        var currentHeroBackground = 0;
        var heroBackgroundImages = [
            "Gorgosaurus_BW_transparent.png",
            "00.png",
            "jarap.png",
        ];

        function preloadImages() {
            for (var i = 0; i < heroBackgroundImages.length; i++) {
                var img = new Image();
                img.src = heroBackgroundImages[i];
            }
        }

        function changeHeroBackground() {
            var newHeroBackground = heroBackgroundImages[currentHeroBackground];
            document.getElementById("hero").style.backgroundImage =
                "url(" + newHeroBackground + ")";
        }

        // Preload gambar sebelum tampilan pertama
        preloadImages();

        // Tampilkan gambar pertama saat web dibuka
        changeHeroBackground();

        // Tombol "Next"
        var nextHeroBackgroundButton = document.getElementById(
            "nextHeroBackgroundButton"
        );
        nextHeroBackgroundButton.addEventListener("click", function() {
            currentHeroBackground =
                (currentHeroBackground + 1) % heroBackgroundImages.length;
            changeHeroBackground();
        });

        // Tombol "Previous"
        var prevHeroBackgroundButton = document.getElementById(
            "prevHeroBackgroundButton"
        );
        prevHeroBackgroundButton.addEventListener("click", function() {
            currentHeroBackground =
                (currentHeroBackground - 1 + heroBackgroundImages.length) %
                heroBackgroundImages.length;
            changeHeroBackground();
        });
        </script>
    </section>



    </section>
    <!-- End Hero -->
    <section>
        <?php
        require_once "index copy.html";
        ?>
    </section>
    <?php
    require_once "slider.php";
    ?>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>FORANGGIS</h5>
                    <p>Kolaborasi, Aspirasi, Kreasi.</p>
                </div>
                <div class="col-md-6">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Event</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h5>Follow Us</h5>
                    <!-- Add your social media icons or links here -->
                    <a href="#" class="me-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg></a>
                    <a href="#" class="me-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg></a>
                    <a href="#" class="me-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg></a>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; Foranggis 2024 Desain by WEBPASS</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
