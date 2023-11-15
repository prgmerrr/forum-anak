<?php
// Sambungkan ke database dan lakukan otentikasi admin di sini
require "../session.php";
require "../../koneksi.php"; // Added a semicolon here
$querykategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahk = mysqli_num_rows($querykategori);


// Ambil data aspirasi dari database
$query = mysqli_query($con, "SELECT * FROM aspirasi");

// ...

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Aspirasi</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    body {
        background-color: #222;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h2 {
        color: #ff80bf;
        /* Warna pink */
    }

    .box-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .box {
        flex-basis: calc(50% - 10px);
        background-color: #333;
        padding: 20px;
        border: 1px solid #444;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        text-align: left;
    }

    .action-buttons {
        margin-top: 10px;
    }

    .edit-button,
    .jawab-button {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 10px;
        background-color: #ff80bf;
        /* Warna pink */
        color: #222;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .edit-button:hover,
    .jawab-button:hover {
        background-color: #ff2684;
        /* Warna pink lebih tua pada hover */
    }
</style>
<?php
require_once "../navbar.php";
?>
<div class="container">
    <h2>Manajemen Aspirasi</h2>

    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($query)): ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['judul']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $row['isi']; ?>
                        </p>
                        <p class="card-text"><small class="text-muted">Tanggal:
                                <?php echo $row['tanggal']; ?>
                            </small>
                        </p>
                        <p class="card-text"><small class="text-muted">Status:
                                <?php echo $row['status']; ?>
                            </small></p>
                        <!-- <a href="edit_aspirasi.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a> -->
                        <a href="jawab_aspirasi.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Post</a>
                        <!-- Di dalam loop while -->
                        <a href="ubah_status.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Ubah Status</a>

                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Tambahkan link ke Bootstrap JavaScript di sini (jika diperlukan) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>