<?php
session_start();
require_once("Dao.php");
$dao = new Dao();
$_SESSION['bad']=array();

// pretend like we did this:
// require_once 'Dao.php';
// $dao = new Dao();
// if ($dao->userExists($_POST['email'], $_POST['password'])) {
//    // authenticated!
// } else {
//   redirect back to login form with an error
// }

if ($dao->userExists($_POST['username'], $_POST['password'])) {
  $_SESSION['authenticated'] = $_POST['username'];
  header("Location: index.php");
  exit();
} else {
  $_SESSION['form'] = $_POST;
  $_SESSION['authenticated'] = false;
  $_SESSION['bad'][] = "Username or password was incorrect.";
  header("Location: login.php");
  exit();
}