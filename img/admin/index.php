<?php
require "session.php";
require "../koneksi.php"; // Added a semicolon here
$querykategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahk = mysqli_num_rows($querykategori);

$queryproduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahp = mysqli_num_rows($queryproduk);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontau/css/fontawesome.min.css">
    <link rel="stylesheet" href="../scss/_utilities.scss">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
    .kotak {
        border: solid;
    }

    .summary-box {
        background-color: #ffcccb;
        /* Warna pastel */
        border-radius: 25px;
    }

    .no-deco {
        text-decoration: none;
    }

    .container-boxes {
        display: flex;
        flex-wrap: wrap;
        /* Menambahkan flex-wrap agar kotak-kotak bisa wrap pada layar kecil */
        justify-content: space-between;
        margin-top: 20px;
    }

    .box {
        flex-basis: calc(20% - 20px);
        /* Mengatur lebar masing-masing box (20% dari lebar container - margin) */
        background-color: #ffcccb;
        /* Warna pastel */
        padding: 20px;
        border: 1px solid #ffa07a;
        /* Warna border yang serasi */
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        text-align: center;
        color: #333;
        /* Warna teks */
        transition: transform 0.2s ease-in-out;
        margin-bottom: 20px;
        /* Menambahkan margin bawah untuk memisahkan kotak-kotak */
    }

    .box:hover {
        transform: scale(1.05);
        /* Efek hover untuk memperbesar box */
    }

    .box svg {
        height: 5em;
        /* Ubah ukuran ikon sesuai kebutuhan */
        fill: #333;
        /* Warna ikon */
    }

    /* Responsifitas dengan Media Queries */
    @media (max-width: 767px) {
        .box {
            flex-basis: calc(50% - 20px);
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .box {
            flex-basis: calc(33.33% - 20px);
        }
    }

    @media (min-width: 992px) {
        .box {
            flex-basis: calc(20% - 20px);
        }
    }
    </style>
</head>

<body class="bg-dark text-white">
    <?php require "navbar.php"; ?>
    <div class="container mt-5 bg-dark text-white">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active text-white" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 576 512">
                        <!-- Ikon breadcrumb di sini -->
                    </svg>
                    Home
                </li>
            </ol>
        </nav>
        <h2>hallo admin <?php echo $_SESSION['username']; ?></h2>
        <div class="container-boxes">
            <!-- Box 1 -->
            <div class="box summary-box">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!-- Icon SVG untuk Box 1 -->
                    <path
                        d="M431.59 127.47L272 272.37V112h-32v160.37L80.41 127.47c-15.6-10.06-36.84-5.01-47.9 10.59s-5.01 36.84 10.59 47.9L240 400.37V464h32v-63.63l152.59-185.9c15.6-10.06 20.65-31.3 10.59-47.9S447.19 117.41 431.59 127.47z" />
                </svg>
                <h3 class="fs-2">Laporan</h3>
                <p class="fs-4"><?php echo $jumlahk; ?> Laporan</p>
                <p><a href="pelaporan.php" class="text-white no-deco">Lihat Detail</a></p>
            </div>

            <!-- Box 2 -->
            <div class="box summary-box">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!-- Icon SVG untuk Box 2 -->
                    <path
                        d="M431.59 127.47L272 272.37V112h-32v160.37L80.41 127.47c-15.6-10.06-36.84-5.01-47.9 10.59s-5.01 36.84 10.59 47.9L240 400.37V464h32v-63.63l152.59-185.9c15.6-10.06 20.65-31.3 10.59-47.9S447.19 117.41 431.59 127.47z" />
                </svg>
                <h3 class="fs-2">Aspirasi</h3>
                <p class="fs-4"><?php echo $jumlahk; ?> Aspirasi</p>
                <p><a href="aspirasi.php" class="text-white no-deco">Lihat Detail</a></p>
            </div>

            <!-- Box 3 -->
            <div class="box summary-box">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!-- Icon SVG untuk Box 3 -->
                    <path
                        d="M431.59 127.47L272 272.37V112h-32v160.37L80.41 127.47c-15.6-10.06-36.84-5.01-47.9 10.59s-5.01 36.84 10.59 47.9L240 400.37V464h32v-63.63l152.59-185.9c15.6-10.06 20.65-31.3 10.59-47.9S447.19 117.41 431.59 127.47z" />
                </svg>
                <h3 class="fs-2">Pertanyaan</h3>
                <p class="fs-4"><?php echo $jumlahk; ?> Pertanyaan</p>
                <p><a href="pelaporan.php" class="text-white no-deco">Lihat Detail</a></p>
            </div>

            <!-- Box 4 -->
            <div class="box summary-box">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!-- Icon SVG untuk Box 4 -->
                    <path
                        d="M431.59 127.47L272 272.37V112h-32v160.37L80.41 127.47c-15.6-10.06-36.84-5.01-47.9 10.59s-5.01 36.84 10.59 47.9L240 400.37V464h32v-63.63l152.59-185.9c15.6-10.06 20.65-31.3 10.59-47.9S447.19 117.41 431.59 127.47z" />
                </svg>
                <h3 class="fs-2">Live Chat</h3>
                <p class="fs-4"><?php echo $jumlahk; ?> Live Chat</p>
                <p><a href="https://app.crisp.chat/website/adcc5f74-a4db-4cfb-8e0d-b95e79c28daa/inbox/"
                        class="text-white no-deco">Lihat Detail</a></p>
            </div>
        </div>
    </div>

    <!-- Sisipkan skrip Bootstrap dan lainnya di sini -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>