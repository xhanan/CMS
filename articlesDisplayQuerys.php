<?php
class querys
{

    static function indexNewsArticles()
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
                                        <div class='fh5co_news_img'><a href='single.php?p_id={$post_id}'><img src='{$post_photo}' alt='' style='object-fit: cover; max-height:100%;'/></div></a>
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



    static function categoryNews()
    {
        if (isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];
        } else {
            $cat_id = 0;
        }
        if (isset($_GET['cat_page'])) {
            $cat_page = $_GET['cat_page'];
            $pagenum = $cat_page * 8;
        } else {
            $pagenum = 0;
        }

        global $connection;
        $articleQuery = "SELECT `articles`.`id`,`articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`articles`.`image` 
                FROM `articles` 
                LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` 
                LEFT JOIN `category` ON `category`.`id` = `articles`.`category_id`
                WHERE `category`.`id` = {$cat_id}
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
                                        <div class='fh5co_news_img'><a href='single.php?p_id={$post_id}'><img src='{$post_photo}' alt='' style='object-fit: cover; max-height:100%;'/></div></a>
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

    static function displayCategories()
    {
        global $connection;
        $category = "SELECT * FROM category";
        $select_all_category_qyert = mysqli_query($connection, $category);

        while ($row = mysqli_fetch_assoc($select_all_category_qyert)) {
            $cat_title = $row['category_name'];
            $cat_id = $row['id'];
            echo "<a href='categories.php?cat_id=$cat_id' class='fh5co_tagg'>{$cat_title}</a>";
        }
    }

    static function mainPhoto()
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
            <div class='fh5co_suceefh5co_height'><img src={$photo} style = 'object-fit: cover;' alt='img'/>
            <div class='fh5co_suceefh5co_height_position_absolute'></div>
            <div class='fh5co_suceefh5co_height_position_absolute_font' style='left: 1%'>
            <div class=''><a href='#' class='color_fff'> <i class='fa fa-clock-o'></i>&nbsp;&nbsp;{$date}
            </a></div>
            <div class=''><a href='single.php?p_id={$postid}' class='fh5co_good_font' style='font-size: 24px'> {$title} </a></div>
            </div>
            </div>
            </div>";
        }
    }

    static function main4Photos()
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
                <div class='fh5co_suceefh5co_height_2' ><img src={$photo} style = 'object-fit: cover;' alt='img'/>
                    <div class='fh5co_suceefh5co_height_position_absolute'></div>
                        <div class='fh5co_suceefh5co_height_position_absolute_font_2' style='left: 1%'>
                            <div class=''><a href='#' class='color_fff'> <i class='fa fa-clock-o'></i>&nbsp;&nbsp;{$date} </a></div>
                            <div class=''><a href='single.php?p_id={$postid2}' class='fh5co_good_font_2' style='font-size: 18px'>{$title}</a>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }

    static function trending_news()
    {
        global $connection;
        $trending_posts_query = "SELECT `count_page_views`.`article_id`,`articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`articles`.`image` 
                                FROM `count_page_views`
                                INNER JOIN articles ON articles.id = count_page_views.article_id
                                INNER JOIN `users` ON `users`.`id` = `articles`.`user_id`
                                GROUP BY count_page_views.article_id HAVING COUNT(*)>2
                                ORDER BY  count_page_views.dateTime DESC LIMIT 10";

        $select_trending_posts = mysqli_query($connection, $trending_posts_query);

