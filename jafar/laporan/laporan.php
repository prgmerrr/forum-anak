<?php
session_start();

// Verifikasi apakah pengguna telah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login/");
    exit();
}

// Dapatkan user ID sesuai dengan skema yang Anda gunakan
$user_id = $_SESSION['user_id'];

// Membuka koneksi ke database (sesuaikan dengan konfigurasi Anda)
$servername = "localhost";
$db_username = "root";
$password = "";
$db = "km_online";
$conn = mysqli_connect($servername, $db_username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $laporan = $_POST['laporan'];
    $alamat = $_POST['alamat'];
    $anonimus = isset($_POST['anonimus']) ? 1 : 0;
    $kontak = isset($_POST['kontak']) ? $_POST['kontak'] : '';

    if (empty($laporan)) {
        echo "Silakan isi laporan terlebih dahulu.";
    } else {
        // SQL INSERT untuk menyimpan data ke dalam tabel laporan
        $sql = "INSERT INTO laporan (user_id, nama, nomor_hp, laporan, alamat, anonimus) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "issssi", $user_id, $nama, $kontak, $laporan, $alamat, $anonimus);
            if (mysqli_stmt_execute($stmt)) {
                echo '<div class="success-message">Laporan berhasil disimpan.</div>';
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Halaman Pelapor Pengguna</title>
    <style>
    /* Gaya dasar */
    body {
        font-family: Arial, sans-serif;
        background-color: #ffc0cb;
        /* Warna latar belakang pink muda pastel */
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .container {
        margin-top: 50px;
    }

    /* Menggunakan media query untuk membuatnya responsif */
    @media (max-width: 768px) {
        .container {
            margin-top: 20px;
            /* Mengurangi margin atas pada layar berukuran kecil */
        }
    }

    .container {
        max-width: 600px;
        /* Lebar maksimum formulir */
        background-color: rgba(255, 255, 255, 0.9);
        /* Latar belakang semi-transparan */
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        /* Tengahkan kontainer di layar PC */
    }

    h1 {
        color: #ff;
        /* Teks berwarna putih */
        font-size: 24px;
        margin-top: 20px;
    }

    form {
        margin-top: 20px;
    }

    label,
    input,
    textarea {
        display: block;
        margin-bottom: 15px;
        color: #333;
        /* Teks berwarna hitam */
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="checkbox"] {
        margin-left: 5px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        margin-top: 15px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .success-message {
        background-color: #4CAF50;
        color: white;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
    }

    /* Gaya tambahan untuk tema anak-anak */
    .child-image {
        max-width: 150px;
        /* Lebar gambar anak-anak */
        height: 150px;
    }

    .container {
        margin-top: 50px;
    }

    /* Menggunakan media query untuk layar berukuran kecil (seperti pada perangkat seluler) */
    @media (max-width: 768px) {
        .asu {
            margin-top: 20px;
            /* Mengurangi margin atas pada layar berukuran kecil */
        }
    }

    /* Menggunakan media query untuk layar berukuran besar (seperti pada komputer) */
    @media (min-width: 769px) {
        .asu {
            margin-top: 50px;
            /* Menjaga margin atas pada layar berukuran besar */
        }
    }
    </style>
</head>

<body>
    <div style="margin-top: 50px;" class="container asu">
        <!-- Tambahkan gambar anak-anak di sini -->
        <img class="child-image" src="anak.png" alt="Anak-anak bahagia">
        <h1>Pelaporan Masalah</h1>
        <form action="" method="post">
            <label for="nama">Nama (Opsional):</label>
            <input type="text" id="nama" name="nama">
            <label for="kontak">Kontak yang bisa dihubungi:</label>
            <input type="text" id="kontak" name="kontak">
            <label for="laporan">Laporan:</label>
            <textarea id="laporan" name="laporan" required></textarea>
            <label for="alamat">Lokasi</label>
            <textarea id="alamat" name="alamat" required></textarea>
            <label for="anonimus">Laporkan secara anonimus?</label>
            <input type="checkbox" id="anonimus" name="anonimus">
            <input type="submit" value="Kirim Laporan">
        </form>
    </div>
</body>

</html>