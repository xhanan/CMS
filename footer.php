<!DOCTYPE html>
<html lang="en" class="no-js">
<body>
<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box" style = "opacity:100%">
        <div class="row">
            <div class="col-12 spdp_right py-5"><a href="index.php"><img src="images/LOGO1.png" alt="img" class="footer_logo" style="width: 250px"/></a></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> About</div>
                <div class="footer_sub_about pb-3"> Jemi nje website i cili ju sjell juve me te rejat nga teknologjia boterore dhe te trendeve me te medha. Ne ju njoftojme me 
                reviews te keyre tekonlogjive dhe te dhenat te cilat do ju duhen juve parase te ndermerni nje hap.
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3"> Category</div>
                <?php 
                            $query = "SELECT * FROM category";
                            $select_categories = mysqli_query($connection,$query);
                            //confirmQuery($select_categories);
                            while($row = mysqli_fetch_assoc($select_categories )) {
                                $cat_id = $row['id'];
                                $cat_name = $row['category_name'];
                                echo "<ul class='footer_menu'><li><a href='categories.php?cat_id=$cat_id' class=''><i class='fa fa-angle-right'></i>&nbsp;&nbsp; $cat_name</a></li></ul>";
                            } ?>
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <div class="footer_main_title py-3"> Most Viewed Posts</div>
                <?php 
                    global $connection;
                    $most_viewed_posts_query = "SELECT `articles`.`id`,`articles`.`title`,`articles`.`published_date`,`articles`.`image` 
                    FROM `articles` 
                    ORDER BY post_views DESC LIMIT 4";

                    $execute_query = mysqli_query($connection, $most_viewed_posts_query);

                    while ($rows = mysqli_fetch_assoc($execute_query)) {
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $date = $rows['published_date'];

                        echo "<div class='footer_makes_sub_font'> {$date}</div>
                        <a href='single.php?p_id={$id}' class='footer_post pb-4'>{$title}</a>";                
                    }
                ?>
                <div class="footer_position_absolute"><img src="images/footer_sub_tipik.png" alt="img" class="width_footer_sub_img"/></div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3"> Last Modified Posts</div>
                <a href="#" class="footer_img_post_6"><img src="images/allef-vinicius-108153.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/32-450x260.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/download (1).jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/science-578x362.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/vil-son-35490.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/zack-minor-15104.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/download.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/download (2).jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="images/ryan-moreno-98837.jpg" alt="img"/></a>
            </div>
        </div>
        <br>
    </div>
</div>
<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved"> © Copyright 2020, All rights reserved. Design by XYZ. </div>
            <div class="col-12 col-md-6 spdp_right py-4">
                <a href="index.php" class="footer_last_part_menu">Home</a>
                <a href="Contact_us.php" class="footer_last_part_menu">About</a>
                <a href="Contact_us.php" class="footer_last_part_menu">Contact</a>
                <a href="blog.php" class="footer_last_part_menu">Latest News</a></div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
</body>