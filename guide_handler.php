<?php
session_start();
require_once 'Dao.php';
$_SESSION['bad'] = array();
$_SESSION['good'] = array();

// validating

if (strlen($_POST['title']) == 0) {
  $_SESSION['bad'][] = "Please enter a title for the guide.";
}

if (strlen($_POST['title']) > 255) {
  $_SESSION['bad'][] = "Title is too long, can be no longer than 255 characters.";
}

if (strlen($_POST['guide']) == 0) {
    $_SESSION['bad'][] = "Please enter text for the guide.";
} 

if(strlen($_POST['guide']) > 65535) {
    $_SESSION['bad'][] = "Guide is too long, can be no longer than 65535 characters.";
}

if (count($_SESSION['bad']) > 0) {
  header("Location: create_guide.php");
  exit();
}

$dao = new Dao();
$user_id = $dao->getUserId($_SESSION['authenticated'])->fetch(PDO::FETCH_BOTH)[0];

$dao->addGuide($_POST['title'], $_POST['smash_char'], $_POST['guide'], $user_id);
$_SESSION['good'][] = "Thank you for posting";

// redirect back to the comments page
header("Location: index.php");
exit();