<?php 
  require_once('top.php'); 
  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']!=false) {
    header("Location: index.php");
    exit;
  }
  $name_preset = "";
  $pass_preset = "";
  if (isset($_SESSION['form'])) {
    $name_preset = $_SESSION['form']['username'];
    $pass_preset = $_SESSION['form']['password'];
    unset($_SESSION['form']);
  }
?>
<div id="home">
  <a href="../index.php">Home</a>
</div>

  <form method="POST" action="login_handler.php" id="login">
    <div>Login</div>
    <div>
      <label for="username">Username:</label> 
      <input value="<?php echo $name_preset;?>" type="text" name="username" id="username"/>
    </div>
    <div>
      <label for="password">Password:</label> 
      <input value="<?php echo $pass_preset;?>"type="password" name="password" id="password"/>
    </div>
    <input type="submit" value="Submit">
    <div id="create">Don't have an account? <a href="../create.php">Create one!</a></div>
  </form>
    
<?php 
  if (isset($_SESSION['good'])) {
    foreach ($_SESSION['good'] as $message) {
      echo "<div id='good'>{$message}</div>";
    }
    unset($_SESSION['good']);
    
  }
  if (isset($_SESSION['bad'])) {
    foreach ($_SESSION['bad'] as $message) {
      echo "<div class='bad'>{$message} <span class='close_error'>X</span></div>";
    }
    unset($_SESSION['bad']);
  }
  require_once('footer.php'); ?>
