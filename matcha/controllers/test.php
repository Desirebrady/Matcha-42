<?php
    session_start();

    $user = $_SESSION['username'];
    //Gets the ip-api online
    //Store the long lat in the database
    // $json = file_get_contents('http://ip-api.com/json');
    // $obj = json_decode($json);
    // $lat = $obj->lat;
    // $long = $obj->lon;
    // $_SESSION['lon'] = $long;
    // $_SESSION['lat'] = $lat;
    // //fill these values into the dataabse

    $db = mysqli_connect('localhost', 'root', '', 'matcha');
    // $username = $_SESSION['username'];
    // $query1 = "UPDATE users set lat='$lat', lon='$long'where username='$user";
    // $results = mysqli_query($db, $query1);
    $online = mysqli_query($db, "UPDATE users set online_activity='1' WHERE username='$user'");
    $checkactivity = mysqli_query($db, "SELECT online_activity FROM users WHERE username='$user' AND online_activity='1'");


    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css?v=91">
    <title>Index</title>
</head>
<body>
<header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
		<h1><a href="#intro" class="scrollto">Matcha</a><?php if (!empty($_SESSION['username'])) : ?>	
				<p>Welcome, <?php echo $_SESSION['username']; ?> <img src="uploads/profile_pic/online.png" width="10px">
				<?php else : ?>
				Welcome Guest
                <?php endif ?></p></h1>
      </div>
<nav id="nav-menu-container">
<div class="menu">
      <ul class="sf-menu" id="example">
        <li><a href="index.php">Home</a></li>
        <li class="current"> <a href="profile.php">Profile</a>
          <ul>
            <li> <a href="edit_profile.php">Edit Your Proflie </a> </li>
            <li class="current"> <a href="upload.php">Upload Profile Picture</a></li>
            <li class="current"> <a href="upload.php">Update Registration Info</a></li>
            <li class="current"> <a href="blocked_users.php">Blocked Users</a></li>
          </ul>
        </li>
        <li> <a href="inbox.php">Inbox </a>
        </li>
        <li class="current"> <a href="#">Match</a>
          <ul>
            <li> <a href="match.php">Recomended</a> </li>
            <li class="current"> <a href="blocked_users.php">Advnaced Match</a></li>
          </ul>
        </li>
        <li class="current"> <a href="">Action</a>
          <ul>
            <li> <a href="../admin/login.php">Login</a> </li>
            <li class="current"> <a a href="../admin/signup.php">Signup</a></li>
            <?php if (!empty($_SESSION['username'])) : ?>
                <li class="current"><a href="../admin/logout.php" style="color: red;">Goodbye</a></li>
                <?php endif; ?>

          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>
</body>
</html>