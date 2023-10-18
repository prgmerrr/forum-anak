<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "km_online";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fungsi untuk memeriksa apakah pengguna sudah login
function check_login() {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        header("Location: user.php"); // Redirect to the user's dashboard.
        exit();
    } elseif (basename($_SERVER['PHP_SELF']) != "login.php" && basename($_SERVER['PHP_SELF']) != "signup.php") {
        header("Location: login.php"); // Redirect to the login page if not logged in and not on login or signup page.
        exit();
    }
}

// Pendaftaran (Sign Up)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        $signup_username = htmlspecialchars($_POST['username']);
        $signup_email = htmlspecialchars($_POST['email']);
        $signup_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Validasi data yang dimasukkan (misalnya, pastikan email unik)
        $signup_errors = array();
        if (empty($signup_username) || empty($signup_email) || empty($signup_password)) {
            $signup_errors[] = "All fields are required.";
        }
        // Anda juga bisa menambahkan validasi lainnya sesuai kebutuhan.

        if (empty($signup_errors)) {
            // Simpan data pengguna ke dalam database
            $stmt_insert_user = mysqli_prepare($conn, "INSERT INTO user_id (username, email, password) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt_insert_user, "sss", $signup_username, $signup_email, $signup_password);
            if (mysqli_stmt_execute($stmt_insert_user)) {
                // Pengguna berhasil didaftarkan, Anda bisa mengarahkan mereka ke halaman login.
                header("Location: https://webpas.my.id/login/user.php");
                exit();
            } else {
                $signup_errors[] = "Registration failed. Please try again.";
            }
            mysqli_stmt_close($stmt_insert_user);
        } else {
            foreach ($signup_errors as $error) {
                echo $error . "<br>";
            }
        }
    }
}

// Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $login_email = htmlspecialchars($_POST['login_email']);
        $login_password = $_POST['login_password'];
        $login_errors = array();

        if (empty($login_email)) {
            $login_errors[] = "Email is required.";
        } elseif (!filter_var($login_email, FILTER_VALIDATE_EMAIL)) {
            $login_errors[] = "Invalid email format.";
        }

        if (empty($login_password)) {
            $login_errors[] = "Password is required.";
        }

        if (empty($login_errors)) {
            $stmt_check_login = mysqli_prepare($conn, "SELECT * FROM user_id WHERE email = ?");
            mysqli_stmt_bind_param($stmt_check_login, "s", $login_email);
            mysqli_stmt_execute($stmt_check_login);
            $result_check_login = mysqli_stmt_get_result($stmt_check_login);

            if (mysqli_num_rows($result_check_login) == 1) {
                $row = mysqli_fetch_assoc($result_check_login);
                if (password_verify($login_password, $row['password'])) {
                    $_SESSION['logged_in'] = true;
                    header("Location: https://webpas.my.id/login/user.php"); // Arahkan ke halaman user.php
                    exit();
                } else {
                    $login_errors[] = "Login failed. Please check your email and password.";
                }
            } else {
                $login_errors[] = "Login failed. Please check your email and password.";
            }

            mysqli_stmt_close($stmt_check_login);
        } else {
            foreach ($login_errors as $error) {
                echo $error . "<br>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <!-- <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class "icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a> -->
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="">
                <h1>Sign In</h1>
                <div class "social-icons">
                    <!-- <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a> -->
                </div>
                <span>or use your email password</span>
                <input type="email" name="login_email" placeholder="Email">
                <input type="password" name="login_password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>