<?php
require_once "../koneksi.php"; // Adjust the path to match your file structure
require "../session.php";
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

/* Updated CSS for controlling text overflow and making it responsive */
.laporan {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #444;
    border-radius: 10px;
    background-color: #333;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    text-align: left;
    max-width: 100%;
    /* Limit the text width to the container's width */
    overflow: hidden;
    word-wrap: break-word;
    /* Allow long words to break and wrap */
    max-height: 300px;
    /* Adjust the maximum height as needed */
    overflow-y: auto;
    /* Add vertical scrollbar when the content overflows */
}

/* Updated CSS for "Read More" link inside the .laporan container */
.laporan .read-more {
    display: none;
    margin-top: 10px;
    text-align: right;
}

/* Updated CSS for the "Read More" link when the container is expanded */
.laporan.expanded {
    max-height: none;
    overflow-y: visible;
    /* Remove vertical scrollbar when expanded */
}

/* Updated CSS for the "Read More" link text */
.laporan.expanded .read-more {
    display: block;
    text-align: right;
    font-size: 14px;
    color: #ff69b4;
    cursor: pointer;
}

/* Updated style for "Read More" link when hovered */
.laporan.expanded .read-more:hover {
    text-decoration: underline;
}

.laporan:hover {
    transform: scale(1.02);
}

.laporan p {
    color: #fff;
    margin: 0;
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
</style>

<body>
    <div class="container">
        <h1>Laporan</h1>
        <div class="laporan-list">
            <?php
require_once "../koneksi.php"; // Include the database connection file

// Check if the "id" parameter is present in the URL
if (isset($_GET['id'])) {
    $laporanId = $_GET['id'];

    // Query database to retrieve the specific report based on $laporanId
    $sql = "SELECT * FROM laporan WHERE id = $laporanId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Display the detailed report here
        $row = $result->fetch_assoc();
        echo '<div class="container">';
        echo '<h1>Laporan Selengkapnya</h1>';
        // Display report details here
        echo '<div class="laporan">';
         echo '<p><span class="pink-text">Laporan id:  </span> '. $laporanId . '</p>';
        echo '<p><span class="pink-text">Nama:   </span> '. $row["nama"] . '</p>';
        echo '<p><span class="pink-text">Kontak:</span> ' . $row["nomor_hp"] . '</p>';
        echo '<p><span class="pink-text">Laporan:</span>' . $row["laporan"] . '</p>';
        echo '<p><span class="pink-text">Alamat:</span>' . $row["alamat"] . '</p>';
        echo '<p>Waktu Laporan Dibuat: <span class="timestamp">' . $row["waktu_submit"] . '</span></p>';
        if ($row["anonimus"]) {
            echo '<p class="anonimus">Anonimus</p>';
        }
        echo '</div>';
        echo '</div>';
    } else {
        echo 'Laporan tidak ditemukan.';
    }
} else {
    // If the "id" parameter is not present, display the list of reports as before
    // ...
}
?>
            <script>
            // Fungsi untuk memuat ulang halaman
            function refreshPage() {
                location.reload();
            }

            // Menjadwalkan pembaruan halaman setiap 10 detik
            setInterval(refreshPage, 50000); // 10000 milidetik (10 detik)

            // JavaScript to format and display the timestamps
            document.addEventListener("DOMContentLoaded", function() {
                const timestampElements = document.querySelectorAll('.timestamp');

                timestampElements.forEach(function(element) {
                    const timestamp = new Date(element.textContent);
                    const formattedTimestamp = timestamp.toLocaleString(); // Format the timestamp
                    element.textContent = formattedTimestamp;
                });
            });
            </script>

        </div>
    </div>
</body>

</html>