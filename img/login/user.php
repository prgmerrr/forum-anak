<?php
// Mulai atau lanjutkan sesi
session_start();

// Periksa apakah pengguna sudah login, jika tidak, arahkan ke halaman login
// if (empty($_SESSION['username'])) {
//     header("Location: index.php"); // Ganti 'login.php' dengan halaman login Anda
//     exit();
// }
// Membuat koneksi ke database
$servername = "localhost"; // Sesuaikan dengan host database Anda
$username = "root"; // Sesuaikan dengan nama pengguna database Anda
$password = ""; // Sesuaikan dengan kata sandi database Anda
$dbname = "km_online"; // Sesuaikan dengan nama database Anda

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil data pengguna dari database

$logged_in_username = $_SESSION['username'];

// Ambil waktu login terakhir pengguna dari database
$query = "SELECT login_time FROM user_id WHERE username = '$logged_in_username'";
$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $login_time = $row['login_time'];
}

// Tutup koneksi database
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Item Card Hover Effect</title>
    <link rel='stylesheet' href='https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css'>
    <link rel="stylesheet" href="./style.css">

</head>
<style>
.ag-format-container {
    width: 1142px;
    margin: 0 auto;
}

body {
    background-color: #000;
}

.ag-courses_box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;

    padding: 50px 0;
}

.ag-courses_item {
    -ms-flex-preferred-size: calc(33.33333% - 30px);
    flex-basis: calc(33.33333% - 30px);

    margin: 0 15px 30px;

    overflow: hidden;

    border-radius: 28px;
}

.ag-courses-item_link {
    display: block;
    padding: 30px 20px;
    background-color: #121212;

    overflow: hidden;

    position: relative;
}

.ag-courses-item_link:hover,
.ag-courses-item_link:hover .ag-courses-item_date {
    text-decoration: none;
    color: #fff;
}

.ag-courses-item_link:hover .ag-courses-item_bg {
    -webkit-transform: scale(10);
    -ms-transform: scale(10);
    transform: scale(10);
}

.ag-courses-item_title {
    min-height: 87px;
    margin: 0 0 25px;

    overflow: hidden;

    font-weight: bold;
    font-size: 30px;
    color: #fff;

    z-index: 2;
    position: relative;
}

.ag-courses-item_date-box {
    font-size: 18px;
    color: #fff;

    z-index: 2;
    position: relative;
}

.ag-courses-item_date {
    font-weight: bold;
    color: #f9b234;

    -webkit-transition: color 0.5s ease;
    -o-transition: color 0.5s ease;
    transition: color 0.5s ease;
}

.ag-courses-item_bg {
    height: 128px;
    width: 128px;
    background-color: #f9b234;

    z-index: 1;
    position: absolute;
    top: -75px;
    right: -75px;

    border-radius: 50%;

    -webkit-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.ag-courses_item:nth-child(2n) .ag-courses-item_bg {
    background-color: #3ecd5e;
}

.ag-courses_item:nth-child(3n) .ag-courses-item_bg {
    background-color: #e44002;
}

.ag-courses_item:nth-child(4n) .ag-courses-item_bg {
    background-color: #952aff;
}

.ag-courses_item:nth-child(5n) .ag-courses-item_bg {
    background-color: #cd3e94;
}

.ag-courses_item:nth-child(6n) .ag-courses-item_bg {
    background-color: #4c49ea;
}

@media only screen and (max-width: 979px) {
    .ag-courses_item {
        -ms-flex-preferred-size: calc(50% - 30px);
        flex-basis: calc(50% - 30px);
    }

    .ag-courses-item_title {
        font-size: 24px;
    }
}

@media only screen and (max-width: 767px) {
    .ag-format-container {
        width: 96%;
    }
}

@media only screen and (max-width: 639px) {
    .ag-courses_item {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
    }

    .ag-courses-item_title {
        min-height: 72px;
        line-height: 1;

        font-size: 24px;
    }

    .ag-courses-item_link {
        padding: 22px 40px;
    }

    .ag-courses-item_date-box {
        font-size: 16px;
    }
}
</style>

<body>
    <!-- partial:index.partial.html -->
    <div class="ag-format-container">
        <div class="ag-courses_box">

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Profile & <?php echo $_SESSION['username']; ?>
                    </div>


                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            <?php echo "Login Time/Date from database"; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        UI/Web&amp;Graph design for teenagers 11-17&#160;years old
                    </div>

                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            04.11.2022
                        </span>
                    </div>
                </a>
            </div>
            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        UI/Web&amp;Graph design for teenagers 11-17&#160;years old
                    </div>

                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            04.11.2022
                        </span>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <!-- partial -->

</body>

</html>