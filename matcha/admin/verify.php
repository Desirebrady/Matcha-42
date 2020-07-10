<?php include '../controllers/authController.php' ?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="main.css">
  <title>User verification</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <?php if (!$_SESSION['verified']) : ?>
        <div class="alert alert-success" role="alert">
          You need to verify your email address!
          Sign into your email account and click
          on the verification link we just emailed you
          at
          <strong><?php echo $_SESSION['email']; ?></strong>
          redirecting to login page in 10 seconds
        </div>
      <?php else : ?>
        <button class="btn btn-lg btn-primary btn-block">I'm verified!!!</button>
      <?php endif; ?>
    </div>
  </div>
  <script>
    setTimeout(myFunction, 10000)

    function myFunction() {
      window.location.href = '../admin/login.php';
    }
  </script>
</body>

</html>