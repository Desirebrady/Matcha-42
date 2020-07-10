<?php
include        '../controllers/authController.php';
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
                <div class="wthree-field">
                    <input id="saveForm" name="login-btn" type="submit" value="sign in" />
                    <div style="margin-top: 10px">
                        <a href="signup.php" style="color: cyan">No account?</a>

                        <a href="enter_email.php" style="color: cyan; margin-left: 30px">Forgot password?</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>