<?php
    session_start();
    include('../admin/isok.php');

    $user = $_SESSION['username'];
    // Gets the ip-api online
    // Store the long lat in the database
    $json = file_get_contents('http://ip-api.com/json');
    $obj = json_decode($json);
    $lat = $obj->lat;
    $long = $obj->lon;
    $_SESSION['lon'] = $long;
    $_SESSION['lat'] = $lat;
    //fill these values into the dataabse

    $db = mysqli_connect('localhost', 'root', '', 'matcha');
    // $username = $_SESSION['username'];
    // $query1 = "UPDATE users set lat='$lat', lon='$long'where username='$user";
    // $results = mysqli_query($db, $query1);
    $online = mysqli_query($db, "UPDATE users set online_activity='1',lat='$lat', lon='$long' WHERE username='$user'");
    $checkactivity = mysqli_query($db, "SELECT online_activity FROM users WHERE username='$user' AND online_activity='1'");
    $notify = mysqli_query($db, "SELECT * FROM notifications WHERE toWho='$user'");
    // $firstime = mysqli_query($db, "SELECT gender FROM users WHERE username='$user' AND gender='Unknown'");
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
<?php $firstime = mysqli_query($db, "SELECT * FROM users where username='$user'");
while($row = mysqli_fetch_array($firstime)){
  $sex = $row['gender'];
}
if($sex == 'Unknown') {?>
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
</nav>
</header>

<?php } else {?>
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
        <li>
          <a href="index.php">Home</a>
        </li>
        <li> 
          <a class="current" href="#"><?php  $notify = mysqli_query($db, "SELECT * FROM notifications WHERE toWho='$user' and seen='0'");
            echo (mysqli_num_rows($notify));?></a> 
            <ul>
              <?php foreach ($notify as $info) { ?>
              <li>
                <?php echo $info['Text']; ?>
                from: <?php echo $info['fromWho']; ?>
              </li>
              <?php } $delet = mysqli_query($db, "DELETE FROM notifications WHERE toWho='$user'");?>
            </ul>
        </li>
        <li class="current"> <a href="profile.php">Profile</a>
          <ul>
            <li> <a href="edit_profile.php">Edit Your Proflie </a> </li>
            <li class="current"> <a href="upload.php">Upload Profile Picture</a></li>
            <li class="current"> <a href="edit-reg.php">Update Registration Info</a></li>
            <li class="current"> <a href="blocked_users.php">Blocked Users</a></li>
          </ul>
        </li>
        <li> <a href="inbox.php">Inbox </a>
        </li>  
        <li class="current"> <a href="#">Match</a>
     
        <ul>
            <li> <a href="match.php">Recomended</a> </li>
            <li class="current"> <a href="match1.php">By Age</a></li>
            <li class="current"> <a href="match2.php">By location</a></li>
          </ul>
        </li>
        <li class="current"> <a href="">Action</a>
          <ul>
            
            <li class="current"> <a a href="../admin/signup.php">Signup</a></li>
            <?php if (!empty($_SESSION['username'])) : ?>
                <li class="current"><a href="../admin/logout.php" style="color: red;">Goodbye</a></li>
                <?php endif; ?>

          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
</header>
<?php } ?>
<br>
<br>
<br>
<br>
<br><?php $myinfo = mysqli_query($db, "SELECT * FROM users where username='$user'");
while($row = mysqli_fetch_array($myinfo)){
  $sex = $row['gender'];
}
if($sex == 'Male') {?>
<div class="wrap2">
<div class="banner-container">
  <div class="banner"> <img src="../img/public/banner-img.jpg">
    <div class="banner-shadows"></div>
  </div>
  
  <div class="title">
      <h1>LETS BEGIN A GIRL LIKE HER COULD BE WAITING.</h1>
    </div>
<div class="clearing"></div>
</div>
</div>
  <?php } elseif ($sex == 'Other'){?>
    <div class="wrap2">
<div class="banner-container">
  <div class="banner"> <img src="../img/public/bg.png" width="880" height="390">
    <div class="banner-shadows"></div>
  </div>
  
  <div class="title">
      <h1>LETS BEGIN YOUR SOULMATE IS WAITING.</h1>
    </div>
<div class="clearing"></div>
</div>
</div>
<?php }
elseif ($sex == 'Unknown') {?>
<div class="wrap2">
<div class="banner-container">
  <div class="banner"> <img src="../img/public/hearts.png" width="880" height="390">
    <div class="banner-shadows"></div>
  </div>
  
  <div class="title">
      <h1>LETS BEGIN BY FIXING YOUR PROFILE. <a href="firstime.php" style="font-size:48px;">BEGIN</a></h1>
    </div>
<div class="clearing"></div>
</div>
</div>
  <?php }
else {?>
<div class="wrap2">
<div class="banner-container">
  <div class="banner"> <img src="../img/public/bg2.png" width="880" height="390">
    <div class="banner-shadows"></div>
  </div>
  
  <div class="title">
      <h1>LETS BEGIN A BOY LIKE HIM COULD BE WAITING.</h1>
    </div>
<div class="clearing"></div>
</div>
</div>
  <?php } ?>
  
</body>
</html>