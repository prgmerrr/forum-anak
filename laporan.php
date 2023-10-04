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
        padding: 10px;
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
    </style>
</head>

<body>
    <div class="container">
        <!-- Tambahkan gambar anak-anak di sini -->
        <img class="child-image" src="anak.png" alt="Anak-anak bahagia">
        <h1>Pelaporan Masalah</h1>
        <form action="" method="post">
            <label for="nama">Nama (Opsional):</label>
            <input type="text" id="nama" name="nama">
            <label for="laporan">Laporan:</label>
            <textarea id="laporan" name="laporan" required></textarea>
            <label for="alamat">Lokasi</label>
            <textarea id="alamat" name="alamat" required></textarea>
            <label for="anonimus">Laporkan secara anonimus?</label>
            <input type="checkbox" id="anonimus" name="anonimus">
            <input type="submit" value="Kirim Laporan">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Koneksi ke database (sesuaikan dengan konfigurasi Anda)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "km_online";

            // Membuat koneksi
            $con = new mysqli($servername, $username, $password, $dbname);

            // Memeriksa koneksi database
            if ($con->connect_error) {
                die("Koneksi database gagal: " . $con->connect_error);
            }

            // Ambil data dari formulir pelaporan
            $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
            $laporan = $_POST['laporan'];
            $alamat = $_POST['alamat']; // Mengganti $Alamat menjadi $alamat (sesuaikan juga di HTML)
            $anonimus = isset($_POST['anonimus']) ? 1 : 0; // 1 jika anonimus, 0 jika tidak

            // Validasi data (misalnya, pastikan laporan tidak kosong)
            if (empty($laporan)) {
                echo "Silakan isi laporan terlebih dahulu.";
                exit(); // Hentikan eksekusi PHP setelah menampilkan pesan kesalahan
            } else {
                // SQL INSERT untuk menyimpan data ke dalam tabel laporan
                $sql = "INSERT INTO laporan (nama, laporan, alamat, anonimus) VALUES (?, ?, ?, ?)";
                $stmt = $con->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("sssi", $nama, $laporan, $alamat, $anonimus); // Mengganti "ssi" menjadi "sssi"
                    if ($stmt->execute()) {
                        echo '<div class="success-message">Laporan berhasil disimpan.</div>';
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error: " . $con->error;
                }
            }

            // Menutup koneksi ke database
            $con->close();
        }
        ?>
    </div>
</body>

</html>