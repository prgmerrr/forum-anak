<!DOCTYPE html>
<html>

<head>
    <title>Halaman Admin</title>
</head>
<style>
    /* Tambahkan gaya tambahan di sini jika diperlukan */
    body {
        background-color: #212529;
        /* Warna latar belakang hitam (tema gelap) */
        color: #fff;
        /* Warna teks putih (tema gelap) */
        padding: 20px;
    }

    h1,
    h2 {
        color: #f8cf2c;
        /* Warna teks kuning */
    }

    form {
        background-color: #333;
        /* Warna latar belakang abu-abu tua (tema gelap) */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    label {
        color: #f8cf2c;
        /* Warna teks kuning */
    }

    input[type="text"],
    textarea,
    input[type="file"],
    input[type="submit"] {
        background-color: #333;
        /* Warna latar belakang abu-abu tua (tema gelap) */
        color: #fff;
        /* Warna teks putih (tema gelap) */
        border: 1px solid #f8cf2c;
        /* Garis kuning */
        border-radius: 5px;
        padding: 5px;
        margin: 5px 0;
    }

    input[type="file"] {
        color: initial;
    }

    input[type="submit"] {
        background-color: #f8cf2c;
        /* Warna tombol kuning */
        color: #000;
        /* Warna teks hitam */
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #000;
        /* Warna tombol hitam saat digulirkan */
        color: #f8cf2c;
        /* Warna teks kuning saat digulirkan */
    }

    ul {
        list-style: none;
    }

    ul li {
        background-color: #333;
        /* Warna latar belakang abu-abu tua (tema gelap) */
        border: 1px solid #f8cf2c;
        /* Garis kuning */
        padding: 20px;
        border-radius: 10px;
        margin: 10px 0;
    }

    img {
        max-width: 100%;
    }

    form.delete-form {
        display: inline;
    }
</style>


<body>
    <h1>Admin Page</h1>
    <form action="post_admin.php" method="POST" enctype="multipart/form-data">
        <h1>Modern & Complete Form</h1>
        <label for="judul">Judul:</label>
        <input type="text" name="judul" required placeholder="Enter your title">
        <label for="isi">Isi:</label>
        <textarea name="isi" rows="4" required placeholder="Enter your message"></textarea>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" accept="image/*">
        <input type="submit" value="Submit">
    </form>
</body>

</html>



</form>

<h2>Daftar Postingan Pengguna:</h2>
<ul>
    <?php
    // Sambungkan ke database
    $koneksi = mysqli_connect("localhost", "root", "", "km_online");
    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Ambil postingan dari tabel user_posts
    $query = "SELECT * FROM user_pos";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo "<h3>" . $row['judul'] . "</h3>";
            echo "<p>" . $row['isi'] . "</p>";
            // Tampilkan gambar
            echo '<img src="../pamer/' . $row['foto'] . '" alt="Foto">';
            // Add a delete button
            echo '<form method="post" action="delete_post.php">';
            echo '<input type="hidden" name="post_id" value="' . $row['post_id'] . '">';
            echo '<input type="submit" value="Hapus">';
            echo '</form>';
            echo '<form method="post" action="post_admin.php">';
            echo '<input type="submit" value="post">';
            echo '</form>';
            echo "</li>";
        }
    } else {
        echo "Tidak ada postingan pengguna.";
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
    ?>
</ul>

</body>

</html>