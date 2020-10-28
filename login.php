<?php 
  require_once('top.php'); 
  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']!=false) {
    header("Location: index.php");
    exit;
  }
?>
<div id="home">
  <a href="../index.php">Home</a>
</div>

  <form method="POST" action="login_handler.php" id="login">
    <div>Login</div>
    <div>Username: <input type="text" name="username" id="username"/></div>
    <div>Password: <input type="text" name="password" id="password"/></div>
    <input type="submit" value="Submit">
    <div id="create">Don't have an account? <a href="../create.php">Create one!</a></div>
  </form>
    
<?php 
  if (isset($_SESSION['good'])) {
    foreach ($_SESSION['good'] as $message) {
      echo "<div class='good'>{$message}</div>";
    }
    unset($_SESSION['good']);
  }
  
  if (isset($_SESSION['bad'])) {
    foreach ($_SESSION['bad'] as $message) {
      echo "<div class='bad'>{$message}</div>";
    }
    unset($_SESSION['bad']);
  }
  require_once('footer.php'); ?>
