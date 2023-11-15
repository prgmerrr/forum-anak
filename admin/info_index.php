<?php


require "session.php";
require "../koneksi.php";
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

} else {
    echo "Gagal mengambil jumlah pengguna.";
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

} else {
    echo "Anda belum login.";
}


$sql = "SELECT * FROM laporan ORDER BY waktu_submit DESC";
$result = $con->query($sql);


$laporans = array(); // Buat array untuk menampung semua laporan

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nama = $row["nama"];
        $laporan = $row["laporan"];
        $alamat = $row["alamat"];
        $anonimus = $row["anonimus"];
        $timestamp = $row["waktu_submit"];
        $kontak = $row["nomor_hp"];
        $user_id = $row["user_id"];
        $status = $row["status"];
        $pilihan_kasus = $row["pilihan_kasus"];
        $status_text = ($status == 'selesai') ? 'selesai' : 'Pending';

        // Simpan laporan dalam array
        $laporans[] = [
            'nama' => $nama,
            'laporan' => $laporan,
            'alamat' => $alamat,
            'anonimus' => $anonimus,
            'timestamp' => $timestamp,
            'kontak' => $kontak,
            'user_id' => $user_id,
            'status_text' => $status_text,
            'pilihan_kasus' => $pilihan_kasus
        ];
    }
}

// Reverse array agar laporan yang baru muncul di atas
$laporans = array_reverse($laporans);

// Tampilkan laporan dalam tabel
foreach ($laporans as $laporan) {
    // Tampilkan laporan dalam tabel di sini
}



?>
<?php
function getUserPosts()
{
    global $con;
    // Ambil semua postingan dari database
    $query = "SELECT user_posts.*, user_id.username
              FROM user_posts
              LEFT JOIN user_id ON user_posts.user_id = user_id.id";
    $result = mysqli_query($con, $query);

    $posts = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }

    return $posts;
}


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

        } else {
            echo "Terjadi kesalahan: " . mysqli_error($con);
        }
    }
}


?>