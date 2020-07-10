<?php
include '../config/database.php';
session_start();
$username = "";
$email = "";
$errors = [];
include      'get_uploads.php';

$db = mysqli_connect('localhost', 'root', '', 'matcha');
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
$previous = "javascript:history.go(-2)";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css">
  <title>Profile</title>
  <style>
    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      resize: none;
      min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
      background-color: #ddd;
      outline: none;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }

    .title {
      color: grey;
      font-size: 18px;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div style="margin-top: 1%;">
      <?php echo "<a href='$previous'>Back</a>"; ?>
    </div>
    <div class="row">
      <div class="feeds">
        <div class="feed">
          <div class="feed-image">
            <?php
            while ($row = mysqli_fetch_array($result)) {
              if ($_SESSION['username'] === $row['username']) {
                echo "<img src='uploads/profile_pic/" . $row['profile_pic'] . "'style='width:100%' >";
              }
            }
            ?>
          </div>
        </div>
      </div>
      <form method="POST" action="upload.php" enctype="multipart/form-data" style="width: 25%;margin: 0 auto;">
        <input type="hidden" name="size" value="1000000">
        <div>
          <input type="file" name="image">
        </div>
        <div>
          <button type="submit" name="upload">POST</button>

        </div>
      </form>
    </div>
  </div>

</body>

</html>