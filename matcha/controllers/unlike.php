<?php
require 'db.php';
include '../config/database.php';
$db = mysqli_connect('localhost', 'root', '', 'matcha');


if (isset($_GET['username']) && !isset($_GET['matchAge']) && !isset($_GET['matchLocation'])) {
	$reciever = $_GET['username'];
	$user = $_GET['session'];

	$text = $user . " has Unliked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) > 0) {
		$query1 = "DELETE FROM likes WHERE username='$user' AND reciever='$reciever'";
		$notify = mysqli_query($db, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
		$results = mysqli_query($db, $query1);
		header('Location: match.php');
		die();
	} else {
		echo "Nothing to delete";

		//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");

	}
}
if (isset($_GET['username']) && isset($_GET['matchAge']) && !isset($_GET['matchLocation'])) {
	$reciever = $_GET['username'];
	$user = $_GET['session'];

	$text = $user . " has Unliked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) > 0) {
		$query1 = "DELETE FROM likes WHERE username='$user' AND reciever='$reciever'";
		$notify = mysqli_query($db, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
		$results = mysqli_query($db, $query1);
		header('Location: matchAge.php');
		die();
	} else {
		echo "Nothing to delete";

		//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");

	}
}
if (isset($_GET['username']) && isset($_GET['matchLocation']) && !isset($_GET['matchAge'])) {
	$reciever = $_GET['username'];
	$user = $_GET['session'];

	$text = $user . " has Unliked your profile";

	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever' LIMIT 1";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) > 0) {
		$query1 = "DELETE FROM likes WHERE username='$user' AND reciever='$reciever'";
		$notify = mysqli_query($db, "INSERT INTO notifications set fromWho='$user', toWho='$reciever', Text='$text'");
		$results = mysqli_query($db, $query1);
		header('Location: matchLocation.php');
		die();
	} else {
		echo "Nothing to delete";

		//$db->query("UPDATE likes SET username='desire', reciever='$reciever' ");

	}
}
