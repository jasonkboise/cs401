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

$email_preset = "";
$name_preset = "";

if (isset($_SESSION['form'])) {
  $email_preset = $_SESSION['form']['Cemail'];
  $name_preset = $_SESSION['form']['Cusername'];
  unset($_SESSION['form']);
}
  
?>
<div id="home">
  <a href="../index.php">Home</a>
</div>
  <form id="login" method="POST" action="create_handler.php">
    <div>Create Account</div>
    <div>
      <label for="create_email">Email:</label>
      <input value="<?php echo $email_preset;?>" type="text" name="Cemail" id="Cemail"/>
      <span class="small_error">Your email does not look valid.</span>
    </div>
    <div>
      <label for="create_username">Username:</label> 
      <input value="<?php echo $name_preset;?>" type="text" name="Cusername" id="Cusername"/>
      <span class="small_error">Your username is invalid.</span>
    </div>
    <div>
      <label for="create_password">Password:</label> 
      <input type="password" name="Cpassword" id="Cpassword"/>
      <span class="small_error"></span>
    </div>
    <div>
      <label for="create_confirm">Confirm Password:</label> 
      <input type="password" name="confirm" id="confirm"/>
    </div>
    <input type="submit" value="Submit">
  </form>
    
<?php 
  if (isset($_SESSION['bad'])) {
    foreach ($_SESSION['bad'] as $message) {
      echo "<div class='bad'>{$message} <span class='close_error'>X</span></div>";
    }
    unset($_SESSION['bad']);
  }

  require_once('footer.php'); ?>
