<?php
	include		'../controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../stylesheet/css/admin.css">
  
  <title>Login</title>
  
</head>
<body>

    <div class="content-w3ls">
        <div class="content-bottom">
			<h2>Sign In Here</h2>
            <form action="login.php" method="post">
                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="username" id="text1" type="text" placeholder="Username" required>
                    </div>
                </div>
                <div class="field-group">
                    <span class="fa fa-lock" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="password" id="myInput" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="field-group">
                    <div class="check">
                        <label class="checkbox w3l">
                            <input type="checkbox" onclick="myFunction()">
                            <i> </i>show password</label>
                    </div>
                    <!-- script for show password -->
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>

                </div>
                <div class="wthree-field">
                    <input id="saveForm" name="login-btn" type="submit" value="sign in" />
                    <!-- <button id="saveForm" name="login-btn" type="submit" value="sign in"> </button> -->
                </div>
                <ul class="list-login">
                    <li>
                        <a href="signup.php" class="text-right">No account?</a>
                    </li>
                    <li>
                        <a href="enter_email.php" class="text-right">Forgot password?</a>
                    </li>
                    <li class="clearfix"></li>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>
