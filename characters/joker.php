<?php require_once('../top.php'); ?>
<div id="home">
  <a href="../index.php">Home</a>
</div>
  <div class="column">
    <div>
      Joker
    </div>
    <div id="picture">
      <div>
        <img src="/images/jokerrender.png" alt="Joker" class="render">
      </div>
    </div>
  </div>
  <div class="column">
    <div>
      Traits and Moves
    </div>
    <div class="guide">
      Info goes here
    </div>
  </div>
  <div class="column">
    <div>
      Guides
    </div>
    <div class="guide">
    <?php
        require_once('../Dao.php');
        $dao = new Dao();
        $guides = $dao->getGuidesFor("joker");
        if ($guides->rowCount() >0) {
          foreach($guides as $guide) {
            echo "<div><a href='../guide.php?guide_id=" . $guide['guide_id'] . "'> " . htmlspecialchars($guide['title']) . "</a></div>";
          }
        }
        else {
          echo "<div>No guides found for this character.</div>";
        }
        ?>
    </div>
  </div>
<?php require_once('../footer.php'); ?>
