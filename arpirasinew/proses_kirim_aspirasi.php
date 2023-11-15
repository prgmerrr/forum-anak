<?php
// Sambungkan ke database
require "../koneksi.php";

// Fungsi untuk memastikan bahwa pengguna telah login
function checkLoginStatus() {
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
}

// Fungsi untuk menyimpan ID dan username pengguna ke dalam sesi
function saveUserInfoToSession($user_id, $username) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
}

// Periksa status login
checkLoginStatus();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $judul = $_POST["judul"];
    $isi = $_POST["isi"];
    $tanggal = date("Y-m-d"); // Ambil tanggal saat ini
    $status = "Pending"; // Status awal: Pending

    // Ambil ID dan username pengguna dari sesi
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    // Query SQL untuk menyimpan aspirasi ke database dengan ID dan username pengguna
    $query = mysqli_prepare($con, "INSERT INTO aspirasi (user_id, username, judul, isi, tanggal, status) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($query, "ssssss", $user_id, $username, $judul, $isi, $tanggal, $status);

    if (mysqli_stmt_execute($query)) {
        // Aspirasi berhasil disimpan
        // Tambahkan JavaScript untuk menampilkan notifikasi sukses
        echo '<script>alert("Aspirasi berhasil dikirim!");</script>';
        header("Location: index.php");
        exit();
    } else {
        // Terjadi kesalahan saat menyimpan aspirasi
        header("Location: kirim_aspirasi.php?status=error");
        exit();
    }
}
?>