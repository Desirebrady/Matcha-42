<?php
session_start();
include     'connect.php';
include     'functions.php';

$session = $_SESSION['username'];
$results = mysqli_query($db, "SELECT * FROM users ");
$myinfo = mysqli_query($db, "SELECT * FROM users where username='$session' ");
// while($row = mysqli_fetch_array($myinfo)){
//   $sex = $row['gender'];
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css?v=2343">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Advanced Match</title>

</head>
<body>
<?php include "header.php"; ?>
<br>
<br>
<br>
<br>
<br>
			<center>
				<form method="POST" action="">
								<div class="wthree-field">
							<input type="submit" name="0btnage" value="0-50km" class="btn btn-primary">
								</div>
								<div class="wthree-field">
							<input type="submit" name="50btnage" value="50-100km" class="btn btn-primary">
								<div class="wthree-field">
								</div>
							<input type="submit" name="100btnage" value="100+km" class="btn btn-primary">
								</div>
				</form>
				<br>
			</center>
<!-- put_flash();updte the message below -->
<h2><p> Showing users by distance, click their image to view more about them</p></h2>
<div class="wrap5">
<?php if (isset($_POST['0btnage'])) { ?>
 <?php foreach ($results as $result)
 {
	 
		$dist = round(distance($result['lat'], $result['lon'], isset($_SESSION['lat']), isset($_SESSION['lon'])));
		if ($result['username'] != $_SESSION['username'] && $dist < 50 && !is_blocked($_SESSION['username'], $result['username']) && isset($_SESSION['username']))
		{
	?>
<div class="card">
<a href="block.php?blocker=<?php echo $_SESSION['username'] ?>&blocked=<?php echo $result['username']?>">Block </a>
or
<a href="#"> Report </a> 
<a href="view_profile.php?username=<?php echo $result['username']; ?>"><img src="uploads/profile_pic/<?php echo $result['profile_pic'] ?>" style="width:100%; height:300px" onclick="openForm()"> </a>
	<p class="title"><?php echo $result['firstname']; ?></p>
	<div style="margin: 24px 0;">

 <?php
 $user = $_SESSION['username'];
 $reciever = $result['username'];
	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever'";
	$likes = mysqli_query($db, $sql);
	$ismatch = mysqli_query($db, "SELECT * FROM likes where username='$user' AND reciever='$reciever' or username='$reciever' or reciever='$user'");
	?>
 <?php if(mysqli_num_rows($likes) == 0) { ?>
		<a href="plus_like.php?username=<?php echo $result['username'] ?>&session=<?php echo $_SESSION['username'] ?>">like </a>
 <?php } else{ ?>
	<a href="unlike.php?username=<?php echo $result['username'] ?>&session=<?php echo $_SESSION['username'] ?>">Unlike </a>
			<?php } ?>
			<?php  if(ismatch($user, $reciever) == 1){
				matched($user, $reciever);?>
				<a href="chat.php?sender=<?php echo $result['username'] ?>">Chat Now!</a>
				<?php } else{ ?>
					<?php } ?>
</div>
 <?php }} ?>   
	 <script>
function openForm() {
		document.getElementById("myForm").style.display = "block";
}

function closeForm() {
		document.getElementById("myForm").style.display = "none";
}
</script>

<?php } ?>

