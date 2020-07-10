<?php
include '../config/database.php';
session_start();
$username = "";
$email = "";
$errors = [];
$db = mysqli_connect('localhost', 'root', '', 'matcha');
if (isset($_POST['save'])) {
  $user = $_SESSION['username'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $bio = $_POST['bio'];
  $tag1 = $_POST['tag1'];
  $tag2 = $_POST['tag2'];
  $tag3 = $_POST['tag3'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $json = file_get_contents('http://ip-api.com/json');
  $obj = json_decode($json);
  $lat = $obj->lat;
  $long = $obj->lon;
  $location = $obj->regionName;
  if ($gender == 1) {
    $gender = "Male";
  } elseif ($gender == 2) {
    $gender = "Female";
  }
  if ($gender == 3) {
    $gender = "Other";
  }
  echo "<script>alert(" . $long . ");</script>";
  $query1 = "UPDATE users set firstname='$firstname', lastname='$lastname',age='$age', gender='$gender',bio='$bio',location='$location', tag1='$tag1' ,tag2='$tag2' ,tag3='$tag3' WHERE username='$user'";
  $results = mysqli_query($db, $query1);
  header('location: profile.php');
  exit(0);
}

$sesh = $_SESSION['username'];
$myinfo = mysqli_query($db, "SELECT * FROM users where username='$sesh'");
while ($row = mysqli_fetch_array($myinfo)) {
  $sex = $row['gender'];
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $age = $row['age'];
  $bio = $row['bio'];
  $tag1 = $row['tag1'];
  $tag2 = $row['tag2'];
  $tag3 = $row['tag3'];

  $sex = $row['gender'];
  if ($sex === 'Male') {
    $gender = 1;
  } elseif ($sex === 'Other') {
    $gender = 3;
  } else {
    $gender = 2;
  }
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
  <title>Profile</title>

</head>

<body>
  <div class="container-fluid">
    <div style="margin-top: 1%;">
      <?php echo "<a href='$url'>Back</a>"; ?>
    </div>
    <div class="row" style="width: 50%;margin: 0 auto;margin-top: 5%">
      <div class=" col">
        <form method="POST" style="color: white">
          <div class="form-row">
            <div class="form-group col-6">
              <label for="firstname">Firstname</label>
              <input type="text" name="firstname" class="form-control" value="<?php echo $firstname ?>">
            </div>
            <div class="form-group  col-6">
              <label for="lastname">Lastname</label>
              <input type="text" name="lastname" class="form-control" value="<?php echo $lastname ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="bio">Biography</label>
            <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3"><?php echo $bio ?></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-6">
              <label for="age">Age</label>
              <input type="number" class="form-control" min="18" max="99" name="age" value="<?php echo $age ?>">
            </div>
          </div>
          <div class="form-row">

            <div class="form-group col">
              <label for="age">Interest</label>
              <input type="text" class="form-control" name="tag1" value="<?php echo $tag1 ?>">
            </div>
            <div class="form-group col">
              <label for="age">Interest</label>
              <input type="text" class="form-control" name="tag2" value="<?php echo $tag2 ?>">
            </div>
            <div class="form-group col">
              <label for="age">Interest</label>
              <input type="text" class="form-control" name="tag3" value="<?php echo $tag3 ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-6">
              <label for="age">Gender</label>
              <?php if ($gender == 1) { ?>
                <select name="gender" class="form-control">
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                  <option value="3">Other</option>
                </select>
              <?php } elseif ($gender == 3) { ?>
                <select name="gender" class="form-control">
                  <option value="3">Other</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              <?php } else { ?>
                <select name="gender" class="form-control">
                  <option value="2">Female</option>
                  <option value="3">Other</option>
                  <option value="1">Male</option>
                </select>
              <?php } ?>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-3">
              <button type="submit" name="save" class="btn btn-primary">SAVE</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>

</html>