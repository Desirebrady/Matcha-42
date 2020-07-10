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
                <div class="wthree-field">
                    <input id="saveForm" name="signup-btn" type="submit" value="Sign up" />
                    <div style="margin-top: 20px;">
                        <a style="color:cyan" href="login.php">Already have an account?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>