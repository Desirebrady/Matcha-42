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
    $lat1 = $obj->lat;
    $long1 = $obj->lon;
    $location = $obj->regionName;
    if ($gender == 1)
    {
        $gender = "Male";
    }
    elseif  ($gender == 2){
    $gender = "Female";
    }
    if ($gender == 3){
        $gender = "Other";
    }
    $query1 = "UPDATE users set firstname='$firstname', lastname='$lastname',age='$age', gender='$gender',bio='$bio',lat='$lat1',lon='$long1',location='$location', tag1='$tag1' ,tag2='$tag2' ,tag3='$tag3' WHERE username='$user'";
    $results = mysqli_query($db, $query1);
    header('location: index.php');
    exit(0);
}
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
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<link rel="stylesheet" type="text/css" href="../stylesheet/css/style.css?v=1">
</head>
<body>
<form method="POST">

    <input type="text" name="firstname" placeholder="firstname..."><br>
    <input  type="text" name="lastname"  placeholder="lastname..."><br>
    <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="bio" 
        placeholder="eg Hi im a nerd"></textarea>
  	</div><br>

   <input type="number" min="18" max="99" name="age" >
   <input type="text" name="tag1" placeholder="interest#1">
   <input type="text" name="tag2" placeholder="interest#2">
   <input type="text" name="tag3" placeholder="interest#3">
    <select name="gender" >
        <option value="1">Male</option>
        <option value="2">Female</option>
        <option value="3">Other</option>
    </select>
    <br>
    <br>
    <br>
    <br>
    <button type="submit" name="save">SAVE</button>
</form>
