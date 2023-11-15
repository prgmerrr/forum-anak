<?php
$koneksi = mysqli_connect("localhost", "root", "", "km_online");
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan ini adalah request POST
    if (isset($_POST['judul']) && isset($_POST['isi']) && isset($_FILES['foto'])) {
        // Ambil data dari formulir
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $namaFoto = $_FILES['foto']['name'];
        $tmpFoto = $_FILES['foto']['tmp_name'];

        if (!empty($namaFoto) && !empty($tmpFoto)) {
            // Simpan foto ke direktori
            $lokasiFoto = "uploads/" . $namaFoto;
            if (move_uploaded_file($tmpFoto, $lokasiFoto)) {
                // Simpan data ke database (tabel user_posts)
                $query = "INSERT INTO adm_pos (user_id, judul, isi, foto) VALUES (1, '$judul', '$isi', '$lokasiFoto')";
                if (mysqli_query($koneksi, $query)) {
                    ?>
                    <script>
                        console.log("Posting berhasil dikirim.");

                        // Tunggu selama 2 detik sebelum kembali ke halaman user
                        setTimeout(function () {
                            window.location.href =
                                "postingan.php"; // Ganti "halaman_user.html" dengan URL halaman user yang sesuai
                        }, 0); // 2000 milidetik (2 detik)
                    </script>
                    <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                }
            } else {
                echo "Error saat mengunggah file gambar.";
            }
        } else {
            echo "Pastikan Anda telah mengisi judul, isi, dan memilih berkas gambar.";
        }
    } else {
        echo "Data tidak lengkap.";
    }
}

// Tutup koneksi database
mysqli_close($koneksi); ?>