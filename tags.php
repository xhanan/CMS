<?php
    include "dbConnection.php";
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
   
   function categoriesPosts(){
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

 function categoryPagination()
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

    for ($i = 1; $i < $count; $i++) {

        echo "<a href='categories.php?cat_id={$cat_id}&cat_page=$i' class='btn_pagging'>{$i}</a>";
    }
}

?>