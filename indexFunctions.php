<?php
include "dbConnection.php";

function first_photo()
{
    global $connection;
    $first_posts_query = "SELECT `id`,`title`,`published_date`,`image` 
        FROM `articles`
        ORDER BY rand() LIMIT 1";

    $select_main_photo = mysqli_query($connection, $first_posts_query);


    while ($row1 = mysqli_fetch_assoc($select_main_photo)) {
        $postid = $row1['id'];
        $title = $row1['title'];
        $date = $row1['published_date'];
        $photo = $row1['image'];

        echo "<div class='col-md-6 col-12 paddding animate-box' data-animate-effect='fadeIn'>
            <div class='fh5co_suceefh5co_height'><img src={$photo} alt='img'/>
            <div class='fh5co_suceefh5co_height_position_absolute'></div>
            <div class='fh5co_suceefh5co_height_position_absolute_font'>
            <div class=''><a href='#' class='color_fff'> <i class='fa fa-clock-o'></i>&nbsp;&nbsp;{$date}
            </a></div>
            <div class=''><a href='single.php?p_id={$postid}' class='fh5co_good_font'> {$title} </a></div>
            </div>
            </div>
            </div>";
    }
}

function four_photos()
{
    global $connection;
    $four_posts_query = "SELECT `id`,`title`,`published_date`,`image` 
                            FROM `articles`
                            ORDER BY rand() LIMIT 4";

    $select_four_photos = mysqli_query($connection, $four_posts_query);

    while ($row2 = mysqli_fetch_assoc($select_four_photos)) {
        $postid2 = $row2['id'];
        $title = $row2['title'];
        $date = $row2['published_date'];
        $photo = $row2['image'];

        echo "<div class='col-md-6 col-6 paddding animate-box' data-animate-effect='fadeIn'>
                <div class='fh5co_suceefh5co_height_2'><img src={$photo} alt='img'/>
                    <div class='fh5co_suceefh5co_height_position_absolute'></div>
                        <div class='fh5co_suceefh5co_height_position_absolute_font_2'>
                            <div class=''><a href='#' class='color_fff'> <i class='fa fa-clock-o'></i>&nbsp;&nbsp;{$date} </a></div>
                            <div class=''><a href='single.php?p_id={$postid2}' class='fh5co_good_font_2'>{$title}</a>
                        </div>
                    </div>
                </div>
            </div>";
    }
}

function trending_news()
{
    global $connection;
    $trending_posts_query = "SELECT `articles`.`id`,`articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`articles`.`image` 
                                FROM `articles` 
                                INNER JOIN `users` ON `users`.`id` = `articles`.`user_id`
                                ORDER BY  `articles`.`id` DESC LIMIT 10";

    $select_trending_posts = mysqli_query($connection, $trending_posts_query);

    while ($row3 = mysqli_fetch_assoc($select_trending_posts)) {
        $trending_id = $row3['id'];
        $trending_title = $row3['title'];
        $trending_fname = $row3['first_name'];
        $trending_lname = $row3['last_name'];
        $trending_published = $row3['published_date'];
        $trending_img = $row3['image'];

        echo "<div class='item px-2'>
                <div class='fh5co_latest_trading_img_position_relative'>
                    <div class='fh5co_latest_trading_img'><img src='{$trending_img}' alt='' class='fh5co_img_special_relative'/></div>
                    <div class='fh5co_latest_trading_img_position_absolute'></div>
                    <div class='fh5co_latest_trading_img_position_absolute_1'>
                        <a href='single.php?p_id={$trending_id}' class='text-white'> {$trending_title} </a>
                        <div class='fh5co_latest_trading_date_and_name_color'> {$trending_fname} {$trending_lname} - {$trending_published} </div>
                    </div>
                </div>
            </div>";
    }
}

function top_six_news_posts()
{
    global $connection;
    $news_posts_query = "SELECT `id`,`title`,`published_date`,`image` 
                            FROM `articles`
                            ORDER BY `id` DESC LIMIT 6";

    $select_news_posts = mysqli_query($connection, $news_posts_query);

    while ($row4 = mysqli_fetch_assoc($select_news_posts)) {
        $news_id = $row4['id'];
        $news_title = $row4['title'];
        $news_published = $row4['published_date'];
        $news_img = $row4['image'];

        echo "<div class='item px-2'>
                <div class='fh5co_hover_news_img'>
                    <div class='fh5co_news_img'><img src='{$news_img}' alt=''/></div>
                    <div>
                        <a href='single.php?p_id={$news_id}' class='d-block fh5co_small_post_heading'><span class=''>{$news_title}</span></a>
                        <div class='c_g'><i class='fa fa-clock-o'></i> {$news_published}</div>
                    </div>
                </div>
            </div>";
    }
}

