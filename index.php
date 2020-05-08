<!DOCTYPE html>
<html lang="en" class="no-js">

<body>
    <!-- including header -->
    <?php include "header.php" ?>
    <?php //include "dbConnection.php";
    ?>
    <?php include "indexFunctions.php"; ?>
    <div class="container-fluid paddding mb-5">
        <!-- FOTOJA E MADHE ka vend per permisime -->
        <div class="row mx-0">
            <?php first_photo() ?>

            <!-- 4 FOTOT E NJEJTA -->
            <div class="col-md-6">
                <div class="row">
                    <?php four_photos() ?>
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
                <?php trending_news() ?>
            </div>
        </div>
    </div>

    <!-- NEWS -->
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Top News</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                <?php top_six_news_posts() ?>
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
                    <?php news() ?>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Categories</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">

                        <!-- Dinamyc Tags -->
                        <?php showCategories();?>

                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    <?php most_viewed_posts();?>
                    </div>
            </div>
            <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
                <div class="col-12 text-center pb-4 pt-4">
                    <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                    <?php pagination(); ?>
                    <!-- <a href="#" class="btn_pagging">1</a> -->
                    <!-- <a href="#" class="btn_pagging">2</a> -->
                    <!-- <a href="#" class="btn_pagging">3</a> -->
                    <!-- <a href="#" class="btn_pagging">...</a> -->
                    <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
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