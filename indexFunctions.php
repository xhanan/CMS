<?php
    include "dbConnection.php";
    
    function first_photo(){
        global $connection;
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
    }

    function four_photos(){
        global $connection;
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
                            <div class=''><a href='single.php' class='fh5co_good_font_2'>{$title}</a>
                        </div>
                    </div>
                </div>
            </div>";

        }
    }

    function trending_news(){
        global $connection;
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
    }

    function top_six_news_posts(){
        global $connection;
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
    }

    function news(){
        global $connection;
        $articleQuery = "SELECT `articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`media`.`url` 
        FROM `articles` 
        INNER JOIN `users` ON `users`.`id` = `articles`.`user_id` 
        INNER JOIN `category` ON `category`.`id` = `articles`.`category_id`
        INNER JOIN `media` ON `articles`.`id` = `media`.`article_id` LIMIT 10";

        $select_all_articles = mysqli_query($connection,$articleQuery);
        while($row = mysqli_fetch_assoc($select_all_articles)){
        $post_title = $row['title'];
        $post_date = $row['published_date'];
        $post_fname = $row['first_name'];
        $post_lname = $row['last_name'];
        $post_photo = $row['url'];

            echo " <div class='row pb-4'>
                        <div class='col-md-5'>
                            <div class='fh5co_hover_news_img'>
                                <div class='fh5co_news_img'><img src='{$post_photo}' alt=''/></div>
                            <div>
                        </div>
                    </div>
                </div>
                <div class='col-md-7'>
                    <a href='single.php' class='fh5co_magna py-2' style = 'font-size: 20px'> {$post_title} </a> <br> <a href='#' class='fh5co_mini_time py-3'> {$post_fname} {$post_lname} -
                        {$post_date} </a>
                    </div>
                </div>";
        }

    }
?>