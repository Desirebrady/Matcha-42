<?php
require 'db.php';
include '../config/database.php';
$db = mysqli_connect('localhost', 'root', '', 'matcha');
$errors = [];

if (isset($_GET['blocker']) && isset($_GET['blocked']))
{
	$blocker = $_GET['blocker'];
	$blocked = $_GET['blocked'];

	$sql = "SELECT * FROM blocked WHERE blocker='$blocker' AND blocked='$blocked' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) < 1) {
  
    $query1 = "INSERT INTO blocked set blocker='$blocker',blocked='$blocked'";
    $results = mysqli_query($db, $query1);
    header('Location: match.php');
    // put_flash("user has been blocked");
	die();
	}
}
?>