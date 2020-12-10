<?php
  class Dao {
   private $host = "us-cdbr-east-02.cleardb.com";
   private $db = "heroku_836ac9edc224c88";
   private $user = "b5b89d5c7ccd57";
   private $pass = "bc4f3648";
   
   public function getConnection() {
     try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
      return $conn;
    } catch (Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }
  public function addUser($email, $user, $pass) {
    $conn = $this->getConnection();
    $saveQuery = "insert into user (username, password, email) values (:user, :pass, :email)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":email", $email);
    $q->bindParam(":user", $user);
    $q->bindParam(":pass", $pass);
    $q->execute();
  }

  public function getUsers() {
    $conn = $this->getConnection();
    return $conn->query("select * from user", PDO::FETCH_ASSOC);
  }

  public function getGuides() {
    $conn = $this->getConnection();
    return $conn->query("select * from guide", PDO::FETCH_ASSOC);

  }

  public function getGuidesFor($character) {
    $conn = $this->getConnection();
    return $conn->query("select * from guide where smash_char = '$character'");
  }

  public function getUserId($username) {
    $conn = $this->getConnection();
    return $conn->query("select user_id from user where username = '$username'", PDO::FETCH_ASSOC);
  }

  public function getUser($user_id) {
    $conn = $this->getConnection();
    return $conn->query("select * from user where user_id = '$user_id'");
  }

  public function getComments($guide_id) {
    $conn = $this->getConnection();
    return $conn->query("select username, comment, date_entered, guide_id from comment join user on user.user_id=comment.user_id where guide_id=$guide_id order by date_entered desc;", PDO::FETCH_ASSOC);
  }

  public function getGuide($guide_id) {
    $conn = $this->getConnection();
    return $conn->query("select * from guide where guide_id='$guide_id'");
  }

  public function addComment($comment, $user_id, $guide_id) {
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (comment, user_id, guide_id) values (:comment, :user_id, :guide_id)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":user_id", $user_id);
    $q->bindParam(":guide_id", $guide_id);
    $q->execute();
  }

  public function addGuide($title, $smash_char, $guide, $user_id) {
    $conn = $this->getConnection();
    $saveQuery = "insert into guide(title, smash_char, guide, user_id) values (:title, :smash_char, :guide, :user_id)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":title", $title);
    $q->bindParam(":smash_char", $smash_char);
    $q->bindParam(":guide", $guide);
    $q->bindParam(":user_id", $user_id);
    $q->execute();
  }

  public function userExists($username, $password) {
    $conn = $this->getConnection();
    $check = $conn->query("select * from user where username='$username' and password='$password'");
    if ($check->rowCount()>0) {
      return true;
    }
    else {
      return false;
    }
  }

  public function usernameExists($username) {
    $conn = $this->getConnection();
    $check = $conn->query("select username from user where username='$username'");
    if ($check->rowCount()>0) {
      return true;
    }
    else {
      return false;
    }
  }

  public function emailExists($email) {
    $conn = $this->getConnection();
    $check = $conn->query("select email from user where email='$email'");
    if ($check->rowCount() > 0) {
      return true;
    }
    else {
      return false;
    }
  }
} 
//$dao = new Dao();
//$users = $dao->getUsers();
//foreach ($users as $user) {
//  echo $user["username"] . "\n";
//}
//echo "done \n";
