<?php
session_start();
include     'connect.php';
include     'functions.php';

$user = $_SESSION['username'];
$session = $_SESSION['username'];

$myGender = '';
$myinfo = mysqli_query($db, "SELECT * FROM users where username='$session'");
while ($row = mysqli_fetch_array($myinfo)) {
	$myGender = $row['gender'];
}
$next = 0;
$prev = 0;
$users_per_page = 4;
$result = mysqli_query($db, "SELECT * FROM users where gender != '$myGender'");
$number_of_users = mysqli_num_rows($result);
$page = 1;

$number_of_pages = ceil($number_of_users / $users_per_page);

if (isset($_GET['page'])) {
	$page = intval($_GET['page']);
	$next = $page + 1;
	$prev = $page - 1;
	if ($page > $number_of_pages && $next > $number_of_pages) {
		$page = $number_of_pages;
		$next = $page;
	} elseif ($page < 1) {
		$page = 1;
	}
} else {
	$page = 1;
}
$start_limit = ($page - 1) * $users_per_page;

$results = mysqli_query($db, "SELECT * FROM users where gender != '$myGender' LIMIT " . $start_limit . ',' . $users_per_page);
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
	<div class="container-fluid">

		<div class="row" style="margin-top: 7%">
			<div class="" style="margin-left: 13%;">
				<h2>Search by distance (km)</h2>
				<form class="form-inline" method="post">
					<input type="text" name="range" class="form-control" placeholder="max distance">
					<div class="wthree-field">
						<input type="submit" name="submit" value="submit" class="btn btn-primary">
					</div>
				</form>
				<!-- put_flash();updte the message below -->
				<h2>
					<p> Showing users by distance, click their image to view more about them</p>
				</h2>
				<?php if (isset($_POST['submit'])) { ?>
					<?php foreach ($results as $result) {
						$distanceKM = distance($result['lat'], $result['lon'], isset($_SESSION['lat']), isset($_SESSION['lon']));
						$actualDistance = round($distanceKM / 1000);
						if ($result['username'] != $_SESSION['username'] && ($actualDistance <= $_POST['range']) && !is_blocked($_SESSION['username'], $result['username']) && isset($_SESSION['username'])) {
					?>
							<div class="card zoom">
								<a href="block.php?blocker=<?php echo $_SESSION['username'] ?>&blocked=<?php echo $result['username'] ?>">Block </a>
								<?php if (!is_reported($_SESSION['username'], $result['username'])) : ?>
									or
									<a href="block.php?reporter=<?php echo $_SESSION['username'] ?>&reported=<?php echo $result['username'] ?>">Report </a>
								<?php endif ?>
								<a href="view_profile.php?username=<?php echo $result['username'] ?>&viewer=<?php echo $_SESSION['username'] ?>"><img src="uploads/profile_pic/<?php echo $result['profile_pic'] ?>" style="width:100%; height:300px" onclick="openForm()"> </a>
								<div class="row">
									<div class="col">
										<h2 class="title"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></h2>
									</div>
									<div class="col">
										<p class="title"><?php echo $actualDistance . ' km away'; ?></p>
									</div>
								</div>
								<?php
								$user = $_SESSION['username'];
								$reciever = $result['username'];
								$sql = "SELECT * FROM likes WHERE username='$user' AND reciever='$reciever'";
								$likes = mysqli_query($db, $sql);
								$ismatch = mysqli_query($db, "SELECT * FROM likes where username='$user' AND reciever='$reciever' or username='$reciever' or reciever='$user'");
								?>

								<?php if (mysqli_num_rows($likes) == 0) { ?>
									<a href="plus_like.php?matchAge=true&username=<?php echo $result['username'] ?>&session=<?php echo $_SESSION['username'] ?>">like</a>
								<?php } else { ?>
									<a href="unlike.php?matchAge=true&username=<?php echo $result['username'] ?>&session=<?php echo $_SESSION['username'] ?>">Unlike </a>
								<?php } ?>
								<?php if (ismatch($user, $reciever) == 1) {
									matched($user, $reciever); ?>
									<a href="chat.php?sender=<?php echo $result['username'] ?>">Chat Now!</a>
								<?php } else { ?>
								<?php } ?>
							</div>
					<?php }
					} ?>
					<script>
						function openForm() {
							document.getElementById("myForm").style.display = "block";
						}

						function closeForm() {
							document.getElementById("myForm").style.display = "none";
						}
					</script>

				<?php } ?>
			</div>
		</div>
	</div>


</body>

</html>