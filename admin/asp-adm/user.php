<?php
require "../session.php";
require "../../koneksi.php"; // Sambungkan ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data aspirasi berdasarkan ID
    $query = mysqli_query($con, "SELECT * FROM aspirasi WHERE id = $id");

    if ($row = mysqli_fetch_assoc($query)) {
        // Tampilkan data aspirasi
        $judulAspirasi = $row['judul'];
        $isiAspirasi = $row['isi'];
        $respons = $row['respons']; // Menambahkan kolom respons
    } else {
        echo "Aspirasi tidak ditemukan.";
        exit();
    }
} else {
    echo "Parameter ID tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (head section) ... -->
</head>

<body>
    <?php require "../navbar.php"?>

    <div style=" margin-top: 70px;" class="container">
        <h2>Detail Aspirasi</h2>
        <h3>Judul Aspirasi: <?php echo $judulAspirasi; ?></h3>
        <p>Isi Aspirasi: <?php echo $isiAspirasi; ?></p>

        <?php if (!empty($respons)) { ?>
        <h3>Respons Admin:</h3>
        <p><?php echo $respons; ?></p>
        <?php } ?>

        <!-- Tambahkan formulir pengisian respons untuk admin di sini jika perlu -->
    </div>

</body>

</html>