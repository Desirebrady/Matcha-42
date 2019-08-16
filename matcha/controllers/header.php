<header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
		<h1><a href="#intro" class="scrollto">Matcha</a><?php if (!empty($_SESSION['username'])) : ?>	
				<p><?php echo $_SESSION['username']; ?> <img src="uploads/profile_pic/online.png" width="10px">
				<?php else : ?>
				Welcome Guest
                <?php endif ?></p></h1>
      </div>
<nav id="nav-menu-container">
<div class="menu">
      <ul class="sf-menu" id="example">
        <li><a href="index.php">Home</a></li>
        <li> 
          <a class="current" href="#"><?php  $notify = mysqli_query($db, "SELECT * FROM notifications WHERE toWho='$user' and seen='0'");
            echo (mysqli_num_rows($notify));?></a> 
            <ul>
              <?php foreach ($notify as $info) { ?>
              <li>
                <?php echo $info['Text'] ;?>
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