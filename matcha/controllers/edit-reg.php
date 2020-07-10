<?php
include '../config/database.php';
session_start();

$db = mysqli_connect('localhost', 'root', '', 'matcha');
if (isset($_POST['save'])) {
  $user = $_SESSION['username'];
  $username =  $_POST['username'];
  $email = $_POST['email'];

  $query1 = "UPDATE users set username='$username', email='$email' WHERE username='$user'";
  $results = mysqli_query($db, $query1);
  header('location: ../../admin/login.php');
  exit(0);
}

$sesh = $_SESSION['username'];
$myinfo = mysqli_query($db, "SELECT * FROM users where username='$sesh'");
while ($row = mysqli_fetch_array($myinfo)) {
  $username = $row['username'];
  $email = $row['email'];
}
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Edit Registration info</title>
</head>

<body>
  <div class="container-fluid">
    <div style="margin-top: 1%;">
      <?php echo "<a href='$url'>Back</a>"; ?>
    </div>
    <div class="row" style="width: 50%;margin: 0 auto;margin-top: 5%">
      <div class=" col">
        <form method="POST" style="color: white; font-size: large">
          <div class="form-row">
            <div class="form-group col-6">
              <label for="Username">Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
            </div>
            <div class="form-group  col-6">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" value="<?php echo $email ?>">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="save">SAVE</button>
        </form>
      </div>
    </div>
  </div>
  </form>
</body>

</html>