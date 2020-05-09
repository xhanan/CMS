<?php
include "dbConnection.php";

if(isset($_POST['contenti'])){
  $content = $_POST['contenti'];
  $article_id = 62;//$_POST['article_id'];
  $user_id = 11; //$_POST['user_id'];

  $queryc = "INSERT INTO comments(article_id, user_id, descriptions, datetimee) ";

  $queryc .= "VALUES({$article_id},{$user_id},'{$content}', now())";
  $create_post_query = mysqli_query($connection, $queryc);
  if (!$create_post_query) {
    die("Gabim: " . mysqli_error($connection));
  }
}

  if(isset($_POST['deleteid'])){
        $koment_id = $_POST['deleteid'];
  
        $deleteComment_query = "DELETE FROM comments WHERE id={$koment_id} ";
  
        $queryy = mysqli_query($connection, $deleteComment_query);
        if (!$deleteComment_query) {
          die("Gabim: " . mysqli_error($connection));
        }
  }
?>