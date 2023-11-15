<?php
require "../session.php";
require "../../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM aspirasi WHERE id = $id");

    if (mysqli_num_rows($query) > 0) {
        $aspirasi = mysqli_fetch_assoc($query);
    } else {
        // Handle jika aspirasi tidak ditemukan
        // Misalnya, tampilkan pesan kesalahan atau redirect ke halaman lain
    }
} else {
    // Handle jika parameter id tidak ada
    // Misalnya, tampilkan pesan kesalahan atau redirect ke halaman lain
}
?>