<?php
function toAge($birthdayDate)
{
    $dob = strtotime(str_replace("/", "-", $birthdayDate));
    $tdate = time();
    $age = 0;
    while ($tdate > $dob = strtotime('+1 year', $dob)) {
        ++$age;
    }
    return $age;
}

//Store logged in user info in a database column for long/lat
//Get you current session long/lat
//Put both these into the distance function
function distance($lat1, $lon1, $lat2, $lon2)
{

    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lon1 *= $pi80;
    $lat2 *= $pi80;
    $lon2 *= $pi80;
    $r = 6372.797; // mean radius of Earth in km 
    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;
    //echo ' '.$km; 
    return $km;
}
function ismatch($user1, $user2)
{
    $db = mysqli_connect("localhost", "root", "", "matcha");
    $youmatch = mysqli_query($db, "SELECT * FROM likes where username='$user1' AND reciever='$user2'");
    $theymatch = mysqli_query($db, "SELECT * FROM likes where username='$user2' AND reciever='$user1'");
    if (mysqli_num_rows($theymatch) > 0 && mysqli_num_rows($youmatch) > 0) {
        return (1);
    } else
        return (0);
}
function matched($user1, $user2)
{
    $db = mysqli_connect("localhost", "root", "", "matcha");
    $youmatch = mysqli_query($db, "SELECT * FROM likes where username='$user1' AND reciever='$user2'");
    $theymatch = mysqli_query($db, "SELECT * FROM likes where username='$user2' AND reciever='$user1'");
    if (mysqli_num_rows($theymatch) > 0 && mysqli_num_rows($youmatch) > 0) {
        $checkmatch = mysqli_query($db, "SELECT * FROM matched where user1='$user1' AND user2='$user2' or user1='$user2' AND user2='$user1'");
        if (mysqli_num_rows($checkmatch) == '0')
            $match =  mysqli_query($db, "INSERT INTO matched set user1='$user1', user2='$user2'");
    }
}
function is_blocked($blocker, $blocked)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require "database.php";

    $req = $pdo->prepare("SELECT * FROM blocked WHERE blocker = ? AND blocked = ?");
    $req->execute([$blocker, $blocked]);

    $res = $req->fetch();

    if ($res)
        return (true);
    return (false);
}
function is_reported($reporter, $reported)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require "database.php";

    $req = $pdo->prepare("SELECT * FROM reports WHERE reporter = ? AND reported = ?");
    $req->execute([$reporter, $reported]);

    $res = $req->fetch();

    if ($res)
        return (true);
    return (false);
}
