<?php include "header.php"?>
<?php include "dbConnection.php";?>
<?php include "articlesDisplayQuerys.php";?>

<!-- ----------------------BODY------------------ -->
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                <?php querys::categoryNews();?>
            </div>
                   
            
            <!-- Dinamyc Tags -->
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Categories</div>
                </div>
                <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        <?php querys::displayCategories();?>
                    </div>
                    <!-- MOST POPULAR -->
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Last Visited</div>
                </div>
                <div class="row pb-3">
                    <?php querys::last_visited_posts();?>
                </div>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                    <?php querys::categoryPagination();?>
             </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Recommended for you</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            <?php querys::recommended_posts_single();?>            
        </div>
    </div>
</div>
<?php include "footer.php"?>
