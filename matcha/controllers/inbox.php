<?php
session_start();
include 'connect.php';
include 'functions.php';
$sender = $_SESSION['username'];
// $sender = $_SESSION['username'];
$results = mysqli_query($db, "SELECT * FROM users where username='$sender'");
$images = mysqli_fetch_all($results, MYSQLI_ASSOC);
$inbox = mysqli_query($db, "SELECT * FROM massages where username='$sender' ");
$massages = mysqli_fetch_all($inbox, MYSQLI_ASSOC);
$matches = mysqli_query($db, "SELECT * FROM matched where user1='$sender' or user2='$sender'");
$matched = mysqli_fetch_all($matches, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css?">
    <title>Document</title>
</head>
<body>
<?php include "header.php"; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<h1>Your Inbox <h1>
<?php foreach ($matched as $contacts): 
    ?>
<div class="wrap2">

<?php if (($contacts['user1'] != $_SESSION['username']) && !is_blocked($_SESSION['username'], $contacts['user1'])) {?><div class="chat_list">
<a href="chat.php?sender=<?php echo $contacts['user1'] ?>"><?php echo $contacts['user1'] ?></a></div>
<?php } elseif (($contacts['user2'] != $_SESSION['username']) && !is_blocked($_SESSION['username'], $contacts['user2'])){?><div class="chat_list">
<a href="chat.php?sender=<?php echo $contacts['user2'] ?>"><?php echo $contacts['user2'] ?></a></div>
<?php }else?>
<div>
<?php endforeach; ?>
</div>
</div>
</body>
</html>