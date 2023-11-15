<?php
require "../koneksi.php";

// Periksa apakah parameter id telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete associated records in likes table
    $deleteLikesQuery = "DELETE FROM likes WHERE user_id = $id";
    $con->query($deleteLikesQuery);

    // Delete associated records in comments table
    $deleteCommentsQuery = "DELETE FROM comments WHERE user_id = $id";
    $con->query($deleteCommentsQuery);

    // Delete associated records in user_posts table
    $deleteUserPostsQuery = "DELETE FROM user_posts WHERE user_id = $id";
    $con->query($deleteUserPostsQuery);

    // Then delete the user
    $deleteUserQuery = "DELETE FROM user_id WHERE id = $id";
    $con->query($deleteUserQuery);

    // Redirect kembali ke halaman utama
    header("Location: user.php");
    exit();
}
?>