<?php
// database.php

$servername = "localhost";
$username = "root";
$password = "";
$db = "km_online";

// Fungsi untuk membuat koneksi ke database
function connectDatabase() {
    global $servername, $username, $password, $db;
    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

// Fungsi untuk mengambil informasi pengguna
function getUserInfo($user_id) {
    $conn = connectDatabase();

    $query = "SELECT * FROM user_id WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $user;
}

// Fungsi untuk mengambil posting pengguna
function getUserPosts($user_id) {
    $conn = connectDatabase();

    $query = "SELECT content, timestamp FROM user_post WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $posts;
}
?>