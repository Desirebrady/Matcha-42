<?php
//require_once 'sendEmails.php';
$auth = 0;
session_start();
$username = "";
$email = "";
include 'sendEmails.php';

$conn = new mysqli('localhost', 'root', '', 'matcha');

// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    if (empty($_POST['username'])) {
        $error .= '<p class="text-danger">Username is required</p>';
    }
    if (empty($_POST['email'])) {
        $error .= '<p class="text-danger">Email is required</p>';
    }
    if (empty($_POST['password'])) {
        $error .= '<p class="text-danger">Password is required</p>';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $error .= '<p class="text-danger">Passwords dont Match </p>';
    }
    $commentl = strlen($_POST['password']);
    if ($commentl < 8) {
        $error .= '<p class="text-danger">Password should contain more than 8 characters</p>';
    }
    $username = $_POST['username'];
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error .= '<p class="text-danger">Email exist</p>';;
    }

    if ($error == '') {
        $query = "INSERT INTO users SET username=?, email=?, token=?, password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $username, $email, $token, $password);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();
            sendVerificationEmail($email, $token);
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            header('location: ../admin/verify.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
    $data = array(
        'error'  => $error
    );

    echo json_encode($data);
}

// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($errors)) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        echo "fuck this shit";
        if ($stmt->execute()) {

            $result = $stmt->get_result();

            $user = $result->fetch_assoc();
            print_r($user);
            if ($user) { // if password matches
                $stmt->close();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';

                header('location: ../controllers/index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}
