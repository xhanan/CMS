<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="css/comment.css" rel="stylesheet">
<div class="row">
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0">John Doe</h5>
                <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
              </div>
              <div class="komenti">
              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
              </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0">John Doe</h5>
                <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
              </div>
              <div class="komenti">
              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
    <div class="media g-mb-30 media-comment">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0">Ylber Gashi</h5>
              </div>
              <br>
              <form action="comment.php" method="post">
              <div class="form-group">
              <textarea id="comment" class="form-control" name="comment" placeholder="Type comment"> </textarea>
              </div>
              <ul class="list-inline d-sm-flex my-0">
                <li class="list-inline-item ml-auto">
                    <button type="submit" name="send_comment" class="btn btn-primary">Comment</button>
                </li>
              </ul>
              </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['send_comment'])){
      $content = $_POST['comment'];
      $article_id = $id;
      $user_id = $_SESSION['id'];

      $query = "INSERT INTO comments(article_id, user_id, descriptions, datetimee) ";

      $query .= "VALUES({$article_id},{$user_id},'{$content}', now())";
      $create_post_query = mysqli_query($connection, $query);
      if (!$create_post_query) {
        die("Gabim: " . mysqli_error($connection));
      } else {
        echo "<script> window.alert(\"Komenti eshte ruajtur me sukses.\"); </script>";
      }
    }
    else {
    echo "<script> window.alert(\"Gabim i postit\"); </script>";
  }
?>