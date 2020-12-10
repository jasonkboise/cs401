<?php 
  session_start();
?>

<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="../smash.css">
    <link rel="icon" type="image/png" href="../images/favicon.png"/>
  </head>
  <body>
  <?php
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == false || !isset($_SESSION['authenticated'])) {
      
      echo "<div class='nav'><a href='../login.php'>Login</a></div><div class='nav'><a href='../create.php'>Create Account</a></div>";
     
      
    } else {
      echo "<div class='nav'><a href='../logout.php'>Logout</a></div><div class='nav'><a href='../create_guide.php'>Create Guide</a></div>";
      echo "<div class='nav'>Welcome, " . $_SESSION['authenticated'] . "!</div>";
     
    }
    ?>
    <h1><a href="../index.php"><img src="/images/logo.png" alt="Super Smash Stats" id="logo"></a></h1> 
    <div id="content">
