<?php
include "dbConnection.php";

    if(isset($_POST['deleteid'])){
        $koment_id = $_POST['deleteid'];
  
        $deleteComment_query = "DELETE FROM comments WHERE id={$koment_id} ";
  
        $queryy = mysqli_query($connection, $deleteComment_query);
        if (!$deleteComment_query) {
          die("Gabim: " . mysqli_error($connection));
        }
      }
?>