        while ($row3 = mysqli_fetch_assoc($select_trending_posts)) {
            $trending_id = $row3['article_id'];
            $trending_title = $row3['title'];
            $trending_fname = $row3['first_name'];
            $trending_lname = $row3['last_name'];
            $trending_published = $row3['published_date'];
            $trending_img = $row3['image'];

            echo "<div class='item px-2'>
                <div class='fh5co_latest_trading_img_position_relative'>
                    <div class='fh5co_latest_trading_img'><img src='{$trending_img}' alt='' class='fh5co_img_special_relative' style='object-fit: cover; max-height:100%;'/></div>
                    <div class='fh5co_latest_trading_img_position_absolute'></div>
                    <div class='fh5co_latest_trading_img_position_absolute_1'>
                        <a href='single.php?p_id={$trending_id}' class='text-white'> {$trending_title} </a>
                        <div class='fh5co_latest_trading_date_and_name_color'> {$trending_fname} {$trending_lname} - {$trending_published} </div>
                    </div>
                </div>
            </div>";
        }
    }

    static function recommended_posts()
    {
        global $connection;
        $cookie_value = $_COOKIE['brainbyte'];
        $news_posts_query = "SELECT * FROM articles
         WHERE id NOT IN (SELECT articles.id FROM articles 
         WHERE id IN (SELECT count_page_views.article_id FROM count_page_views WHERE count_page_views.cookie_id = '$cookie_value'))
         ORDER BY id DESC LIMIT 10";

        $select_news_posts = mysqli_query($connection, $news_posts_query);

        while ($row4 = mysqli_fetch_assoc($select_news_posts)) {
            $news_id = $row4['id'];
            $news_title = $row4['title'];
            $news_published = $row4['published_date'];
            $news_img = $row4['image'];

            echo "<div class='item px-2'>
                <div class='fh5co_hover_news_img'>
                    <div class='fh5co_news_img'><img src='{$news_img}' alt=''style='object-fit: cover; max-height:100%;'/></div>
                    <div>
                        <a href='single.php?p_id={$news_id}' class='d-block fh5co_small_post_heading'><span class=''>{$news_title}</span></a>
                        <div class='c_g'><i class='fa fa-clock-o'></i> {$news_published}</div>
                    </div>
                </div>
            </div>";
        }
    }

    static function pagination()
    {
        global $connection;
        $articleQuery = "SELECT * FROM articles";
        $find_count = mysqli_query($connection, $articleQuery);
        $count = mysqli_num_rows($find_count);
        $count = ceil($count / 8);

        $pervious =0;
        $next = 0;
        if (isset($_GET['page'])) {
            $pg = $_GET['page'];
            $pervious = $pg - 1;
            $next = $pg +1;
        }else{
            $pervious=0;
            $next = 0;
        }
            
        
        if($pervious>=0){
            echo "<div class='col-12 text-center pb-4 pt-4'>
            <a href='blog.php?page={$pervious}' class='btn_mange_pagging'><i class='fa fa-long-arrow-left'></i>&nbsp;&nbsp; Previous</a>";
        }
        if ($count > 1) {
            for ($i = 1; $i <= $count; $i++) {
                $page = $i - 1;
                echo "<a href='blog.php?page={$page}' class='btn_pagging'>{$i}</a>";
            }
        }
        if($next < $count){
            echo "<a href='blog.php?page={$next}' class='btn_mange_pagging'>Next <i class='fa fa-long-arrow-right'></i>&nbsp;&nbsp; </a>
            </div>";
        }
    }

    static function most_viewed_posts()
    {

        global $connection;
        $most_viewed_posts_query = "SELECT `articles`.`id`,`articles`.`title`,`articles`.`published_date`,`articles`.`image` 
        FROM `articles` 
        ORDER BY post_views DESC LIMIT 5";

        $execute_query = mysqli_query($connection, $most_viewed_posts_query);

        while ($rows = mysqli_fetch_assoc($execute_query)) {
            $id = $rows['id'];
            $title = $rows['title'];
            $date = $rows['published_date'];
            $img = $rows['image'];

            echo "<div class='row pb-3'>
        <div class='col-5 align-self-center'>
        <a href='single.php?p_id={$id}'> <img src='{$img}' alt='img' class='fh5co_most_trading' style='object-fit: cover; max-height:100%;'/></a>
        </div>
        <div class='col-7 paddding'>
            <div class='most_fh5co_treding_font'><a href='single.php?p_id={$id}'class='fh5co_magna py-2' style = 'font-size: 15px'> {$title} </a> </div>
            <div class='most_fh5co_treding_font_123'> {$date} </div>
        </div>
        </div>";
        }
    }

    static function categoryPagination()
    {
        if (isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];
        } else {
            $cat_id = 0;
        }
        global $connection;
        $articleQuery = "SELECT * FROM articles WHERE category_id = $cat_id";
        $find_count = mysqli_query($connection, $articleQuery);
        $count = mysqli_num_rows($find_count);
        $count = ceil($count / 8);

        $pervious =0;
        $next = 0;
        if (isset($_GET['cat_page'])) {
            $pg = $_GET['cat_page'];
            $pervious = $pg - 1;
            $next = $pg +1;
        }else{
            $pervious=0;
            $next = 0;
        }
            
        
        if($pervious>=0){
            echo "<div class='col-12 text-center pb-4 pt-4'>
            <a href='categories.php?cat_id={$cat_id}&cat_page={$pervious}' class='btn_mange_pagging'><i class='fa fa-long-arrow-left'></i>&nbsp;&nbsp; Previous</a>";
        }
        if ($count > 1) {
            for ($i = 1; $i <= $count; $i++) {
                $page = $i - 1;
                echo "<a href='categories.php?cat_id={$cat_id}&cat_page={$page}' class='btn_pagging'>{$i}</a>";
            }
        }
        if($next < $count){
            echo "<a href='categories.php?cat_id={$cat_id}&cat_page={$next}' class='btn_mange_pagging'>Next <i class='fa fa-long-arrow-right'></i>&nbsp;&nbsp; </a>
            </div>";
        }
    }
    static function profilePagination($user_id)
    {
        global $connection;
        if (isset($_GET['page_id'])) {
            $pgnName = $_GET['page_id'];
        }

        if ($pgnName === "bookmarks") {
            $articleQuery = "SELECT * FROM bookmarks WHERE user_id = {$user_id}";
        } else if ($pgnName === "comments") {
            $articleQuery = "SELECT * FROM comments WHERE user_id = {$user_id}";
        } else if ($pgnName === "posts") {
            $articleQuery = "SELECT * FROM articles WHERE user_id = {$user_id}";
        }

        $find_count = mysqli_query($connection, $articleQuery);
        $count = mysqli_num_rows($find_count);
        $count = ceil($count / 8);
        
        $pervious =0;
        $next = 0;
        if (isset($_GET['pagination'])) {
            $pg = $_GET['pagination'];
            $pervious = $pg - 1;
            $next = $pg +1;
        }else{
            $pervious=0;
            $next = 0;
        }
            
        
        if($pervious>=0){
            echo "<div class='col-12 text-center pb-4 pt-4'>
            <a href='profile.php?page_id={$pgnName}&pagination={$pervious}' class='btn_mange_pagging'><i class='fa fa-long-arrow-left'></i>&nbsp;&nbsp; Previous</a>";
        }
        if ($count > 1) {
            for ($i = 1; $i <= $count; $i++) {
                $page = $i - 1;
                echo "<a href='profile.php?page_id={$pgnName}&pagination={$page}' class='btn_pagging'>{$i}</a>";
            }
        }
        if($next < $count){
            echo "<a href='profile.php?page_id={$pgnName}&pagination={$next}' class='btn_mange_pagging'>Next <i class='fa fa-long-arrow-right'></i>&nbsp;&nbsp; </a>
            </div>";
        }
    }

    static function profileArticles($user_id)
    {
        global $connection;
        if (isset($_GET['page_id'])) {
            $table = $_GET['page_id'];
        }

        if (isset($_GET['pagination'])) {
            $pagination = $_GET['pagination'];
        } else {
            $pagination = 0;
        }

        $pagenum = $pagination * 8;

        if ($table === "posts") {
            $articleQuery = "SELECT `articles`.`id`,`articles`.`title`,`users`.`first_name`,`users`.`last_name`,`users`.`isadmin`,`articles`.`published_date`,`articles`.`image` 
            FROM `articles` 
            LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` 
            WHERE `users`.`id` = {$user_id}
            ORDER BY `articles`.`id` DESC LIMIT 8 OFFSET $pagenum";
            
        } else if ($table === "bookmarks") {
            $articleQuery = "SELECT articles.id,bookmarks.user_id,bookmarks.article_id,users.first_name,users.last_name,articles.title,articles.published_date,articles.image,users.isadmin
            FROM bookmarks 
            INNER JOIN articles ON articles.id = bookmarks.article_id 
            INNER JOIN users ON users.id = bookmarks.user_id 
            WHERE bookmarks.user_id = $user_id 
            ORDER BY `bookmarks`.`id` DESC LIMIT 8 OFFSET $pagenum";
        } else if ($table == "comments") {
            $articleQuery = "SELECT distinct articles.id,comments.user_id,comments.article_id,users.first_name,users.last_name,articles.title,articles.published_date,articles.image,users.isadmin
            FROM comments 
            INNER JOIN articles ON articles.id = comments.article_id 
            INNER JOIN users ON users.id = comments.user_id 
            WHERE comments.user_id = $user_id
            ORDER BY `comments`.`id` DESC LIMIT 8 OFFSET $pagenum";
        }


        $select_all_articles = mysqli_query($connection, $articleQuery);
        while ($row = mysqli_fetch_assoc($select_all_articles)) {
            $post_id = $row['id'];
            $post_title = $row['title'];
            $post_date = $row['published_date'];
            $post_fname = $row['first_name'];
            $post_lname = $row['last_name'];
            $post_photo = $row['image'];
            $admin = $row['isadmin'];
            if($table === "posts"){
                $delete_button = "<button class='btn btn-primary' type='submit' onclick='delete_post($post_id);'>Delete</button>";
            }
            else{
                $delete_button = "";
            }

            echo " <div id='somePost-{$post_id}' class='row pb-4'>
                        <div class='col-md-5'>
                            <div class='fh5co_hover_news_img'>
                                <div class='fh5co_news_img'><a href='single.php?p_id={$post_id}'><img src='{$post_photo}' alt='' style='object-fit: cover; max-height:100%;'/></a></div>
                            <div>
                        </div>
                    </div>
                </div>
                <div class='col-md-7'>
                    <a href='single.php?p_id={$post_id}'class='fh5co_magna py-2' style = 'font-size: 20px'> {$post_title} </a> <br> <a href='#' class='fh5co_mini_time py-3'> {$post_fname} {$post_lname} -
                        {$post_date} </a>
                        <br> ";
            if (isset($admin)) {
                echo "<input class='btn btn-primary' type='button' onclick='location.href=\"editPost.php?p_id={$post_id}\";' value='Edit Post' /> ".$delete_button;
            }
            echo "</div>
                </div>";
        }
    }

    static function last_visited_posts(){
        global $connection;

        $cookie_value = $_COOKIE['brainbyte'];
        
        $last_visited_posts_query = "SELECT count_page_views.article_id,articles.title,articles.content,articles.published_date,articles.image FROM count_page_views
        INNER JOIN articles ON articles.id = count_page_views.article_id
        WHERE count_page_views.cookie_id = '$cookie_value'
        GROUP BY count_page_views.article_id 
        ORDER BY dateTime
        LIMIT 5";

        $execute_query = mysqli_query($connection, $last_visited_posts_query);

        while ($rows = mysqli_fetch_assoc($execute_query)) {
            $id = $rows['article_id'];
            $title = $rows['title'];
            $date = $rows['published_date'];
            $img = $rows['image'];

            echo "<div class='row pb-3'>
            <div class='col-5 align-self-center'>
            <a href='single.php?p_id={$id}'><img src='{$img}' alt='img' class='fh5co_most_trading' style='object-fit: cover; max-height:100%;'/></a>
            </div>
            <div class='col-7 paddding'>
            <div class='most_fh5co_treding_font'><a href='single.php?p_id={$id}'class='fh5co_magna py-2' style = 'font-size: 15px'> {$title} </a> </div>
            <div class='most_fh5co_treding_font_123'> {$date} </div>
            </div>
            </div>";
        }
        
    }

    static function recommended_posts_single(){
        global $connection;
        $cookie_value = $_COOKIE['brainbyte'];
        $news_posts_query = "SELECT * FROM articles
         WHERE id NOT IN (SELECT articles.id FROM articles 
         WHERE id IN (SELECT count_page_views.article_id FROM count_page_views WHERE count_page_views.cookie_id = '$cookie_value'))
         ORDER BY id DESC LIMIT 10";

        $select_news_posts = mysqli_query($connection, $news_posts_query);

        while ($row4 = mysqli_fetch_assoc($select_news_posts)) {
            $news_id = $row4['id'];
            $news_title = $row4['title'];
            $news_published = $row4['published_date'];
            $news_img = $row4['image'];

            echo "<div class='item px-2'>
            <div class='fh5co_hover_news_img'>
                <div class='fh5co_news_img'><a href='single.php?p_id={$news_id}'><img src={$news_img} style='object-fit: cover; max-height:100%;' alt=''/></a></div>
                <div>
                    <a href='single.php?p_id={$news_id}' class='d-block fh5co_small_post_heading'><span class=''>{$news_title}</span></a>
                    <div class='c_g'><i class='fa fa-clock-o'></i> {$news_published}</div>
                </div>
            </div>
        </div>";
        }
    }
}

