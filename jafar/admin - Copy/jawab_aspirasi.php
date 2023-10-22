<?php
require "session.php";
require "../koneksi.php"; // Sambungkan ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data aspirasi berdasarkan ID
    $query = mysqli_query($con, "SELECT * FROM aspirasi WHERE id = $id");

    if ($row = mysqli_fetch_assoc($query)) {
        // Tampilkan data aspirasi
        $judulAspirasi = $row['judul'];
        $isiAspirasi = $row['isi'];
    } else {
        echo "Aspirasi tidak ditemukan.";
        exit();
    }
} else {
    echo "Parameter ID tidak valid.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap respons yang diisi oleh admin
    $respons = $_POST["respons"];

    // Simpan respons ke dalam database (misalnya, dalam kolom 'respons' di tabel 'aspirasi')
    $queryRespons = mysqli_query($con, "UPDATE aspirasi SET respons = '$respons' WHERE id = $id");

    if ($queryRespons) {
        // Respons berhasil disimpan
        header("Location: aspirasi.php");
        exit();
    } else {
        // Ada kesalahan saat menyimpan respons
        echo "Terjadi kesalahan saat menyimpan respons.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jawab Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
    body {
        background-color: #121212;
        /* Latar belakang gelap */
        color: #ffcccb;
        /* Warna teks pink pastel */
        font-family: Arial, sans-serif;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Membuat konten berada di tengah layar */
        margin: 0;
        animation: fadeIn 1s;
    }

    .container {
        max-width: 80%;
        /* Lebar maksimum 80% dari lebar tampilan */
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.1);
        /* Latar belakang semi-transparan putih */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;

        /* Menambahkan margin-top untuk memberi ruang antara navbar dan konten */

    }

    h2 {
        color: #ff1493;
        /* Warna judul pink terang */
        /* Animasi muncul saat halaman dimuat */
        animation: fadeIn 1s;
    }

    form {
        margin-top: 20px;
    }

    label {
        color: #ff1493;
        /* Warna label pink terang */
        /* Animasi perubahan warna label saat hover */
        transition: color 0.3s ease-in-out;
    }

    .form-control {
        background-color: #333;
        /* Latar belakang input gelap */
        color: #ffcccb;
        border: none;
        border-radius: 5px;
        margin-top: 10px;
        padding: 10px;
        width: 100%;
    }

    .form-control:focus {
        background-color: #444;
        /* Latar belakang input saat fokus */
        color: #ffcccb;
    }

    button.btn-success {
        background-color: #ff1493;
        /* Warna tombol pink terang */
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;

        /* Animasi perubahan warna tombol saat hover */
        animation: fadeIn 1s;
    }

    button.btn-success:hover {
        background-color: #ff007f;
        /* Warna tombol pink lebih terang saat hover */
    }

    /* Animasi modern */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Responsifitas */
    @media (max-width: 768px) {
        .container {
            max-width: 90%;
            /* Lebar maksimum 90% pada perangkat berukuran kecil */
        }
    }
    </style>
</head>

<body>
    <?php require "navbar.php"?>

    <div style=" margin-top: 70px;" class="container">
        <h2>Jawab Aspirasi</h2>
        <h3>Judul Aspirasi: <?php echo $judulAspirasi; ?></h3>
        <p>Isi Aspirasi: <?php echo $isiAspirasi; ?></p>

        <form method="POST" action="">
            <div class="form-group">
                <label for="respons">Respons:</label>
                <textarea class="form-control" id="respons" name="respons" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan Respons</button>
        </form>
    </div>

</body>

</html>