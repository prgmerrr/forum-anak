<?php
require "session.php";
require "../koneksi.php"; // Added a semicolon here
$querykategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahk = mysqli_num_rows($querykategori);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<body class="bg-dark text-white">
    <?php
    require "navbar.php"; ?>
    <div class="my-5 container col-12 col-md-6">
        <h3>Tambah kategori</h3>
        <form action="" method="post">
            <div>
                <label for="kategori">kategori</label>
                <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" class="form-control">
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="submit" name="simpan_kategori">
                    Simpan
                </button>
            </div>
        </form>
        <?php
        if (isset($_POST['simpan_kategori'])) {
            $kategori = htmlspecialchars($_POST['kategori']);

            // Check if the input is empty
            if (empty($kategori)) {
                echo "Kategori tidak boleh kosong.";
            } else {
                // Assuming you have a database connection established ($con) before this code
        
                // Check if the category already exists
                $check_query = "SELECT nama FROM kategori WHERE nama='$kategori'";
                $data_yang_ada = mysqli_query($con, $check_query);

                if (mysqli_num_rows($data_yang_ada) > 0) {
                    echo "Kategori sudah ada.";
                } else {
                    // Insert the new category into the database
                    $insert_query = "INSERT INTO kategori (nama) VALUES ('$kategori')";
                    if (mysqli_query($con, $insert_query)) {
                        echo "Kategori berhasil ditambahkan.";
                        echo '<script>window.location.reload();</script>'; // Reload the page
                    } else {
                        echo "Gagal menambahkan kategori: " . mysqli_error($con);
                    }
                }
            }
        }
        ?>

    </div>


    <div class="mt-3 container">
        <h2>List kategori</h2>
        <div class="table-responsive mt-5">
            <table class="table">

                <div class="table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $number = 1;

                            if ($jumlahk == 0) {
                                echo '<tr><td colspan="2">Tidak ada data kategori</td></tr>';
                            } else {
                                while ($data = mysqli_fetch_array($querykategori)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $number; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['nama']; ?>
                                        </td>
                                        <td> <a href="kategori-detail.php?<?php echo $data['id'] ?>" class="btn btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                                                </svg></a></td>
                                    </tr>
                                    <?php
                                    $number++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

</html>