<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika pengguna tidak login, arahkan kembali ke halaman login
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_info = [
    'username' => '',
    'email' => '',
    'laporan' => '', // Tambahkan data laporan ke dalam $user_info
];

$servername = "localhost";
$db_username = "root";
$password = "";
$db = "km_online";
$conn = mysqli_connect($servername, $db_username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$stmt_get_user_info = mysqli_prepare($conn, "SELECT username, email, laporan FROM user_id WHERE id = ?");
mysqli_stmt_bind_param($stmt_get_user_info, "i", $user_id);
mysqli_stmt_execute($stmt_get_user_info);
$result_user_info = mysqli_stmt_get_result($stmt_get_user_info);

if ($result_user_info) {
    $row = mysqli_fetch_assoc($result_user_info);
    if (isset($row['username'])) {
        $user_info['username'] = $row['username'];
    }
    if (isset($row['email'])) {
        $user_info['email'] = $row['email'];
    }
    if (isset($row['laporan'])) {
        $user_info['laporan'] = $row['laporan']; // Ambil data laporan
    }
} else {
    echo "Failed to fetch user information.";
}

mysqli_stmt_close($stmt_get_user_info);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Page</title>
    <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'>
    <link rel="stylesheet" href="user.css">
    <link rel="preload" as="style" href="user.css">
</head>

<body>
    <script type="text/javascript">
    window.$crisp = [];
    window.CRISP_WEBSITE_ID = "67d2c87d-9a17-4a0a-92da-491996da7500";
    (function() {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
    })();
    </script>
    <div class="ag-format-container">
        <div class="ag-courses_box">
            <div class="ag-courses_item">
                <a href="profile.php" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        Hallo <?php echo $user_info['username']; ?>!
                        <p><?php echo $user_info['email']; ?></p>
                    </div>
                    <div class="ag-courses-item_date-box">
                        Start:
                        </span>
                    </div>
                </a>
            </div>
            <div class="ag-courses_item">
                <a href="profile.php" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        Laporan:
                        <p><?php echo $user_info['laporan']; ?></p> <!-- Menampilkan data laporan -->
                    </div>
                    <div class="ag-courses-item_date-box">
                        Start:
                        </span>
                    </div>
                </a>
            </div>
            <div class="ag-courses_item">
                <a href="profile.php" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        Hallo <?php echo $user_info['username']; ?>!
                        <p><?php echo $user_info['email']; ?></p>
                    </div>
                    <div class="ag-courses-item_date-box">
                        Start:
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>