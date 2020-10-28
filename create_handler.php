<?php
session_start();
require_once("Dao.php");
$dao = new Dao();
$_SESSION['bad'] = array();
$_SESSION['good'] = array();


$emailRegex = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
$userRegex = "/^[a-zA-Z0-9_]{3,15}$/";
$passRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/";


$username = $_POST['Cusername'];
$email = $_POST['Cemail'];
$password = $_POST['Cpassword'];

$emailCheck = preg_match($emailRegex, $email);
$userCheck = preg_match($userRegex, $username);
$passCheck = preg_match($passRegex, $password);


if (empty($_POST['Cemail'])) {
     $_SESSION['bad'][] = "Please enter an email.";
}
elseif ($dao->emailExists($_POST['Cemail'])) {
    $_SESSION['bad'][] = "That email is already in use.";
    $exists = true;
}
elseif ($emailCheck == 0) {
    $_SESSION['bad'][] = "Not a valid email.";
}

if (empty($_POST['Cusername'])) {
    $_SESSION['bad'][] = "Please enter a username.";
}
elseif ($dao->usernameExists($_POST['Cusername'])) {
    $_SESSION['bad'][] = "That username already exists.";
    $exists = true;
}
elseif ($userCheck == 0) {
    $_SESSION['bad'][] = "Not a valid username. Can only contain English letters, numbers, and underscores. Must be between 3 and 16 characters long.";
}

if (empty($_POST['Cpassword']) && empty($_POST['confirm'])) {
    $_SESSION['bad'][] = "Please enter and confirm a password.";
}
elseif ($passCheck == 0) {
    $_SESSION['bad'][] = "Not a valid password. Minimum eight characters, at least one upper case English letter, one lower case English letter, one number and one special character.";
}
elseif ($passCheck == 1 && strcmp($_POST['Cpassword'], $_POST['confirm']) !== 0) {
    $_SESSION['bad'][] = "The passwords did not match.";
}

if ($passCheck==1 && strcmp($_POST['Cpassword'], $_POST['confirm']) == 0 && $userCheck==1 && $emailCheck==1 && !$exists) {
    $_SESSION['good'][] = "Account successfully created! Please log in.";
    $dao->addUser($_POST['Cemail'], $_POST['Cusername'], $_POST['Cpassword']);
    header("Location: login.php");
    exit;
}
else {
    header("Location: create.php");
    exit;
}
