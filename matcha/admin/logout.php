<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['verify']);
session_destroy();
header("location: login.php");