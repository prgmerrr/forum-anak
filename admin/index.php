<?php

require_once "info_index.php"

    ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/logo.jpg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Chart list Js -->
    <link rel="stylesheet" href="./js/chartist/chartist.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body class="sidebar-main-active right-column-fixed header-top-bgcolor">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
                <a href="index.html">
                    <div class="iq-light-logo">
                        <div class="iq-light-logo">
                            <img src="images/logo.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="iq-dark-logo">
                            <img src="images/logo-dark.gif" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="iq-dark-logo">
                        <img src="images/logo-dark.gif" class="img-fluid" alt="">
                    </div>
                    <span>Admin</span>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                            <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Home</span></li>
                        <li class="active">
                            <a href="index.html" class="iq-waves-effect"><i
                                    class="ri-home-4-line"></i><span>Dashboard</span></a>
                        </li>
                        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Apps</span></li>


                        <li>
                            <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><i class="ri-user-line"></i><span>User</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li><a href="profile.html"><i class="ri-profile-line"></i>User Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="https://crisp.chat/en/" class="iq-waves-effect"><i
                                    class="ri-message-line"></i><span>Chat</span></a></li>

                        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>User</span></li>
                        <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                        </li>
                        <li>
                            <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><i class="ri-profile-line"></i><span>Laporan</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="forms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li><a href="lapo-adm"><i class="ri-tablet-line"></i>Lihat laporan</a></li>
                            </ul>
                        </li>

                        <li>
                        <li>
                            <a href="#authentication" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><i class="ri-pages-line"></i><span>Aspirasi</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="authentication" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li><a href="asp-adm/"><i class="ri-login-box-line"></i>Lihat aspirasi</a>
                                </li>
                            </ul>
                        </li>

                        </li>
                        <li>
                            <a href="#charts" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><i class="ri-pie-chart-box-line"></i><span>twt</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="charts" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li><a href="twt"><i class="ri-file-chart-line"></i>Lihat twt</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#charts" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><i class="ri-pie-chart-box-line"></i><span>pamer</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="charts" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li><a href="postingan.php"><i class="ri-file-chart-line"></i>Lihat postingan</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="p-3"></div>
            </div>
        </div>
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <div class="iq-sidebar-logo">
                    <div class="top-logo">
                        <a href="index.html" class="logo">
                            <div class="iq-light-logo">
                                <img src="images/logo.gif" class="img-fluid" alt="">
                            </div>
                            <div class="iq-dark-logo">
                                <img src="images/logo-dark.gif" class="img-fluid" alt="">
                            </div>
                            <span>admin</span>
                        </a>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="navbar-left">
                        <ul id="topbar-data-icon" class="d-flex p-0 topbar-menu-icon">
                            <li class="nav-item">

                            </li>

                        </ul>
                        <div class="iq-search-bar d-none d-md-block">
                            <form action="#" class="searchbox">

                        </div>
                        </form>
                    </div>
            </div>
            <ul class="navbar-list">
                <li>
                    <a style="display: flex; align-items: center; justify-content: flex-start;" href="#"
                        class="search-toggle iq-waves-effect d-flex align-items-center bg-primary rounded">
                        <img src="images/user/1.jpg" class="img-fluid rounded mr-1" alt="user">
                        <div class="caption">
                            <h6 class="mb-9 line-height text-white">
                                <?php echo "$username" ?>
                            </h6>
                            <span class="font-size-12 text-white">Available</span>
                        </div>
                    </a>

                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello
                                        <?php echo "$username" ?>
                                    </h5>
                                    <span class="text-white font-size-12">Available</span>
                                </div>
                                <a href="https://crisp.chat/en/" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-lock-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">Chat</h6>
                                            <p class="mb-0 font-size-12">
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-inline-block w-100 text-center p-3">
                                    <a class="btn btn-primary dark-btn-primary" href="logout.php" role="button">Sign
                                        out<i class="ri-login-box-line ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            </nav>


        </div>
    </div>
    <!-- TOP Nav Bar END -->
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch ">
                        <div class="iq-card-body">
                            <div class="d-flex d-flex align-items-center justify-content-between">
                                <div>
                                    <h2>33</h2>
                                    <p class="fontsize-sm m-0">Provinsi</p>
                                </div>
                                <div class="rounded-circle iq-card-icon dark-icon-light iq-bg-primary "> <i
                                        class="ri-inbox-fill"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch ">

                        <div class="iq-card-body">
                            <div class="d-flex d-flex align-items-center justify-content-between">
                                <div>
                                    <h2>468</h2>
                                    <p class="fontsize-sm m-0">Kabupaten/Kota</p>
                                </div>
                                <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-radar-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch ">
                        <div class="iq-card-body">
                            <div class="d-flex d-flex align-items-center justify-content-between">
                                <div>
                                    <h2>339</h2>
                                    <p class="fontsize-sm m-0">Kecamatan</p>
                                </div>
                                <div class="rounded-circle iq-card-icon iq-bg-warning "><i
                                        class="ri-price-tag-3-line"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch ">
                        <div class="iq-card-body">
                            <div class="d-flex d-flex align-items-center justify-content-between">
                                <div>
                                    <h2>271</h2>
                                    <p class="fontsize-sm m-0">Desa</p>
                                </div>
                                <div class="rounded-circle iq-card-icon iq-bg-info "><i class="ri-refund-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-7">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">User Stats</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="home-chart-02"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height" style="background: transparent;">
                        <div class="iq-card-body rounded p-0"
                            style="background: url(images/page-img/01.png) no-repeat;    background-size: cover; height: 415px;">
                            <div class="iq-caption">
                                <h1>
                                    <?php echo "$totalUsers" ?>
                                </h1>
                                <p>USER</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">laporan</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                        data-toggle="dropdown">

                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Kasus</th>
                                            <th scope="col" class="text-right">id</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($laporans as $laporan): ?>
                                        <tr>
                                            <td>
                                                <?php echo substr($laporan['nama'], 0, 15); ?>
                                            </td>
                                            <td>
                                                <?php echo substr($laporan['timestamp'], 0, 15); ?>
                                            </td>
                                            <td>
                                                <?php echo substr($laporan['pilihan_kasus'], 0, 15); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo substr($laporan['user_id'], 0, 15); ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="badge badge-pill ">
                                                    <?php echo substr($laporan['status_text'], 0, 15); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="lapo-adm"> <i
                                                        class="ri-ball-pen-fill text-success pr-1"></i></a>
                                                <a href="lapo-adm"
                                                    onclick="return confirm('Are you sure you want to delete this report?')">
                                                    <i class="ri-delete-bin-5-line text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <?php if ($laporan['pilihan_kasus'] === 'serius'): ?>
                                        <tr>
                                            <td>
                                                <?php echo substr($laporan['nama'], 0, 15); ?>
                                            </td>
                                            <td>
                                                <?php echo substr($laporan['timestamp'], 0, 15); ?>
                                            </td>
                                            <td>
                                                <?php echo substr($laporan['pilihan_kasus'], 0, 15); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo substr($laporan['user_id'], 0, 15); ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="badge badge-pill ">
                                                    <?php echo substr($laporan['status_text'], 0, 15); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <a href=""> <i class="ri-ball-pen-fill text-success pr-1"></i></a>
                                                <a href=""> <i class="ri-delete-bin-5-line text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-right-fixed">
                    <div class="iq-card mb-0" style="box-shadow: none;">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">TWT</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton-five">
                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                        <a class="dropdown-item" hre f="#"><i class="ri-delete-bin
                                                   -6-fill mr-2"></i>Delete</a>
                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php

                        $posts = getUserPosts();
                        foreach ($posts as $post) {
                            echo '<li class="d-flex mb-4 align-items-center">';
                            echo '<div class="><span><i class="ri-check-fill"></i></span></div>';
                            echo '<div class="media-support-info ml-3">';
                            echo '<h6>' . (isset($post['username']) ? $post['username'] : 'Nama Pengguna Tidak Tersedia') . '</h6>';
                            echo '<p class="mb-0 fontsize-sm"><span class="text-success">' . $post['post_date'] . '</span>' . $post['content'] . '</p>';
                            echo '<form method="POST" action="">';
                            echo '<input type="hidden" name="post_id" value="' . $post['post_id'] . '">';
                            echo '<button type="submit" name="delete_post">Hapus</button>';
                            echo '</div>';
                            echo '<div class="media-support-amount ml-3">';
                            echo '<h6><span class="text-secondary"></span><b></b></h6>';
                            echo '<p class="mb-0 d-flex justify-content-end""' . $post['post_date'] . '"</p>';
                            echo '</div>';
                            echo '</li>';
                        }
                        ?>
                    </div>
                </div>
            </div>



        </div>
    </div>
    </div>

    </div>
    </div>

    </div>

    </div>


    </div>




    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2020 <a href="#">Vito</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>


    <!-- Footer END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="js/jquery.min.js"></script>

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="js/select2.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="js/smooth-scrollbar.js"></script>
    <!-- lottie JavaScript -->
    <script src="js/lottie.js"></script>
    <!-- am core JavaScript -->
    <script src="js/core.js"></script>
    <!-- am charts JavaScript -->
    <script src="js/charts.js"></script>
    <!-- am animated JavaScript -->
    <script src="js/animated.js"></script>
    <!-- am kelly JavaScript -->
    <script src="js/kelly.js"></script>
    <!-- Morris JavaScript -->
    <script src="js/morris.js"></script>
    <!-- am maps JavaScript -->
    <script src="js/maps.js"></script>
    <!-- am worldLow JavaScript -->
    <script src="js/worldLow.js"></script>
    <!-- ChartList Js -->
    <script src="js/chartist/chartist.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script async src="js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>