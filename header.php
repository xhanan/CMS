<?php session_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

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
                        <a class="fh5co_display_table">
                            <div class="fh5co_verticle_middle"><i class="fa fa-google-plus" style="color: #fff"></i></div>
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
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <a class="dropdown-item" href="post.php">Add Post</a>
                                <a class="dropdown-item" href="post.php">Edit Post</a>
                                <div class="dropdown-divider"></div>
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
                        //     <div class="text-center d-inline-block float-right">
                        //     a href="login.php" class="input-group-addon mt-1 mr-2" id="basic-addon12">Login</a>
                        // </div>';
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
                            <input id="Search" type="text" class="form-control" name="search" placeholder="Search"></input>     
                        </div>
                    </form>
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
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="blog.php">Blog <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="single.php">Single <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">World <span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                <a class="dropdown-item" href="#">Action in</a>
                                <a class="dropdown-item" href="post.php">Add Post</a>
                                <a class="dropdown-item" href="post.php">Edit Post</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Post<span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                <a class="dropdown-item" href="post.php">Add Post</a>
                                <a class="dropdown-item" href="#">Edit Post</a>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="Contact_us.php">Contact <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>