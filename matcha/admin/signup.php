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
  <title>Register</title>
</head>
<body>
<div class="content-w3ls">
        <div class="content-bottom">
			<h2>Register In Here</h2>
            <form action="signup.php" method="post">
                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="username" id="text1" type="text" placeholder="Username.." required>
                    </div>
                </div>
                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="email" id="text1" type="text" placeholder="Email.." required>
                    </div>
                </div>
                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="password" id="myInput" type="password" placeholder="Password..">
                    </div>
                </div>
                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input name="passwordConf" id="myInput1" type="password" placeholder="Confirm Password..">
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

                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput1");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>

                </div>
                <div class="wthree-field">
                    <input id="saveForm" name="signup-btn" type="submit" value="Sign up" />
                    <!-- <button id="saveForm" name="login-btn" type="submit" value="sign in"> </button> -->
                </div>
                <ul class="list-login">
                    <li>
                        <a href="login.php" class="text-right">Have an account ?</a>
                    </li>
                    <li class="clearfix"></li>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>