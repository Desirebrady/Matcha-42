<?php
session_start();
include 'connect.php';
if (isset($_POST['send'])) {
    $to = $_POST['username'];
    $from = $_POST['sender'];
    $message = $_POST['message'];

    $query = "INSERT INTO massages (username, sender, massage) 
    VALUES ('$to','$from', '$message')";
    $results = mysqli_query($db, $query);

    $notify = mysqli_query($db, "INSERT INTO notifications set fromWho='$from', toWho='$to', Text='$message'");
}
$reciever = $_GET['sender'];
$sender = $_SESSION['username'];
$user = $_SESSION['username'];
$results = mysqli_query($db, "SELECT * FROM users where username='$reciever'");
$images = mysqli_fetch_all($results, MYSQLI_ASSOC);
$results = mysqli_query($db, "SELECT * FROM users where username='$sender'");
$SessionImage = mysqli_fetch_all($results, MYSQLI_ASSOC);

$Sessionmsg = mysqli_query($db, "SELECT * FROM massages where username='$reciever' AND sender='$sender' or username='$sender' AND sender='$reciever'");
$inbox = mysqli_fetch_all($Sessionmsg, MYSQLI_ASSOC);

// $inbox = mysqli_query("SELECT * FROM massages where username='$sender'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css?v=2">
    <!-- <link rel="stylesheet" type="text/css" href="../stylesheet/css/admin.css"> -->
    <title>Document</title>
    <style>
        body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="row" style="margin-top: 20%;">
            <?php foreach ($images as $image) : ?>
                <div class="card-heading">
                    <h2>Chatting to : <?php echo $image['firstname'] . " " . $image['lastname']; ?></h2>
                </div>
            <?php endforeach; ?>

            <?php foreach ($SessionImage as $pic) : ?>
            <?php endforeach; ?>
            <div class="col-sm-8">
                <div class="inbox">

                </div>
                <h4>Your Chats!</h4>
                <?php foreach ($inbox as $message) {
                    if ($message['sender'] === $_SESSION['username']) {
                        echo '<div class="container darker">';
                        echo "<img style='width: 100%'  class='right' src='uploads/profile_pic/" . $pic['profile_pic'] . "' >";
                        echo '<p style="color: black">' . $message['massage'] . "</p>";
                        echo '<span class="time-left">' . $message['date'] . "</span>";
                        echo "</div>";
                    } else {
                        echo '<div class="container">';
                        echo "<img style='width: 100%'  src='uploads/profile_pic/" . $image['profile_pic'] . "' >";
                        echo '<p style="color: black;text-align: right;" >' . $message['massage'] . "</p>";
                        echo '<span class="time-right">' . $message['date'] . "</span>";
                        echo "</div>";
                    }
                } ?>
                <form method="post">
                    <input type="hidden" id="name" name="username" value="<?php echo $_GET['sender'] ?> " />
                    <input type="hidden" id="name" name="sender" value="<?php echo $_SESSION['username'] ?>" />
                    <div class="wthree-field">
                        <textarea id="message" name="message" placeholder="say something..." style="width: 400px;height: 50px;"></textarea>
                    </div>
                    <div class="wthree-field">
                        <input id="saveForm" name="send" type="submit" value="SEND" />

                    </div>
                </form>
            </div>
        </div>
</body>

</html>