<?php
  require_once("top.php");
  require_once("comment_table.php");
  require_once("Dao.php");
  $dao = new Dao();
  $guide = null;
  if (isset($_GET['guide_id'])) {
    $guide = $dao->getGuide($_GET['guide_id'])->fetch(PDO::FETCH_ASSOC);
  }

  $title_preset = "";
  $guide_preset = "";
  if (isset($_SESSION['form'])) {
    $title_preset = $_SESSION['form']['title'];
    $guide_preset = $_SESSION['form']['guide_text'];
    unset($_SESSION['form']);
  }


?>
  <div id="home">
      <a href="../index.php">Home</a>
  </div>
  <div>  
    <?php
    if (isset($guide))  {
      echo "<h2>" . $guide['title'] . "</h2>";
    }
    else {
      echo "Error: No title found.";
    }
    ?>
  </div>
  <div class="text">
    <?php
    if (isset($guide)) {
      echo "<a href='characters/" . $guide['smash_char'] . ".php'><img src='/images/" . $guide['smash_char'] . "render.png' alt='" . $guide['smash_char'] . "'id='guideRender'></a>";
    }
    ?>
    
    <div>
    <?php
    if (isset($guide))  {
      echo $guide['guide'];
    }
    else {
      echo "Error: No text found.";
    }
    ?>
    </div>
  </div>
  <?php 
  if (isset($guide)){
    echo "<div id='author'>Guide by: " . $dao->getUser($guide['user_id'])->fetch()['username'] . "</div>";
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']!=false) {
      echo "<form method='POST' action='comment_handler.php?guide_id=" . $guide['guide_id'] . "'>
      <div>Comment: <input type='text' name='comment' id='comment'/></div>
      <input type='submit' value='Post Commment'>
      </form>";
    }
    else {
      echo "<div>Login to leave a comment!</div>";
    }
  }

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
    ?>
  
  <div class="text">
    <?php renderTable();?>
  </div>
<?php require_once("footer.php"); ?>