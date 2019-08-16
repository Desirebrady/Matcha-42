<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../admin/login.php');
}
if (isset($_GET['logout'])) {
    
    unset($_SESSION['username']);
    header("location: ../admin/login.php");
    session_destroy();
}
?>