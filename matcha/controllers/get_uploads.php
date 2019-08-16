<?php
include 'connect.php';
     $msg = "";
    //  $results = mysqli_query($db, "SELECT profile_pic FROM profile");
    //  $images = mysqli_fetch_all($results, MYSQLI_ASSOC);
    if (isset($_POST['upload']))
    {
        $image = $_FILES['image']['name'];
        $username = $_SESSION['username'];

  	
        $target = "uploads/profile_pic/".basename($image);
        $sql = "SELECT username FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0)
        {
            $sql = "UPDATE users set profile_pic='$image' WHERE username='$username'";
            mysqli_query($db, $sql);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
    }
    $result = mysqli_query($db, "SELECT * FROM users");
?>