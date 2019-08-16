<?php
require 'db.php';
include '../config/database.php';

if (isset($_GET['username']) && isset($_GET['session']))
{
	$reciever = $_GET['username'];
	$user = $_GET['session'];
    $text = $user." has liked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) < 1) {
	$query1 = "INSERT INTO likes set username='$user', reciever='$reciever'";
	
    $results = mysqli_query($conn, $query1);
	$notify = mysqli_query($conn, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
	//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");
	header('Location: match.php');
	die();
	}
}
	if (isset($_GET['username']) && isset($_GET['match1']))
{
	$reciever = $_GET['username'];
	$user = $_GET['session'];
    $text = $user." has liked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) < 1) {
  
	$query1 = "INSERT INTO likes set username='$user', reciever='$reciever'";
	
    $results = mysqli_query($conn, $query1);
	$notify = mysqli_query($conn, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
	//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");
	header('Location: match1.php');
	die();
}
}
if (isset($_GET['username']) && isset($_GET['match2']))
{
	$reciever = $_GET['username'];
	$user = $_GET['session'];
    $text = $user." has liked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) < 1) {
  
	$query1 = "INSERT INTO likes set username='$user', reciever='$reciever'";
	
    $results = mysqli_query($conn, $query1);
	$notify = mysqli_query($conn, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
	//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");
	header('Location: match2.php');
	die();
}
}
?>