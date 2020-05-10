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
  <?php include "articlesDisplayQuerys.php"; ?>
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
                               ";
              }
              ?>
              <div class='row'>
                <div class='col-md-6 ml-auto mr-auto'>
                  <div class='profile-tabs'>
                    <ul class='nav nav-pills nav-pills-icons justify-content-center' role='tablist'>
                      <li class='nav-item'>
                        <a class='nav-link <?php if(strpos($_SERVER['REQUEST_URI'], '/cms/profile.php?page_id=bookmarks') !== false) { echo "active"; } ?>' href='profile.php?page_id=bookmarks'>
                          <i class='material-icons'>bookmarks</i>Bookmarks</a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link <?php if(strpos($_SERVER['REQUEST_URI'], '/cms/profile.php?page_id=comments') !== false) { echo "active"; } ?>' href='profile.php?page_id=comments'>
                          <i class='material-icons'>comment</i>
                          Comments</a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link <?php if(strpos($_SERVER['REQUEST_URI'], '/cms/profile.php?page_id=posts') !== false) { echo "active"; } ?>' href='profile.php?page_id=posts'>
                          <i class='material-icons'>list_alt</i>
                          Posts</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="tab-content tab-space">
                  <div class="tab-pane active text-center gallery" id="studio">
                    <div class="row">
                      <div class="col-md-3 ml-auto">
                      </div>
                      <div class="col-md-3 mr-auto">
                      </div>
                    </div>
                    <?php querys::profileArticles($user_id); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
              <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
              <?php querys::profilePagination($user_id); ?>
              <a href="#" class="btn_pagging">...</a>
              <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
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