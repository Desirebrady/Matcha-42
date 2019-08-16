<?php
session_start();
include 'connect.php';
if(isset($_POST['send'])) {
    $to = $_POST['username'];
    $from = $_POST['sender'];
    $message = $_POST['message'];

    $query = "INSERT INTO massages (username, sender, massage) 
    VALUES ('$to','$from', '$message')";
    $results = mysqli_query($db, $query);
}
$reciever = $_GET['username'];
$sender = $_SESSION['username'];
$results = mysqli_query($db, "SELECT * FROM users where username='$reciever'");
$images = mysqli_fetch_all($results, MYSQLI_ASSOC);

// $Sessionmsg = mysqli_query($db, "SELECT * FROM massages where username='$reciever' AND sender='$sender' or username='$sender' or sender='$reciever'");
// $Sessionmsg = mysqli_query($db, "SELECT * FROM massages where username='$reciever' AND sender='$sender'");
// $msgfromuser = mysqli_query($db, "SELECT * FROM massages where username='$sender' AND sender='$reciever'");
// $yourMSg = mysqli_fetch_all($Sessionmsg, MYSQLI_ASSOC);
// $inbox = mysqli_fetch_all($Sessionmsg, MYSQLI_ASSOC);

// $inbox = mysqli_query("SELECT * FROM massages where username='$sender'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    margin-right:0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: left;
    color: #999;
}
</style>
</head>
<body>
<h2>User</h2>
<?php foreach ($images as $image): ?>

<img src="uploads/profile_pic/<?php echo $image['profile_pic'];?>">
<h4 class="card-heading"><?php echo $image['lastname']." ".$image['firstname'];?></h4>
<p><strong>Username: </strong><i><?php echo $image['username'] ?></i></p>
<?php endforeach; ?>
<div class="col-sm-8">
<div class="inbox"></div>
<h4>Chats!</h4>
<?php foreach ($inbox as $message){
			if ($message->sender === $_SESSION['username'])
				echo '<div class="me">' .$message->massage ."</div>";
			else
				echo '<div class="other">' .$message->massage ."</div>";
		}	 ?>
<form method="post" action="view_profile.php?username=<?php echo $_GET['username']; ?>">
        <input type="hidden" id="name" name="username" value="<?php echo $_GET['username'] ?> "/>
        <input type="hidden" id="name" name="sender" value="<?php echo $_SESSION['username'] ?>" />
        <textarea id="message" name="message" rows="6" cols="30"></textarea>
        <input type="submit" name="send" value="Send message" />
</form>
</body>
</html>