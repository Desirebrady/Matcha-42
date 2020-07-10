<?php
require 'db.php';
include '../config/database.php';
session_start();
$db = mysqli_connect('localhost', 'root', '', 'matcha');
$reciever = $_GET['username'];
$user = $_SESSION['username'];
if (mysqli_query($db, "SELECT * views where username='$reciever' and visitor='$user'") == 0) {
  $view = mysqli_query($db, "INSERT INTO views set username='$reciever', visitor='$user'");
  $fame = mysqli_query($db, "UPDATE users set fame = fame + 5 where username='$reciever'");
}

$sql = "SELECT * FROM users WHERE username='$reciever'LIMIT 1";
$viewProfile = mysqli_query($db, $sql);

$sql = "SELECT * FROM likes WHERE username='$user' or username='$reciever' AND reciever='$reciever' or reciever='$user'";
$likes = mysqli_query($db, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css?v=7898">
  <title>Document</title>
</head>

<body>
  <?php include "header.php"; ?>
  <div class="container-fluid">
    <div class="row" style="margin-top: 5%;">
      <?php foreach ($viewProfile as $profile) ?>
      <div class="feeds">
        <div class="feed">
          <div class="feed-image">
            <img src="uploads/profile_pic/<?php echo $profile['profile_pic'] ?>" width="500px" height="599px">
          </div>
          <div class="feed-header">
            Firstname : <?php echo $profile['firstname']; ?>
            <br>
            Lastname : <?php echo $profile['lastname']; ?>
            <br>
            Bio : <?php echo $profile['bio']; ?>
            <br>
            Gender : <?php echo $profile['gender']; ?>
            <br>
            Age : <?php echo $profile['age']; ?>
            <br>
            lastseen : <?php echo $profile['lastseen']; ?>
            <br>
            Interests : #<?php echo $profile['tag1']; ?> #<?php echo $profile['tag2']; ?> #<?php echo $profile['tag3']; ?>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>

</html>