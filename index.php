<?php require_once ('top.php');
require_once('Dao.php') ?>
    <div class="column">
    <?php require_once ('table.php'); ?>
    </div>
    <div class="column">
      <div>
        Latest Guides
      </div>
      <div class="guide">
        <?php
        $dao = new Dao();
        $guides = $dao->getGuides();
        if (count(get_object_vars($guides)) >0) {
          foreach($guides as $guide) {
            echo "<div><a href='../guide.php?guide_id=" . $guide['guide_id'] . "'> " . htmlspecialchars($guide['title']) . "</a></div>";
          }
        }
        else {
          echo "<div>No guides found.</div>";
        }
        ?>
      </div>
    </div>
    <div class="column">
      <div>
        Top Guides
      </div>
      <div class="guide">
      <?php
        $dao = new Dao();
        $guides = $dao->getGuides();
        if (count(get_object_vars($guides)) >0) {
          foreach($guides as $guide) {
            echo "<div><a href='../guide.php?guide_id=" . $guide['guide_id'] . "'> " . htmlspecialchars($guide['title']) . "</a></div>";
          }
        }
        else {
          echo "<div>No guides found.</div>";
        }
        ?>
      </div>
    </div>
    <?php
    if (isset($_SESSION['good'])) {
    foreach ($_SESSION['good'] as $message) {
      echo "<div class='good'>{$message}</div>";
    }
    unset($_SESSION['good']);
    
  }
  ?>
<?php require_once ('footer.php'); ?>

