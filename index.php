<!DOCTYPE html>
<html lang="en" class="no-js">
<body>
<!-- including header -->
<?php include "header.php"?>
<?php include "dbConnection.php";?>
<div class="container-fluid paddding mb-5">
    <!-- FOTOJA E MADHE ka vend per permisime -->
    <div class="row mx-0">
    <?php  
        $first_posts_query = "SELECT `articles`.`title`,`articles`.`published_date`,`media`.`url` 
                        FROM `articles` 
                        INNER JOIN `users` ON `users`.`id` = `articles`.`user_id` 
                        INNER JOIN `category` ON `category`.`id` = `articles`.`category_id`
                        INNER JOIN `media` ON `articles`.`id` = `media`.`article_id`
                        ORDER BY rand() LIMIT 1";
    
        $select_main_photo = mysqli_query($connection,$first_posts_query);


        while($row1 = mysqli_fetch_assoc($select_main_photo)){
            $title = $row1['title'];
            $date = $row1['published_date'];
            $photo = $row1['url'];  
            
            echo "<div class='col-md-6 col-12 paddding animate-box' data-animate-effect='fadeIn'>
            <div class='fh5co_suceefh5co_height'><img src={$photo} alt='img'/>
            <div class='fh5co_suceefh5co_height_position_absolute'></div>
            <div class='fh5co_suceefh5co_height_position_absolute_font'>
                <div class=''><a href='#' class='color_fff'> <i class='fa fa-clock-o'></i>&nbsp;&nbsp;{$date}
                </a></div>
                <div class=''><a href='single.php' class='fh5co_good_font'> {$title} </a></div>
            </div>
        </div>
    </div>";

        }

    ?>
        <!-- 4 FOTOT E NJEJTA -->
        <div class="col-md-6">
            <div class="row">
                <?php
                        
                        $four_posts_query = "SELECT `articles`.`title`,`articles`.`published_date`,`media`.`url` 
                        FROM `articles` 
                        INNER JOIN `users` ON `users`.`id` = `articles`.`user_id` 
                        INNER JOIN `category` ON `category`.`id` = `articles`.`category_id`
                        INNER JOIN `media` ON `articles`.`id` = `media`.`article_id`
                        ORDER BY rand() LIMIT 4";
    
                        $select_four_photos = mysqli_query($connection,$four_posts_query);


                        while($row2 = mysqli_fetch_assoc($select_four_photos)){
                            $title = $row2['title'];
                            $date = $row2['published_date'];
                            $photo = $row2['url'];
                                        
                        
                        
                        echo "<div class='col-md-6 col-6 paddding animate-box' data-animate-effect='fadeIn'>
                            <div class='fh5co_suceefh5co_height_2'><img src={$photo} alt='img'/>
                                <div class='fh5co_suceefh5co_height_position_absolute'></div>
                                <div class='fh5co_suceefh5co_height_position_absolute_font_2'>
                                    <div class=''><a href='#' class='color_fff'> <i class='fa fa-clock-o'></i>&nbsp;&nbsp;{$date} </a></div>
                                    <div class=''><a href='single.php' class='fh5co_good_font_2'>{$title}</a></div>
                                </div>
                            </div>
                        </div>";

                        }
                ?>

              
            </div>
        </div>
    </div>
</div>



<!-- TRENDING -->
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            <?php
                $trending_posts_query = "SELECT `articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`media`.`url` 
                                        FROM `articles` 
                                        INNER JOIN `users` ON `users`.`id` = `articles`.`user_id` 
                                        INNER JOIN `media` ON `articles`.`id` = `media`.`article_id`
                                        ORDER BY  `articles`.`id` DESC LIMIT 10";

                $select_trending_posts = mysqli_query($connection,$trending_posts_query);

                while($row3 = mysqli_fetch_assoc($select_trending_posts)){
                    $trending_title = $row3['title'];
                    $trending_fname = $row3['first_name'];
                    $trending_lname = $row3['last_name'];
                    $trending_published = $row3['published_date'];
                    $trending_img = $row3['url'];

                    echo "<div class='item px-2'>
                    <div class='fh5co_latest_trading_img_position_relative'>
                        <div class='fh5co_latest_trading_img'><img src='{$trending_img}' alt='' class='fh5co_img_special_relative'/></div>
                        <div class='fh5co_latest_trading_img_position_absolute'></div>
                        <div class='fh5co_latest_trading_img_position_absolute_1'>
                            <a href='single.php' class='text-white'> {$trending_title} </a>
                            <div class='fh5co_latest_trading_date_and_name_color'> {$trending_fname} {$trending_lname} - {$trending_published} </div>
                        </div>
                    </div>
                </div>";
                }
            ?>
        </div>
    </div>
