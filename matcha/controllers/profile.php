<?php
include '../config/database.php';
session_start();
$user = $_SESSION['username'];
$db = mysqli_connect('localhost', 'root', '', 'matcha');
$sql = mysqli_query($db, "SELECT * from users where username='$user'");
$profile = mysqli_fetch_all($sql, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css">
  <title>Profile</title>
</head>

<body>
  <header id="header">
    <div id="logo" class="pull-left">
      <h1><a href="#intro" class="scrollto">Matcha</a><?php if (!empty($_SESSION['username'])) : ?>
          <p><?php echo $_SESSION['username']; ?> <img src="uploads/profile_pic/online.png" width="10px">
          <?php else : ?>
            Welcome Guest
          <?php endif ?></p>
      </h1>
    </div>
    <nav id="nav-menu-container">
      <div class="menu">
        <ul class="sf-menu" id="example">
          <li><a href="index.php">Home</a></li>
          <li>
            <a class="current" href="#"><?php $notify = mysqli_query($db, "SELECT * FROM notifications WHERE toWho='$user' and seen='0'");
                                        echo (mysqli_num_rows($notify)); ?></a>
            <ul>
              <?php foreach ($notify as $info) { ?>
                <li>
                  <?php echo $info['Text']; ?>
                </li>
              <?php }
              $delet = mysqli_query($db, "DELETE FROM notifications WHERE toWho='$user'"); ?>
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
              <li class="current"> <a href="matchAge.php">By Age</a></li>
              <li class="current"> <a href="matchLocation.php">By location</a></li>
            </ul>
          </li>
          <li class="current"> <a href="">Action</a>
            <ul>
              <?php if (!empty($_SESSION['username'])) : ?>
                <li class="current"><a href="../admin/logout.php" style="color: red;">Goodbye</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="container-fluid">
    <div class="row" style="margin-top: 10%;">
      <div class="col">
        <?php foreach ($profile as $user) : ?>
          <div class="feeds">
            <div class="feed">
              <div class="feed-image">
                <img src="<?php echo 'uploads/profile_pic/' . $user['profile_pic'] ?>" width="450px" alt="">
              </div>
              <div class="feed-header">
                Firstname : <?php echo $user['firstname']; ?>
                <br>
                Lastname : <?php echo $user['lastname']; ?>
                <br>
                Bio : <?php echo $user['bio']; ?>
                <br>
                Gender : <?php echo $user['gender']; ?>
                <br>
                Location : <?php echo $user['location']; ?>
                <br>
                Interests : #<?php echo $user['tag1']; ?> #<?php echo $user['tag2']; ?> #<?php echo $user['tag3']; ?>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</body>

</html>