<?php if (isset($_POST['50btnage'])) { ?>
 <?php foreach ($results as $result)
 {
		
		$dist = distance($result['lat'], $result['lon'], isset($_SESSION['lat']), isset($_SESSION['lon']));
		if ($result['username'] != $_SESSION['username'] && $dist > 50 && !is_blocked($_SESSION['username'], $result['username']) && isset($_SESSION['username']))
		{
	?>
<div class="card">
<a href="block.php?blocker=<?php echo $_SESSION['username'] ?>&blocked=<?php echo $result['username']?>">Block </a>
or
<a href="#"> Report </a> 
<a href="view_profile.php?username=<?php echo $result['username']; ?>"><img src="uploads/profile_pic/<?php echo $result['profile_pic'] ?>" style="width:100%; height:300px" onclick="openForm()"> </a>
	<p class="title"><?php echo $result['firstname']; ?></p>
	<div style="margin: 24px 0;">
	 <!-- <?php echo $result['bio']; ?>
	 <br> -->
	 <!-- Sex : <?php echo $result['gender']; ?><br>
	 Distance : <?php echo $dist . " Km away."; ?><br>
	 lastseen : <?php echo $result['lastseen']; ?> -->
 </div>
	<!-- <div> -->
	<!-- <div class="chat-popup" id="myForm">
firstname : <?php echo $result['firstname']; ?><br>
lastaname : <?php echo $result['lastname']; ?><br>
bio <?php echo $result['bio']; ?>
	 <br>
	 Sex : <?php echo $result['gender']; ?><br>
	 Age : <?php echo $result['age']; ?><br>
	 lastseen : <?php echo $result['lastseen']; ?>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	</form>
</div>
</div> -->
 <?php
 $user = $_SESSION['username'];
 $reciever = $result['username'];
	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever'";
	$likes = mysqli_query($db, $sql);
	$ismatch = mysqli_query($db, "SELECT * FROM likes where username='$user' AND reciever='$reciever' or username='$reciever' or reciever='$user'");
	?>
 <?php if(mysqli_num_rows($likes) == 0) { ?>
		<a href="plus_like.php?username=<?php echo $result['username'] ?>&session=<?php echo $_SESSION['username'] ?>">like </a>
 <?php } else{ ?>
	<a href="unlike.php?username=<?php echo $result['username'] ?>&session=<?php echo $_SESSION['username'] ?>">Unlike </a>
			<?php } ?>
			<?php  if(ismatch($user, $reciever) == 1){
				matched($user, $reciever);?>
				<a href="chat.php?sender=<?php echo $result['username'] ?>">Chat Now!</a>
				<?php } else{ ?>
					<?php } ?>
</div>
 <?php }} ?>   
	 <script>
function openForm() {
		document.getElementById("myForm").style.display = "block";
}

function closeForm() {
		document.getElementById("myForm").style.display = "none";
}
</script>

<?php } ?>
<?php if (isset($_POST['100btnage'])) { ?>
 <?php foreach ($results as $result)
 {
	 
		$dist = distance($result['lat'], $result['lon'], isset($_SESSION['lat']), isset($_SESSION['lon']));
		if ($result['username'] != $_SESSION['username'] && $dist > 100 && !is_blocked($_SESSION['username'], $result['username']) && isset($_SESSION['username']))
		{
	?>
<div class="card">
<a href="block.php?blocker=<?php echo $_SESSION['username'] ?>&blocked=<?php echo $result['username']?>">Block </a>
or
<a href="#"> Report </a> 
<a href="view_profile.php?username=<?php echo $result['username']; ?>"><img src="uploads/profile_pic/<?php echo $result['profile_pic'] ?>" style="width:100%; height:300px" onclick="openForm()"> </a>
	<p class="title"><?php echo $result['firstname']; ?></p>
	<div style="margin: 24px 0;">
	 <!-- <?php echo $result['bio']; ?>
	 <br> -->
	 <!-- Sex : <?php echo $result['gender']; ?><br>
	 Distance : <?php echo $dist . " Km away."; ?><br>
	 lastseen : <?php echo $result['lastseen']; ?> -->
 </div>
	<!-- <div> -->
	<!-- <div class="chat-popup" id="myForm">
firstname : <?php echo $result['firstname']; ?><br>
lastaname : <?php echo $result['lastname']; ?><br>
bio <?php echo $result['bio']; ?>
	 <br>
	 Sex : <?php echo $result['gender']; ?><br>
	 Age : <?php echo $result['age']; ?><br>
	 lastseen : <?php echo $result['lastseen']; ?>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	</form>
</div>
</div> -->
 <?php
 $user = $_SESSION['username'];
 $reciever = $result['username'];
	$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever'";
	$likes = mysqli_query($db, $sql);
	$ismatch = mysqli_query($db, "SELECT * FROM likes where username='$user' AND reciever='$reciever' or username='$reciever' or reciever='$user'");
	?>
 <?php if(mysqli_num_rows($likes) == 0) { ?>
		<a href="plus_like.php?username=<?php echo $result['username'] ?>&session=<?php echo $_SESSION['username'] ?>">like </a>
 <?php } else{ ?>
	<a href="unlike.php?username=<?php echo $result['username'] ?>&session=<?php echo $_SESSION['username'] ?>">Unlike </a>
			<?php } ?>
			<?php  if(ismatch($user, $reciever) == 1){
				matched($user, $reciever);?>
				<a href="chat.php?sender=<?php echo $result['username'] ?>">Chat Now!</a>
				<?php } else{ ?>
					<?php } ?>
</div>
 <?php }} ?>   
	 <script>
function openForm() {
		document.getElementById("myForm").style.display = "block";
}

function closeForm() {
		document.getElementById("myForm").style.display = "none";
}
</script>

<?php } ?>
</body>
</html>