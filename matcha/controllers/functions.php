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
    function distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $rad = M_PI / 180;
        //Calculate distance from latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin($latitudeFrom * $rad)
            * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
            * cos($latitudeTo * $rad) * cos($theta * $rad);

        return acos($dist) / $rad * 60 *  1.853;
    }

    function ismatch($user1, $user2)
    {
        $db = mysqli_connect("localhost","root","","matcha");
        $youmatch = mysqli_query($db, "SELECT * FROM likes where username='$user1' AND reciever='$user2'");
        $theymatch = mysqli_query($db, "SELECT * FROM likes where username='$user2' AND reciever='$user1'");
        if (mysqli_num_rows($theymatch) > 0 && mysqli_num_rows($youmatch) > 0 ){
            return (1);
        }
        else
            return (0);
    }
    function matched($user1, $user2)
    {
        $db = mysqli_connect("localhost","root","","matcha");
        $youmatch = mysqli_query($db, "SELECT * FROM likes where username='$user1' AND reciever='$user2'");
        $theymatch = mysqli_query($db, "SELECT * FROM likes where username='$user2' AND reciever='$user1'");
        if (mysqli_num_rows($theymatch) > 0 && mysqli_num_rows($youmatch) > 0 ){
            $checkmatch = mysqli_query($db, "SELECT * FROM matched where user1='$user1' AND user2='$user2' or user1='$user2' AND user2='$user1'");
            if (mysqli_num_rows($checkmatch) == '0')
                $match =  mysqli_query($db, "INSERT INTO matched set user1='$user1', user2='$user2'");
        }
    }
    function is_blocked($blocker, $blocked){
        if (session_status() == PHP_SESSION_NONE) { session_start(); }

        require "database.php";

        $req = $pdo->prepare("SELECT * FROM blocked WHERE blocker = ? AND blocked = ?");
        $req->execute([$blocker, $blocked]);

        $res = $req->fetch();

        if ($res)
            return (true);
        return (false);
    }
    ?>