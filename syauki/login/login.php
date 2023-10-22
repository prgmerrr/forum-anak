<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "km_online";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$signup_success_message = "";
$login_errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        // Proses pendaftaran
        $signup_username = htmlspecialchars($_POST['username']);
        $signup_email = htmlspecialchars($_POST['email']);
        $signup_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Validasi data yang dimasukkan (misalnya, pastikan email unik)
        if (empty($signup_username) || empty($signup_email) || empty($_POST['password'])) {
            $signup_success_message = "";
            $login_errors[] = "All fields are required.";
        } else {
            // Periksa apakah email sudah ada dalam database
            $stmt_check_email = mysqli_prepare($conn, "SELECT * FROM user_id WHERE email = ?");
            mysqli_stmt_bind_param($stmt_check_email, "s", $signup_email);
            mysqli_stmt_execute($stmt_check_email);
            $result_check_email = mysqli_stmt_get_result($stmt_check_email);

            if (mysqli_num_rows($result_check_email) > 0) {
                $signup_success_message = "";
                $login_errors[] = "Email already exists. Please choose a different email.";
            } else {
                // Jika email unik, maka lanjutkan dengan pendaftaran
                $stmt_insert_user = mysqli_prepare($conn, "INSERT INTO user_id (username, email, password) VALUES (?, ?, ?)");
                mysqli_stmt_bind_param($stmt_insert_user, "sss", $signup_username, $signup_email, $signup_password);
                if (mysqli_stmt_execute($stmt_insert_user)) {
                    $signup_success_message = "Registration successful! Please log in.";
                } else {
                    $signup_success_message = "";
                    $login_errors[] = "Registration failed. Please try again.";
                }
                mysqli_stmt_close($stmt_insert_user);
            }

            mysqli_stmt_close($stmt_check_email);
        }
    } elseif (isset($_POST['login'])) {
        // Proses login
        $login_email = htmlspecialchars($_POST['login_email']);
        $login_password = $_POST['login_password'];

        // Validasi
        if (empty($login_email) || empty($login_password)) {
            $login_errors[] = "Email and password are required.";
        } else {
            $stmt_check_login = mysqli_prepare($conn, "SELECT * FROM user_id WHERE email = ?");
            mysqli_stmt_bind_param($stmt_check_login, "s", $login_email);
            mysqli_stmt_execute($stmt_check_login);
            $result_check_login = mysqli_stmt_get_result($stmt_check_login);

            if (mysqli_num_rows($result_check_login) == 1) {
                $row = mysqli_fetch_assoc($result_check_login);
                if (password_verify($login_password, $row['password'])) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $row['id'];
                    header("Location: index.php");
                    exit();
                } else {
                    $login_errors[] = "Login failed. Please check your email and password.";
                }
            } else {
                $login_errors[] = "Login failed. Please check your email and password.";
            }

            mysqli_stmt_close($stmt_check_login);
        }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class="regis-logo">
        <div class="logo">
            <img src="../logo.jpg" alt="">
            <h2>Foranggis</h2>
        </div>
    </div>
    <div class="registration-box">
        <div class="registration-header">
            <h2 style="  line-height: 1;" class="daftar">Ooh Mau daftar?</h2>
        </div>
        <div style="  line-height: 1;" class="registration-text">
            Ayo daftar sini
        </div>
        <form class="registration-form" method="POST" action="">
            <div class="form-group">
                <input type="email" name="login_email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="login_password" placeholder="Password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>

        <?php if (!empty($signup_success_message)) { ?>
        <p><?php echo $signup_success_message; ?></p>
        <?php } ?>

        <?php if (!empty($login_errors)) { ?>
        <ul>
            <?php foreach ($login_errors as $error) { ?>
            <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
        <?php } ?>
        <a href="singup.php">Belum punya akun?</a>
</body>

</html>