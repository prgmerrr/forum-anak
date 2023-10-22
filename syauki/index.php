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
                $login_errors[] = "Email already exists. Please choose a different email.";
            } else {
                // Jika email unik, maka lanjutkan dengan pendaftaran
                $stmt_insert_user = mysqli_prepare($conn, "INSERT INTO user_id (username, email, password) VALUES (?, ?, ?)");
                mysqli_stmt_bind_param($stmt_insert_user, "sss", $signup_username, $signup_email, $signup_password);
                if (mysqli_stmt_execute($stmt_insert_user)) {
                    $signup_success_message = "Registration successful! Please log in.";
                } else {
                    $login_errors[] = "Registration failed. Please try again.";
                }
                mysqli_stmt_close($stmt_insert_user);
            }
            mysqli_stmt_close($stmt_check_email);
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
    <link rel="stylesheet" href="style.css">
    <title>Form Pendaftaran</title>
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
            <h2 class="daftar">Ooh Mau daftar?</h2>
        </div>
        <div class="registration-text">
            Ayo daftar sini
        </div>
        <?php if (!empty($signup_success_message)) { ?>
        <div class="notification show">
            <?php echo $signup_success_message; ?>
        </div>
        <?php } ?>
        <form class="registration-form" method="POST" action="">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="signup">Sign Up</button>
        </form>

        <?php if (!empty($login_errors)) { ?>
        <div class="notification show">
            <ul>
                <?php foreach ($login_errors as $error) { ?>
                <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
    </div>
    <?php if (!empty($signup_success_message)) { ?>
    <div class="notification show">
        <?php echo $signup_success_message; ?>
    </div>
    <?php // Tambahkan pengalihan ke halaman login setelah pendaftaran berhasil
    header("Location: login.php");
} ?>

    <script>
    // Auto-hide notifications after 5 seconds
    const notifications = document.querySelectorAll('.notification');
    notifications.forEach((notification) => {
        setTimeout(() => {
            notification.classList.remove('show');
        }, 5000);
    });
    </script>
</body>

</html>