function news()
{

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 0;
    }

    $pagenum = $page * 8;

    global $connection;
    $articleQuery = "SELECT `articles`.`id`,`articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`articles`.`image` 
        FROM `articles` 
        LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` 
        LEFT JOIN `category` ON `category`.`id` = `articles`.`category_id`
        ORDER BY `articles`.`id` DESC LIMIT 8 OFFSET $pagenum";




    $select_all_articles = mysqli_query($connection, $articleQuery);
    while ($row = mysqli_fetch_assoc($select_all_articles)) {
        $post_id = $row['id'];
        $post_title = $row['title'];
        $post_date = $row['published_date'];
        $post_fname = $row['first_name'];
        $post_lname = $row['last_name'];
        $post_photo = $row['image'];

        echo " <div class='row pb-4'>
                        <div class='col-md-5'>
                            <div class='fh5co_hover_news_img'>
                                <div class='fh5co_news_img'><img src='{$post_photo}' alt=''/></div>
                            <div>
                        </div>
                    </div>
                </div>
                <div class='col-md-7'>
                    <a href='single.php?p_id={$post_id}'class='fh5co_magna py-2' style = 'font-size: 20px'> {$post_title} </a> <br> <a href='#' class='fh5co_mini_time py-3'> {$post_fname} {$post_lname} -
                        {$post_date} </a>
                    </div>
                </div>";
    }
}

function pagination()
{
    global $connection;
    $articleQuery = "SELECT * FROM articles";
    $find_count = mysqli_query($connection, $articleQuery);
    $count = mysqli_num_rows($find_count);
    $count = ceil($count / 8);

    for ($i = 1; $i < $count; $i++) {

        echo "<a href='blog.php?page={$i}' class='btn_pagging'>{$i}</a>";
    }
}

function profilePagination($user_id)
{
    global $connection;
    $articleQuery = "SELECT * FROM articles WHERE user_id = {$user_id}";
    $find_count = mysqli_query($connection, $articleQuery);
    $count = mysqli_num_rows($find_count);
    $count = ceil($count / 8);

    for ($i = 1; $i < $count; $i++) {

        echo "<a href='profile.php?bookmarks={$i}' class='btn_pagging'>{$i}</a>";
    }
}

function profileArticles($user_id)
{

    if (isset($_GET['bookmarks'])) {
        $bookmark = $_GET['bookmarks'];
    } else {
        $bookmark = 0;
    }

    $pagenum = $bookmark * 8;

    global $connection;
    $articleQuery = "SELECT `articles`.`id`,`articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`articles`.`image` 
        FROM `articles` 
        LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` 
        WHERE `users`.`id` = {$user_id}
        ORDER BY `articles`.`id` DESC LIMIT 8 OFFSET $pagenum";




    $select_all_articles = mysqli_query($connection, $articleQuery);
    while ($row = mysqli_fetch_assoc($select_all_articles)) {
        $post_id = $row['id'];
        $post_title = $row['title'];
        $post_date = $row['published_date'];
        $post_fname = $row['first_name'];
        $post_lname = $row['last_name'];
        $post_photo = $row['image'];

        echo " <div class='row pb-4'>
                        <div class='col-md-5'>
                            <div class='fh5co_hover_news_img'>
                                <div class='fh5co_news_img'><img src='{$post_photo}' alt=''/></div>
                            <div>
                        </div>
                    </div>
                </div>
                <div class='col-md-7'>
                    <a href='single.php?p_id={$post_id}'class='fh5co_magna py-2' style = 'font-size: 20px'> {$post_title} </a> <br> <a href='#' class='fh5co_mini_time py-3'> {$post_fname} {$post_lname} -
                        {$post_date} </a>
                    </div>
                </div>";
    }
}

function showCategories(){
    global $connection;
    $category = "SELECT * FROM category";
    $select_all_category_qyert = mysqli_query($connection,$category);

    while($row = mysqli_fetch_assoc($select_all_category_qyert)){
        $cat_title = $row['category_name'];
        $cat_id = $row['id'];
        echo "<a href='categories.php?cat_id=$cat_id' class='fh5co_tagg'>{$cat_title}</a>";
    }
}  

function most_viewed_posts(){

    global $connection;
    $most_viewed_posts_query = "SELECT `articles`.`id`,`articles`.`title`,`articles`.`published_date`,`articles`.`image` 
    FROM `articles` 
    ORDER BY post_views DESC LIMIT 5";
    
    $execute_query = mysqli_query($connection,$most_viewed_posts_query);

    while($rows = mysqli_fetch_assoc($execute_query)){
        $id = $rows['id'];
        $title = $rows['title'];
        $date = $rows['published_date'];
        $img = $rows['image'];

        echo "<div class='row pb-3'>
        <div class='col-5 align-self-center'>
            <img src='{$img}' alt='img' class='fh5co_most_trading' />
        </div>
        <div class='col-7 paddding'>
            <div class='most_fh5co_treding_font'><a href = 'single.php/p_id = {$id}'>{$title}</a> </div>
            <div class='most_fh5co_treding_font_123'> {$date} </div>
        </div>
    </div>";
    }
}