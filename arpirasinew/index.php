<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Aspirasi</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #fffbe7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            /* Hide overflow on both x and y axes */
        }

        /* ... Existing styles ... */

        /* Responsive adjustments */
        @media only screen and (max-width: 600px) {
            body {
                overflow: hidden;
                /* Enable overflow for smaller screens */
            }

            .cloud2 {
                right: -3rem;
                /* Adjust for smaller screens */
            }

            .cit-foot {
                width: 100%;
                margin-bottom: 0;
            }
        }


        /* Kontainer putih dengan bayangan */
        .container {
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
            width: 100%;
            /* Ensure the container takes full width */
            box-sizing: border-box;
            padding-bottom: 0;
            /* Remove bottom padding */
        }

        /* Gaya SVG */
        .svg-icon {
            width: 100px;
            height: 100px;
        }

        /* Gaya tombol Kirim */
        .btn-kirim {
            background-color: #ff80bf;
            border: none;
            color: #fff;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
        }

        .btn-kirim:hover {
            background-color: #ff2684;
            /* Warna tombol saat dihover */
        }

        /* Gaya notifikasi Bootstrap */
        .alert {
            display: none;
            /* Sembunyikan notifikasi awalnya */
        }

        /* Animasi fadeIn */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Cloud positioning */
        .cloud {
            position: absolute;
            top: 5%;
            left: -7rem;
            transform: translate(0%, -50%);
            z-index: 1;
        }

        .cloud2 {
            position: absolute;
            top: 5%;
            right: -7rem;
            transform: translate(-0%, -50%);
            z-index: 1;
        }

        /* Responsive adjustments */
        @media only screen and (min-width: 769px) and (max-width: 1200px) {
            .cloud {
                left: -4rem;
                /* Adjust for medium-sized screens */
            }

            .cloud2 {
                right: -4rem;
                /* Adjust for medium-sized screens */
            }
        }

        @media only screen and (max-width: 600px) {
            .cloud2 {
                right: -3rem;
                /* Adjust for smaller screens */
            }
        }

        .cit-foot {
            position: absolute;
            top: 85%;
            width: 100%;
            padding: 10px;
            text-align: center;
            margin-bottom: 0;
            /* Remove margin */
        }

        .cit-foot img {
            width: 100%;
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .cit-foot {
                width: 200%;
            }
        }
    </style>
</head>

<body>
    <div class="cloud">
        <img class="cloud" src="img/Untitled-removebg-preview.png" width="500" height="500">
    </div>
    <div class="cloud2">
        <img class="cloud2" src="img/Untitled-removebg-preview.png" width="500" height="500">
    </div>
    <div class="container">
        <!-- SVG icon -->
        <img src="../logo-removebg-preview.png" alt="Icon" class="svg-icon">
        <h2>Kirim Aspirasi</h2>
        <!-- Notifikasi Bootstrap -->
        <div class="alert alert-success" role="alert" id="notif-sukses">
            Aspirasi berhasil dikirim!
        </div>
        <form method="POST" action="proses_kirim_aspirasi.php">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Aspirasi</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Aspirasi</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-kirim">Kirim</button>
        </form>
        <!-- Elemen tambahan -->
        <footer>
            <p>&copy; 2023 Wepas</p>
        </footer>
    </div>
    <footer class="cit-foot">
        <img src="img/WhatsApp_Image_2023-11-08_at_11.21.25_1e9607eb-removebg-preview.png" alt="Footer Image">
    </footer>

    <!-- Tambahkan link ke Bootstrap JavaScript di sini (jika diperlukan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>

    <script>
        // Fungsi untuk menampilkan notifikasi sukses
        function tampilkanNotifikasiSukses() {
            const notifSukses = document.getElementById("notif-sukses");
            notifSukses.style.display = "block"; // Tampilkan notifikasi
            setTimeout(function () {
                notifSukses.style.display = "none"; // Sembunyikan notifikasi setelah beberapa detik
            }, 3000); // Tampilkan selama 3 detik (3000 ms)
        }

        // Periksa apakah terdapat parameter status=success di URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("status") === "success") {
            tampilkanNotifikasiSukses();
        }
    </script>
</body>

</html>