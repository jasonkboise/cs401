<?php
  require_once("top.php");
  require_once("comment_table.php");
  require_once("Dao.php");
  $dao = new Dao();

?>
  <div id="home">
      <a href="../index.php">Home</a>
    </div>
  <div> This is my Banjo Guide! </div>
  <div class="text">
    <a href="characters/banjo.php"><img src="/images/banjorender.png" alt="Banjo & Kazooie" id="guideRender"></a>
    <div>
      Example text for the guide page.
    </div>
  </div>
  <?php 
  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']!=false) {
    echo "<form method='POST' action='comment_handler.php'>
    <div>Comment: <input type='text' name='comment' id='comment'/></div>
    <input type='submit' value='Post Commment'>
  </form>";
  }
  else {
    echo "<div>Login to leave a comment!</div>";
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