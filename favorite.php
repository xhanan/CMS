<?php 

    include "dbConnection.php";
  
    if(isset($_POST['deleteid']) && isset($_POST['userid'])){
        $postid = $_POST['deleteid'];
        $userid = $_POST['userid'];
        $query = "DELETE FROM bookmarks WHERE userid=$userid AND article_id = $postid;";
        $delete = mysqli_query($connection, $query);
        if(!$delete){
            die("Error: " + mysqli_error($connection));
        }
    }
    if(isset($_POST['insertid']) && isset($_POST['userid'])){
        $postid = $_POST['insertid'];
        $userid = $_POST['userid'];
        $query = "INSERT INTO bookmarks(userid, article_id) VALUES ($userid, $postid);";
        $insert = mysqli_query($connection, $query);
        if(!$insert){
            die("Error: " + mysqli_error($connection));
        }
    }
    
?>
