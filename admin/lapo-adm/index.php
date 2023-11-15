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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</head>
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #111;
        color: #fff;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #222;
        border: 1px solid #333;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h1 {
        color: #ff69b4;
        font-size: 32px;
        margin-bottom: 20px;
        text-align: center;
    }

    .laporan-list {
        margin-top: 20px;
        text-align: left;
    }

    .laporan-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .laporan {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #444;
        border-radius: 10px;
        background-color: #333;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease-in-out;
        text-align: left;
    }

    .laporan:hover {
        transform: scale(1.02);
    }

    .laporan p {
        color: #fff;
        margin: 0;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 100%;
    }

    .anonimus {
        font-weight: bold;
        color: #ff0000;
    }

    /* Gaya untuk teks yang akan diberi warna pink */
    .pink-text {
        color: #ff69b4;
        /* Warna pink */
    }

    .read-more {
        color: #ff69b4;
        cursor: pointer;
        display: none;
        float: right;
    }

    .show-read-more {
        display: block;
    }

    .hidden-text {
        display: none;
    }
</style>

<body>

    <div class="container">

        <!-- Laporan akan ditampilkan di sini -->
        <?php
        require "../koneksi.php";

        $sql = "SELECT * FROM laporan ORDER BY waktu_submit DESC";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nama = $row["nama"];
                $laporan = $row["laporan"];
                $alamat = $row["alamat"];
                $anonimus = $row["anonimus"];
                $timestamp = $row["waktu_submit"];
                $kontak = $row["nomor_hp"];
                $user_id = $row["user_id"];
                $pilihan_kasus = $row["pilihan_kasus"];


                // Membuat tampilan HTML untuk setiap laporan
                // Menampilkan teks laporan
                echo '<div class="laporan">';
                echo '<p><span class="pink-text">Nama:   </span> ' . $nama . '</p>';
                echo '<p><span class="pink-text">Kontak:</span> ' . $kontak . '</p>';
                echo '<p><span class="pink-text">ID:   </span> ' . $user_id . '</p>';
                echo '<p><span class="pink-text">Pilihan Kasus:   </span> ' . $pilihan_kasus . '</p>';

                // Menampilkan teks laporan
                echo '<div class="laporan-text">';
                echo '<p><span class="pink-text">Laporan:</span> ';
                if (strlen($laporan) > 0) {
                    echo substr($laporan, 0, 30) . '<span class="hidden-text">' . substr($laporan, 30) . '</span>';
                    echo ' <a class="read-more" href="laporan_selengkapnya.php?id=' . $row['id'] . '">Read More</a>';
                } else {
                    echo $laporan;
                }
                echo '</p>';
                echo '</div>';

                if (strlen($alamat) > 30) {
                    echo '<p><span class="pink-text">Alamat:</span>';
                    echo substr($alamat, 0, 30) . '<span class="hidden-text">' . substr($alamat, 30) . '</span>';
                    echo ' <a class="read-more" href="laporan_selengkapnya.php?id=' . $row['id'] . '"></a>';
                    echo '</p>';
                } else {
                    echo '<p><span class="pink-text">Alamat:</span>' . $alamat . '</p>';
                }
                if ($anonimus) {
                    echo '<p class="anonimus">Anonimus</p>';
                }
                echo '</div>';
                // ...
            }
        } else {
            echo 'Tidak ada laporan yang ditemukan.';
        }
        ?>
        <script>
            // Fungsi untuk menampilkan atau menyembunyikan teks lebih lanjut
            const readMoreButtons = document.querySelectorAll('.read-more');
            readMoreButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const hiddenText = this.parentElement.querySelector('.hidden-text');
                    if (hiddenText.style.display === 'none' || hiddenText.style.display === '') {
                        hiddenText.style.display = 'inline';
                        this.style.display = 'none'; // Sembunyikan tombol "Read More"
                    } else {
                        hiddenText.style.display = 'none';
                    }
                });
            });

            // Tampilkan tombol "Read More" jika ada teks tersembunyi
            const hiddenTexts = document.querySelectorAll('.hidden-text');
            hiddenTexts.forEach(text => {
                const readMoreButton = text.parentElement.querySelector('.read-more');
                if (text.textContent.length > 0) {
                    readMoreButton.style.display = 'inline';
                }
            });
        </script>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
</body>

</html>