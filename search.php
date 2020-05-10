<!DOCTYPE html>
<html lang="en" class="no-js">

<body>
    <!-- including header -->
    <?php include "header.php" ?>
    <?php include "articlesDisplayQuerys.php"; ?>
    <?php include "dbConnection.php"; ?>

    <div class="container-fluid paddding mb-5">
        <!-- NEWS -->
        <div class="container-fluid pb-4 pt-4 paddding">
            <div class="container paddding">
                <div class="row mx-0">
                    <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                        <div>
                            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                        </div>
                        <?php
                        global $connection;
                        if (isset($_POST['search'])) {
                            $search = $_POST['search'];
                            $query = "SELECT * 
                        FROM `articles` 
                        LEFT JOIN `users` ON `users`.`id` = `articles`.`user_id` 
                        LEFT JOIN `category` ON `category`.`id` = `articles`.`category_id`
                        WHERE `articles`.`tags` LIKE '%$search%';";
                            $search_query = mysqli_query($connection, $query);
                            if (!$search_query) {
                                die("Query failed" . mysqli_error($connection));
                            }
                            $count = mysqli_num_rows($search_query);
                            if ($count == 0) {
                                echo "<h3>No result</h3>";
                            } else {
                                while ($row = mysqli_fetch_assoc($search_query)) {
                                    $post_id = $row['id'];
                                    $post_title = $row['title'];
                                    $post_date = $row['published_date'];
                                    $post_fname = $row['first_name'];
                                    $post_lname = $row['last_Name'];
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
                    </div>
                    <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                        <div>
                            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Categories</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="fh5co_tags_all">

                            <!-- Dinamyc Tags -->
                            <?php querys::displayCategories(); ?>

                        </div>
                        <div>
                            <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                        </div>
                        <?php querys::most_viewed_posts(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- including footer -->
        <?php include "footer.php" ?>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
        </div>
</body>

</html>