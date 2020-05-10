<?php
    class querys{
        
        static function indexNewsArticles(){
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

        static function categoryNews(){
            if (isset($_GET['cat_id']) ) {
                $cat_id = $_GET['cat_id'];
            } else {
                $cat_id = 0;
            }
            if (isset($_GET['cat_page']) ) {
                $cat_page = $_GET['cat_page'];
                $pagenum = $cat_page * 8;
            }else{
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
    }

?>