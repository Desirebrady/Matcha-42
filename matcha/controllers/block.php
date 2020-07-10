<?php
require 'db.php';
include '../config/database.php';
$db = mysqli_connect('localhost', 'root', '', 'matcha');
$errors = [];
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);


if (isset($_GET['blocker']) && isset($_GET['blocked'])) {
    $blocker = $_GET['blocker'];
    $blocked = $_GET['blocked'];

    $sql = "SELECT * FROM blocked WHERE blocker='$blocker' AND blocked='$blocked' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) < 1) {

        $query1 = "INSERT INTO blocked set blocker='$blocker',blocked='$blocked'";
        $results = mysqli_query($db, $query1);
        header('Location: ' . $url);
        // put_flash("user has been blocked");
        die();
    }
}

if (isset($_GET['reporter']) && isset($_GET['reported'])) {
    $reporter = $_GET['reporter'];
    $reported = $_GET['reported'];

    $sql = "SELECT * FROM reports WHERE reporter='$reporter' AND reported='$reported' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) < 1) {

        $query1 = "INSERT INTO reports set reporter='$reporter',reported='$reported'";
        $results = mysqli_query($db, $query1);
        header('Location: ' . $url);
        // put_flash("user has been blocked");
        die();
    }
}