</div>

<!-- NEWS -->
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
        <?php
                $news_posts_query = "SELECT `articles`.`title`,`articles`.`published_date`,`media`.`url` 
                                        FROM `articles` 
                                        INNER JOIN `media` ON `articles`.`id` = `media`.`article_id`
                                        ORDER BY  `articles`.`id` DESC LIMIT 6";

                $select_news_posts = mysqli_query($connection,$news_posts_query);

                while($row4 = mysqli_fetch_assoc($select_news_posts)){
                    $news_title = $row4['title'];
                    $news_published = $row4['published_date'];
                    $news_img = $row4['url'];

                    echo "<div class='item px-2'>
                    <div class='fh5co_hover_news_img'>
                        <div class='fh5co_news_img'><img src='{$news_img}' alt=''/></div>
                        <div>
                            <a href='single.php' class='d-block fh5co_small_post_heading'><span class=''>{$news_title}</span></a>
                            <div class='c_g'><i class='fa fa-clock-o'></i> {$news_published}</div>
                        </div>
                    </div>
                </div>";
                }
            ?>
        </div>
    </div>
</div>

<!-- VIDEO NEWS -->
<div class="container-fluid fh5co_video_news_bg pb-4">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-white">Video News</div>
        </div>
        <div>
            <div class="owl-carousel owl-theme" id="slider3">
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video" width="100%" height="200"
                                        src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                <img src="images/ariel-lustre-208615.jpg" alt=""/>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide" id="play-video">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class="">The top 10 funniest videos on YouTube </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video_2" width="100%" height="200"
                                        src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_2">
                                <img src="images/39-324x235.jpg" alt=""/></div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_2" id="play-video_2">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class="">The top 10 embedded YouTube videos this month</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video_3" width="100%" height="200"
                                        src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_3">
                                <img src="images/joe-gardner-75333.jpg" alt=""/></div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_3" id="play-video_3">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class="">The top 10 best computer speakers in the market</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video_4" width="100%" height="200"
                                        src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_4">
                                <img src="images/vil-son-35490.jpg" alt=""/>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_4" id="play-video_4">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 best computer speakers in the market</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- NEWS -->
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>

                <?php
                    
                    
                    $articleQuery = "SELECT `articles`.`title`, `articles`.`content`, `category`.`category_name`, `users`.`first_name`,`users`.`last_name`,
                                    `articles`.`published_date`,`articles`.`schedule_post`,`media`.`url` 
                                    FROM `articles` 
                                    INNER JOIN `users` ON `users`.`id` = `articles`.`user_id` 
                                    INNER JOIN `category` ON `category`.`id` = `articles`.`category_id`
                                    INNER JOIN `media` ON `articles`.`id` = `media`.`article_id` LIMIT 10";

                    $select_all_articles = mysqli_query($connection,$articleQuery);
                    while($row = mysqli_fetch_assoc($select_all_articles)){
                        $post_title = $row['title'];
                        $post_content = $row['content'];
                        $post_category = $row['category_name'];
                        $post_date = $row['published_date'];
                        $post_fname = $row['first_name'];
                        $post_lname = $row['last_name'];
                        $post_photo = $row['url'];
                        
                        echo " <div class='row pb-4'>
                        <div class='col-md-5'>
                            <div class='fh5co_hover_news_img'>
                                <div class='fh5co_news_img'><img src={$post_photo} alt=''/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class='col-md-7 animate-box'>
                            <a href='single.php' class='fh5co_magna py-2'>{$post_title}</a><br> <a href='single.php' class='fh5co_mini_time py-3'> {$post_fname} {$post_lname} -
                            {$post_date} </a>
                            <div class='fh5co_consectetur'> {$post_content}
                            </div>
                        </div>
                    </div>";
                    }
                    

                ?>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="images/office-768x512.jpg" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a href="single.php" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis
                        nostrud quis xercitation ullamco. </a> <a href="#" class="fh5co_mini_time py-3"> Thomson Smith -
                        April 18,2016 </a>
                        <div class="fh5co_consectetur"> Amet consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Categories</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                
                    <!-- Dinamyc Tags -->
                    <?php include "tags.php"?>
                
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/download (1).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/allef-vinicius-108153.jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Enim ad minim veniam nostrud xercitation ullamco.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/download (2).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center"><img src="images/seth-doyle-133175.jpg" alt="img"
                                                              class="fh5co_most_trading"/></div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>

<!-- including footer -->
<?php include "footer.php"?>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>
</body>
</html>