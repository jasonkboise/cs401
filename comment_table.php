<?php
require_once 'Dao.php';

function renderTable () {
  $dao = new Dao();
  $comments = $dao->getComments();
  if (count(get_object_vars($comments)) == 0) {
    echo "No comments yet";
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