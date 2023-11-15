<?php
require "../session.php";

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$db = "km_online";

$con = mysqli_connect($servername, $username, $password, $db);

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function getUserPosts()
{
    global $con;
    // Ambil semua postingan dari database
    $query = "SELECT user_posts.*, user_id.username, COUNT(likes.post_id) AS like_count
          FROM user_posts
          LEFT JOIN user_id ON user_posts.user_id = user_id.id
          LEFT JOIN likes ON user_posts.post_id = likes.post_id
          GROUP BY user_posts.post_id
          ORDER BY like_count DESC";

    $result = mysqli_query($con, $query);

    $posts = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }

    return $posts;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>twt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #212529;
        /* Warna latar belakang hitam (tema gelap) */
        font-family: Arial, sans-serif;
        color: #fff;
        /* Warna teks putih (tema gelap) */
        margin: 0;
        padding: 0;
        overflow-wrap: break-word;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    h1,
    h2 {
        color: #f8cf2c;
        /* Warna teks kuning */
    }

    .post {
        background-color: #333;
        /* Warna latar belakang abu-abu tua (tema gelap) */
        border: 1px solid #f8cf2c;
        /* Garis kuning */
        margin: 10px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .post strong {
        font-weight: bold;
    }

    form {
        display: inline;
    }

    button {
        background-color: #f8cf2c;
        /* Warna tombol kuning */
        color: #000;
        /* Warna teks hitam */
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    button:hover {
        background-color: #000;
        /* Warna tombol hitam saat digulirkan */
        color: #f8cf2c;
        /* Warna teks kuning saat digulirkan */
    }

    a {
        color: #f8cf2c;
        /* Warna teks kuning untuk tautan */
        text-decoration: none;
        margin-top: 20px;
        transition: text-decoration 0.3s;
    }

    a:hover {
        text-decoration: underline;
        /* Garis bawah saat digulirkan */
    }
</style>

<body>
    <?php require "../navbar.php" ?>
    <h1 style="text-align: center;">Selamat datang, Admin!</h1>
    <h2 style="text-align: center;">Daftar Postingan Pengguna</h2>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['delete_post'])) {
            // Admin ingin menghapus postingan
            $post_id = $_POST['post_id'];

            // Hapus komentar terkait
            $deleteCommentsQuery = "DELETE FROM comments WHERE post_id = '$post_id'";
            mysqli_query($con, $deleteCommentsQuery);

            // Hapus like terkait
            $deleteLikesQuery = "DELETE FROM likes WHERE post_id = '$post_id'";
            mysqli_query($con, $deleteLikesQuery);

            // Hapus postingan
            $deleteQuery = "DELETE FROM user_posts WHERE post_id = '$post_id'";
            if (mysqli_query($con, $deleteQuery)) {
                echo '<div class="alert alert-success" role="alert">
  Berhasil di hapus 
</div>';


            } else {
                echo "Terjadi kesalahan: " . mysqli_error($con);
            }
        }
    }
    ?>
    <?php
    $posts = getUserPosts();
    foreach ($posts as $post) {
        echo '<div class="post">';
        echo '<strong>' . (isset($post['username']) ? $post['username'] : 'Nama Pengguna Tidak Tersedia') . '</strong> - ' . $post['post_date'];
        echo '<p>' . $post['content'] . '</p>';
        // Tambahkan tombol untuk menghapus postingan
        echo '<form method="POST" action="">';
        echo '<input type="hidden" name="post_id" value="' . $post['post_id'] . '">';
        echo '<button type="submit" name="delete_post">Hapus</button>';
        echo '</form>';
        echo '</div>';
    }

    ?>
    <a href="admin_logout.php">Keluar</a>
</body>

</html>