<?php
session_start();
require "../koneksi.php";

// Fungsi untuk menghasilkan password hash
function createPasswordHash($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2>Login</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="loginbtn">Login</button>
                </form>
            </div>
        </div>
        <div>
            <?php
            if (isset($_POST['loginbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                // Pastikan Anda sudah terkoneksi dengan database menggunakan $con
                $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
                $countdata = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);

                if ($countdata > 0) {
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        header('location: index.php');
                    } else {
                        ?>
            <div class="alert alert-danger" role="alert">
                Password salah!!
            </div>

            <?php
                    }
                } else {
                    ?>
            <div class="alert alert-danger" role="alert">
                Akun tidak ada
            </div>

            <?php
                }
            }
            ?>


        </div>
    </div>
</body>

</html>