<?php require_once('top.php');

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']!=false) {
  header("Location: index.php");
  exit;
}
require_once('Dao.php');
$dao = new Dao();
/*
$users = $dao->getUsers();

foreach($users as $user) {
  echo "<div>" . $user['user_id'] . " " . $user['username'] . " " . $user['password'] . " " . $user['email'] . "</div>";
}
*/
  
?>
<div id="home">
  <a href="../index.php">Home</a>
</div>
  <form id="login" method="POST" action="create_handler.php">
    <div>Create Account</div>
    <div>Email: <input type="text" name="Cemail" id="email"/></div>
    <div>Username: <input type="text" name="Cusername" id="username"/></div>
    <div>Password: <input type="text" name="Cpassword" id="password"/></div>
    <div>Confirm Password: <input type="text" name="confirm" id="confirm"/></div>
    <input type="submit" value="Submit">
  </form>
    
<?php 
  if (isset($_SESSION['bad'])) {
    foreach ($_SESSION['bad'] as $message) {
      echo "<div class='bad'>{$message}</div>";
    }
    unset($_SESSION['bad']);
  }

  require_once('footer.php'); ?>
