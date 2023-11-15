<?php 
require "session.php";
require "../koneksi.php"; // Pastikan file ini ada dan berisi koneksi ke database
$querykategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahk = mysqli_num_rows($querykategori);

$querykmn = "SELECT user_posts.*, user_id.username
              FROM user_posts
              LEFT JOIN user_id ON user_posts.user_id = user_id.id";
$result_km = mysqli_query($con, $querykmn);
$jumlahkmn = mysqli_num_rows($result_km);

$queryproduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahp = mysqli_num_rows($queryproduk);

$queryaspi = mysqli_query($con, "SELECT * FROM aspirasi");
$jumlahas = mysqli_num_rows($queryaspi);

$queryu = mysqli_query($con, "SELECT * FROM user_id");
$jumlahu = mysqli_num_rows($queryproduk);
$query = "SELECT COUNT(*) as total_users FROM user_id";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalUsers = $row['total_users'];
    echo "Jumlah pengguna: " . $totalUsers;
} else {
    echo "Gagal mengambil jumlah pengguna.";
}

mysqli_close($con);
?>