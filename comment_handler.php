<?php
session_start();
require_once 'Dao.php';
$_SESSION['bad'] = array();
$_SESSION['good'] = array();

// validating

if (strlen($_POST['comment']) == 0) {
  $_SESSION['bad'][] = "Please enter a comment";
}

if (strlen($_POST['comment']) > 256) {
  $_SESSION['bad'][] = "Comment is too long, can be no longer than 256 characters.";
}

if (count($_SESSION['bad']) > 0) {
  header("Location: guide.php");
  exit();
}

$dao = new Dao();
$username = $dao->getUserId($_SESSION['authenticated'])->fetch(PDO::FETCH_BOTH)[0];
$dao->addComment($_POST['comment'], $username);
$_SESSION['good'][] = "Thank you for posting";

// redirect back to the comments page
header("Location: guide.php");
exit();