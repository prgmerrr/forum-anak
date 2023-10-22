<?php
session_start();
if ($_SESSION['login'] == false) {
    header('location: login.php');
    exit; // Add exit to stop executing further code
}
?>