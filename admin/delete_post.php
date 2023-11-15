<?php
if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    // Sambungkan ke database
    $koneksi = mysqli_connect("localhost", "root", "", "km_online");
    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Hapus postingan dari database
    $deleteQuery = "DELETE FROM user_pos WHERE post_id = $post_id";
    if (mysqli_query($koneksi, $deleteQuery)) {
        ?>
        <script>
            // Notifikasi sukses
            if ("Notification" in window) {
                if (Notification.permission === "granted") {
                    var notification = new Notification("Posting berhasil dikirim.");
                } else if (Notification.permission !== "denied") {
                    Notification.requestPermission().then(function (permission) {
                        if (permission === "granted") {
                            var notification = new Notification("Posting berhasil dikirim.");
                        }
                    });
                }
            }

            // Tunggu selama 2 detik sebelum kembali ke halaman user
            setTimeout(function () {
                window.location.href = "postingan.php"; // Ganti "halaman_user.html" dengan URL halaman user yang sesuai
            }, 0); // 2000 milidetik (2 detik)
        </script>
        <?php
    } else {
        echo "Error deleting post: " . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>