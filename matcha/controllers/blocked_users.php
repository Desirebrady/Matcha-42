<?php
session_start();
include 'connect.php';
include 'functions.php';
$sender = $_SESSION['username'];
// $sender = $_SESSION['username'];
$results = mysqli_query($db, "SELECT * FROM blocked where blocker='$sender'");
$blocklist = mysqli_fetch_all($results, MYSQLI_ASSOC);

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
<h1>Blocked users <h1>
<?php foreach ($blocklist as $list): 
    ?>
<div class="wrap2">
<?php echo $list['blocked']; ?> <a href="unblock.php?blocker=<?php echo $_SESSION['username'] ?>&blocked=<?php echo $list['blocked'] ?>"> unblock</a>
<div>
<?php endforeach; ?>
</div>
</div>
</body>
</html>