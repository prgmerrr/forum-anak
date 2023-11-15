<?php
require "../session.php";
require "../../koneksi.php";

// Pastikan aspirasi_id ada dalam parameter GET
if (isset($_GET['aspirasi_id'])) {
    $aspirasi_id = $_GET['aspirasi_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['respons'])) {
            $respons = $_POST['respons'];

            // Validasi atau sanitasi data respons jika diperlukan
            $respons = mysqli_real_escape_string($con, $respons);

            // Simpan respons ke dalam database
            $queryRespons = mysqli_query($con, "UPDATE aspirasi SET respons = '$respons' WHERE id = $aspirasi_id");

            if ($queryRespons) {
                header("Location: aspirasi.php");
                exit();
            } else {
                echo "Terjadi kesalahan saat menyimpan respons.";
            }
        }
    }
} else {
    echo "Parameter aspirasi_id tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- (Head section) -->
</head>

<body>
    <?php require "../navbar.php"; ?>

    <div class="container">
        <h2>Jawab Aspirasi</h2>

        <form method="POST" action="">
            <input type="hidden" name="aspirasi_id" value="<?php echo $aspirasi_id; ?>">
            <div class="form-group">
                <label for="respons">Respons:</label>
                <textarea class="form-control" id="respons" name="respons" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kirim Respons</button>
        </form>
    </div>
</body>

</html>