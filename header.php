<?php session_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php
    include "cookies.php";
    if(!isset($_COOKIE['brainbyte'])){
        setcookie("brainbyte",cookies::generateCookieValue(), time() + (3600*730.001), '/');
    }
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BrainByte</title>
    <link href="css/media_query.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="css/style_1.css" rel="stylesheet" type="text/css" />
    <!-- Modernizr JS -->
    <script src="js/modernizr-3.5.0.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/ui/trumbowyg.min.css" integrity="sha256-B6yHPOeGR8Rklb92mcZU698ZT4LZUw/hTpD/U87aBPc=" crossorigin="anonymous" />
</head>

<body>
    <div class="container-fluid fh5co_header_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div class="text-center d-inline-block" style="margin-top:4px">
                        <a href="https://www.linkedin.com/in/xhanan-shehu-baa151188/" class="fh5co_display_table">
                            <div class="fh5co_verticle_middle"><i class="fa fa-linkedin" style="color: #fff"></i></div>
                        </a>
                    </div>
                    <div class="text-center d-inline-block" style="margin-top:4px">
                        <a href="https://www.instagram.com/xhanansh/" class="fh5co_display_table">
                            <div class="fh5co_verticle_middle"><i class="fa fa-instagram" style="color: #fff"></i></div>
                        </a>
                    </div>
                    <div class="text-center d-inline-block" style="margin-top:4px">
                        <a href="https://twitter.com/Xhanansh1" target="_blank" class="fh5co_display_table">
                            <div class="fh5co_verticle_middle"><i class="fa fa-twitter" style="color: #fff"></i></div>
                        </a>
                    </div>
                    <div class="text-center d-inline-block" style="margin-top:4px">
                        <a href="https://www.facebook.com/xhannyy" target="_blank" class="fh5co_display_table">
                            <div class="fh5co_verticle_middle"><i class="fa fa-facebook" style="color: #fff"></i></div>
                        </a>
                    </div>

                    <?php
                    if (isset($_SESSION['user'])) {
                        // $text = '<div class="text-center d-inline-block float-right mt-2" style="font-size: 15px"><a href="logout.php">';
                        // $text .= $_SESSION["user"];
                        // $text .= '</a></div>';
                        echo '<div class="btn-group float-right mt-2" style="margin-bottom:4px">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ' . $_SESSION["user"] . '  
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="profile.php?page_id=bookmarks">Profile</a>';
                    } ?>
                    <?php
                    if (isset($_SESSION['isadmin'])) {
                        echo
                            '<a class="dropdown-item" href="post.php">Add Post</a>';
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo
                            '<div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                                </div>
                            </div>';
                    } else {
                        echo '<div class="btn-group float-right mt-2" style="margin-bottom:4px">
                                <a href="login.php"><button type="button" class="btn btn-danger" aria-haspopup="true" aria-expanded="false"> 
                                Log In / Sign Up
                                </button>
                                </a>
                                </div>';
                    }
                    ?>


                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 fh5co_padding_menu">
                    <a href="index.php">
                        <img src="images/LOGO1.png" alt="img" class="fh5co_logo_width" style="width: 300px" />
                    </a>
                </div>
                <div class="col-12 col-md-3 align-self-center">
                    <form action="search.php" method="post">
                        <div class="input-group float-right">
                            <button class="input-group-addon" name="search_submit"><i class="fa fa-search"></i></button>
                            <input id="Search" list="liveS" type="text" class="form-control" autocomplete="off" onkeyup="showResult(this.value)" name="search" placeholder="Search"></input>
                        </div>
                    </form>
                    <div id="liveS"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
        <div class="container padding_786">
            <nav class="navbar navbar-toggleable-md navbar-light" style="box-shadow: none;">
                <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width" /></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto" style="margin-left: 18%;">
                        <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], '/cms/index') !== false) { echo "active"; } ?>">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], '/cms/categories.php?cat_id=2') !== false) { echo "active"; } ?>">
                            <a class="nav-link" href="categories.php?cat_id=2">Tech <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], '/cms/categories.php?cat_id=3') !== false) { echo "active"; } ?>">
                            <a class="nav-link" href="categories.php?cat_id=3">Coding <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], '/cms/categories.php?cat_id=4') !== false) { echo "active"; } ?>">
                            <a class="nav-link" href="categories.php?cat_id=4">Gaming <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], '/cms/Contact_us.php') !== false) { echo "active"; } ?>">
                            <a class="nav-link" href="Contact_us.php">Contact <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("liveS").innerHTML="";
    document.getElementById("liveS").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("liveS").innerHTML=this.responseText;
      document.getElementById("liveS").style.border="1px solid #00FFFF";
      document.getElementById("liveS").style.borderRadius="4px";
      document.getElementById("liveS").style.font = "bold 15px";
    }
  }
  xmlhttp.open("GET","liveSearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script type="text/javascript">
function handleSelect(elm)
{
window.location = elm.value+".php";
}
</script>
