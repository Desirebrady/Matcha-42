<?php
include 'connect.php';
$results = mysqli_query($db, "SELECT profile_pic FROM profile");
     $images = mysqli_fetch_all($results, MYSQLI_ASSOC);
$result = mysqli_query($db, "SELECT * FROM profile");
?>