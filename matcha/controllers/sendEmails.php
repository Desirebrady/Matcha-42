<?php
function sendVerificationEmail($userEmail, $token)
{
    $body = '
        Thank you for signing up on our site. Please click on the link below to verify your account:.
      "http://127.0.0.1:8080/matcha/verification_mail.php?token=' . $token . '"';
    $headers = "From: info@camagru.com";
    // Send the message
    if (mail($userEmail,"Verify your email",$body,$headers)) {
        echo "Message Sent";
    } else {
        echo "Message Error";
    }
}

?>