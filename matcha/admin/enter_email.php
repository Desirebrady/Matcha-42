<?php //include('app_logic.php'); 

$conn = mysqli_connect("localhost","root","","matcha");

if (isset($_POST['reset-password'])) 
{
	$email = $_POST['email'];
	if (empty($email))
	{
		array_push($errors, "Your email is required");
	}

	$query = "SELECT email FROM users WHERE email='$email'";
	$results = mysqli_query($conn, $query);
	if(mysqli_num_rows($results) <= 0) 
	{
		array_push($errors, "Sorry, no user exists on our system with that email");
	}
	else
	{
		$token = bin2hex(random_bytes(50));
		// store token in the password-reset database table against the user's email
		$sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
		$results = mysqli_query($conn, $sql);
		
		// Send email to user with the token in a link they can click on
		$to = $email;
		$subject = "Reset your password";
		$msg = "Hi there, click on this <a href=\"http://127.0.0.1:8080/matcha/admin/new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
		$msg = wordwrap($msg,70);
		$headers = "From: info@matcha.com";
		mail($email, $subject, $msg, $headers);
		header('location: pending.php?email=' . $email);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<form class="login-form" action="enter_email.php" method="post">
		<h2 class="form-title">Reset password</h2>
		<!-- form validation messages -->
		<?php include('../controllers/messages.php'); ?>
		<div class="form-group">
			<label>Your email address</label>
			<input type="email" name="email">
		</div>
		<div class="form-group">
			<button type="submit" name="reset-password" class="login-btn">Submit</button>
		</div>
	</form>
</body>
</html>