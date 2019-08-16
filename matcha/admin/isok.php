<?php
if ($_SESSION['verified'] == 0) {
    $_SESSION['msg'] = "You must verify your email first";
    header('location: ../admin/verify.php');
}
?>