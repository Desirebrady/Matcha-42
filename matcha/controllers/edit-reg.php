<?php
include '../config/database.php';
session_start();

$db = mysqli_connect('localhost', 'root', '', 'matcha');
if (isset($_POST['save'])) {
    $user = $_SESSION['username'];   
    $username =  $_POST['username'];   
    $email = $_POST['email'];     

    $query1 = "UPDATE users set username='$username', email='$email' WHERE username='$user'";
    $results = mysqli_query($db, $query1);
    header('location: ../../admin/login.php');
    exit(0);
}

$sesh = $_SESSION['username'];
$myinfo = mysqli_query($db, "SELECT * FROM users where username='$sesh'");
while($row = mysqli_fetch_array($myinfo)){
  $username = $row['username'];
  $email = $row['email'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css?v=22123">
    <title>Edit Registration info</title>
<link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css?v=1">
</head>
<body>
<div class="wrap3">
<div class="clearing"></div>
<form method="POST">
          <div class="contact-form mar-top30">
            <label> <span>Username</span>
            <input type="text" name="username" class="input_text" placeholder="<?php echo $username ?>">
            </label>
            <br>
            <br>
            <label> <span>Email</span>
            <input type="text" name="email" class="input_text"placeholder="<?php echo $email ?>">
            </label>
            <br>
            <br>
           
          </div>
          <button type="submit" name="save">SAVE</button>
        </form>
</div>
</div>

