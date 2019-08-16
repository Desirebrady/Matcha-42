<?php
require 'db.php';
include '../config/database.php';
$db = mysqli_connect('localhost', 'root', '', 'matcha');


if (isset($_GET['blocker']) && isset($_GET['blocked']))
{
	$blocker = $_GET['blocker'];
	$blocked = $_GET['blocked'];

    $query1 = "DELETE FROM blocked where blocker='$blocker' AND blocked='$blocked'";
    $results = mysqli_query($db, $query1);
    header('Location: blocked_users.php');
    // put_flash("user has been blocked");
	die();
}
?>