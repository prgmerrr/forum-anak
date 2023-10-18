<?php
require "session.php";
require "../koneksi.php"; // Sambungkan ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data aspirasi berdasarkan ID
    $query = mysqli_query($con, "SELECT * FROM aspirasi WHERE id = $id");

    if ($row = mysqli_fetch_assoc($query)) {
        // Cek status saat ini
        $statusSaatIni = $row['status'];

        // Ubah status menjadi "Selesai" jika status saat ini adalah "Pending"
        if ($statusSaatIni == "Pending") {
            $queryUbahStatus = mysqli_query($con, "UPDATE aspirasi SET status = 'Selesai' WHERE id = $id");

            if ($queryUbahStatus) {
                // Status berhasil diubah
                header("Location: aspirasi.php");
                exit();
            } else {
                // Ada kesalahan saat mengubah status
                echo "Terjadi kesalahan saat mengubah status.";
            }
        } else {
            // Status saat ini bukan "Pending"
            echo "Status saat ini bukan 'Pending', tidak dapat diubah.";
        }
    } else {
        echo "Aspirasi tidak ditemukan.";
        exit();
    }
} else {
    echo "Parameter ID tidak valid.";
    exit();
}
?>