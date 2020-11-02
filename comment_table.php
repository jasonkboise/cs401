<?php
require_once 'Dao.php';

function renderTable () {
  $dao = new Dao();
  $guide_id = null;
  
  if (isset($_GET['guide_id'])) {
    $guide_id = $_GET['guide_id'];
  }
  $comments = $dao->getComments($guide_id);
  if($comments == null) {
    echo "Error: No guide was found.";
    exit;
  }
  
  elseif ($comments->rowCount() == 0) {
    echo "No comments yet. Be the first to leave one!";
    exit;
  }
  
  ?>
  <table id="comment_table">
    <thead>
      <th class="comment_th">User</th><th class="comment_th">Comment</th><th class="comment_th">Date</th>
    </thead>
   <?php
    foreach ($comments as $comment) {
      echo "<tr><td class ='comment_td'>{$comment['username']}</td><td class='comment_td'>" . htmlspecialchars($comment['comment']) . "</td><td class='comment_td'>{$comment['date_entered']}</td></tr>";
    }
   ?>
  </table>
<?php
}
?>