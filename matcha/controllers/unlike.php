<?php
require 'db.php';
include '../config/database.php';
$db = mysqli_connect('localhost', 'root', '', 'matcha');


if (isset($_GET['username']) && !isset($_GET['match1'])&& !isset($_GET['match2']))
{
	$reciever = $_GET['username'];
	$user = $_GET['session'];

	$text = $user." has Unliked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
	   $query1 = "DELETE FROM likes WHERE username='$user' AND reciever='$reciever'";
	   $notify = mysqli_query($db, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
	   $results = mysqli_query($db, $query1);
	   header('Location: match.php');
	die();
	}
	else{
		echo "Nothing to delete"; 

	//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");
	
	}
}
if (isset($_GET['username']) && isset($_GET['match1']) && !isset($_GET['match2']))
{
	$reciever = $_GET['username'];
	$user = $_GET['session'];

	$text = $user." has Unliked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
	   $query1 = "DELETE FROM likes WHERE username='$user' AND reciever='$reciever'";
	   $notify = mysqli_query($db, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
	   $results = mysqli_query($db, $query1);
	   header('Location: match1.php');
	die();
	}
	else{
		echo "Nothing to delete"; 

	//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");
	
	}
}
if (isset($_GET['username']) && isset($_GET['match2']) && !isset($_GET['match1']))
{
	$reciever = $_GET['username'];
	$user = $_GET['session'];

	$text = $user." has Unliked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
	   $query1 = "DELETE FROM likes WHERE username='$user' AND reciever='$reciever'";
	   $notify = mysqli_query($db, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
	   $results = mysqli_query($db, $query1);
	   header('Location: match2.php');
	die();
	}
	else{
		echo "Nothing to delete"; 

	//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");
	
	}
}
?>