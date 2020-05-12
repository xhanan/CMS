<?php 
    
    function latest_posts()
    {

        global $connection;
        $articleQuery = "SELECT `articles`.`id`,`articles`.`title`,`users`.`first_name`,`users`.`last_name`,`articles`.`published_date`,`articles`.`image` 
	    FROM `articles` 
	    LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` 
	    LEFT JOIN `category` ON `category`.`id` = `articles`.`category_id`
	    ORDER BY `articles`.`id` DESC LIMIT 3;";

        $articles = mysqli_query($connection, $articleQuery);
        while ($row = mysqli_fetch_assoc($articles)) {
            $id = $row['id'];
            $title = $row['title'];
            $date = $row['published_date'];
            $img = $row['image'];

            echo "<div class='row pb-3'>
        <div class='col-5 align-self-center'>
            <img src='{$img}' alt='img' class='fh5co_most_trading' />
        </div>
        <div class='col-7 paddding'>
            <div class='most_fh5co_treding_font'><a href='single.php?p_id={$id}'class='footer_post pb-4'> {$title} </a> </div>
            <div class='most_fh5co_treding_font_123'> {$date} </div>
        </div>
         </div>";
        }
    }

    function categories(){
        global $connection;
        $query = "SELECT * FROM category";
        $select_categories = mysqli_query($connection,$query);
                //confirmQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_categories )) {
                    $cat_id = $row['id'];
                    $cat_name = $row['category_name'];
                    echo "<ul class='footer_menu'><li><a href='categories.php?cat_id=$cat_id' class=''><i class='fa fa-angle-right'></i>&nbsp;&nbsp; $cat_name</a></li></ul>";
                }
    }

    function mostViewedPosts(){
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
    }
?>