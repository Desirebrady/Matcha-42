<?php
require_once	'config/setup.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylesheet/css/style.css">
</head>

<body>
	<header id="header">
		<div class="container-fluid">

			<div id="logo" class="pull-left">
				<h1><a href="#intro" class="scrollto">Matcha</a></h1>
			</div>
		</div>
	</header>
	<div class="container-fluid" style="margin-top: 2%;margin-left: 3%;">
		<div class="row" style="margin-top: 10%;">
			<div class="col" style="margin-left: 25%;">
				<h2>Welcome to Matcha let us help you find your soulmate</h2>
				<p style="font-size: 30px;">Already a member? <a style="font-size: 40px;" href="admin/Login.php">Sign in</a></p>
				<p style="font-size: 30px;">New member? <a style="font-size: 40px;" href="admin/signup.php">Sign up</a></p>
			</div>
		</div>
	</div>
</body>

</html>