<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "km_online";

// Membuat koneksi
$con = mysqli_connect($servername, $username, $password, $db);

// Memeriksa koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();

// Fungsi untuk mengambil data postingan pengguna
function getUserPosts($user_id) {
    global $con;
    $user_id = mysqli_real_escape_string($con, $user_id);

    $query = "SELECT * FROM user_posts WHERE user_id = '$user_id' ORDER BY post_id DESC";
    $result = mysqli_query($con, $query);

    $posts = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }

    return $posts;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses postingan pengguna
    if (isset($_POST['post'])) {
        $user_id = $_SESSION['user_id']; // Anda harus memiliki user_id dalam sesi

        // Validasi pesan (tambahkan validasi sesuai kebutuhan Anda)
        $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

        if (empty($content)) {
            echo "Pesan tidak boleh kosong.";
        } else {
            // Simpan pesan ke database
            $content = mysqli_real_escape_string($con, $content);
            $query = "INSERT INTO user_posts (user_id, content) VALUES ('$user_id', '$content')";

            if (mysqli_query($con, $query)) {
                echo "Pesan berhasil diposting.";
            } else {
                echo "Terjadi kesalahan: " . mysqli_error($con);
            }
        }
    }
}
?>

<!-- Form postingan pengguna -->
<form method="POST" action="">
    <textarea name="content" placeholder="Apa yang Anda pikirkan?"></textarea>
    <button type="submit" name="post">Post</button>
</form>

<!-- Menampilkan postingan pengguna -->
<?php
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $posts = getUserPosts($user_id);

    foreach ($posts as $post) {
        echo '<div class="post">' . $post['content'] . '</div>';
    }
}
?>