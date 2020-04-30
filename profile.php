<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/profile.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
  <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
  <title>Profile</title>
</head>

<body class="profile-page">
  <?php include "header.php"; ?>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSuKV7IS2_F-xbDj7YdCT55b7wWgMKd_OQ2am0mgG0X_bUYzR-g&usqp=CAU" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <?php
              include "dbConnection.php";
              global $connection;
              $user_id = $_SESSION['id'];

              $get_user_query = "SELECT first_name,last_Name,username FROM `users` WHERE `users`.`id` = '$user_id'";

              $select_user_query = mysqli_query($connection, $get_user_query);

              while ($rows = mysqli_fetch_assoc($select_user_query)) {
                $firstName = $rows['first_name'];
                $lastName = $rows['last_Name'];
                $username = $rows['username'];

                echo " <div class='name'>
                                          <h3 class='title'> {$firstName} {$lastName}</h3>
                                          <h5>{$username}</h5>
                                          <a href='#pablo' class='btn btn-just-icon btn-link btn-dribbble'><i class='fa fa-dribbble'></i></a>
                                          <a href='#pablo' class='btn btn-just-icon btn-link btn-twitter'><i class='fa fa-twitter'></i></a>
                                          <a href='#pablo' class='btn btn-just-icon btn-link btn-pinterest'><i class='fa fa-pinterest'></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 ml-auto mr-auto'>
                                      <div class='profile-tabs'>
                                        <ul class='nav nav-pills nav-pills-icons justify-content-center' role='tablist'>
                                          <li class='nav-item'>
                                            <a class='nav-link active' href='#studio' role='tab' data-toggle='tab'>
                                            <i class='material-icons'>camera</i>
                                            Studio</a>
                                          </li>
                                        <li class='nav-item'>
                                          <a class='nav-link' href='#works' role='tab' data-toggle='tab'>
                                          <i class='material-icons'>palette</i>
                                          Work</a>
                                        </li>
                                        <li class='nav-item'>
                                          <a class='nav-link' href='#favorite' role='tab' data-toggle='tab'>
                                          <i class='material-icons'>favorite</i>
                                            Favorite</a>
                                        </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>";
              }
              ?>
              <div class="tab-content tab-space">
                <div class="tab-pane active text-center gallery" id="studio">
                  <div class="row">
                    <div class="col-md-3 ml-auto">
                    </div>
                    <div class="col-md-3 mr-auto">
                    </div>
                  </div>
                  <?php
                  $user_id = $_SESSION['id'];

                  $select_users_posts = "SELECT `articles`.`id`,`articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`articles`.`image` 
                                  FROM `articles` 
                                  LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` 
                                  LEFT JOIN `category` ON `category`.`id` = `articles`.`category_id`
                                  WHERE `users`.`id` = '$user_id'
                                  ORDER BY `articles`.`id` DESC";


                  $select_user_posts_query = mysqli_query($connection, $select_users_posts);

                  while ($rows1 = mysqli_fetch_assoc($select_user_posts_query)) {
                    $post_id = $rows1['id'];
                    $post_title = $rows1['title'];
                    $post_date = $rows1['published_date'];
                    $post_fname = $rows1['first_name'];
                    $post_lname = $rows1['last_name'];
                    $post_photo = $rows1['image'];

                    echo " <div class='row pb-4'>
              <div class='col-md-5'>
                  <div class='fh5co_hover_news_img'>
                      <div class='fh5co_news_img'><img src='{$post_photo}' alt=''/></div>
                  <div>
              </div>
          </div>
      </div>
      <div class='col-md-7'>
          <a href='editPost.php?p_id={$post_id}' class='fh5co_magna py-2' style = 'font-size: 20px'> {$post_title} </a> <br> <a href='#' class='fh5co_mini_time py-3'> {$post_fname} {$post_lname} -
              {$post_date} </a>
          </div>
      </div>";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
  <div>
    <?php include "footer.php"; ?>
  </div>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>




</body>