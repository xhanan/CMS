<!DOCTYPE php>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="css/comment.css" rel="stylesheet">
<php lang="en" class="no-js">

    <body class="single">
        <?php include "postFunctions.php"; ?>
        <?php include "articlesDisplayQuerys.php"; ?>
        <?php include "header.php";
        if (isset($_SESSION['id'])) {
            $idPerson = $_SESSION['id'];
        } else {
            $idPerson = null;
        } ?>
        <?php
        if (isset($_GET['p_id'])) {
            $id = esc($_GET['p_id']);
            $post = getPost($id);
            cout_page_views($id,$idPerson);
        }
        ?>
        <div id="fh5co-title-box" style="background-image: url(<?php getPostImage($id) ?>); background-position: 50% 90.5px;" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="page-title">
                <h2><?php echo $post['title']; ?></h2>
            </div>
        </div>
        <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
            <div class="container paddding">
                <div class="row mx-0">
                    <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">



                        <?php echo html_entity_decode($post['content']); ?>

                        <?php
                        if (isset($idPerson)) {
                            $userid = $idPerson;
                            $query = "SELECT * FROM bookmarks WHERE user_id={$userid} AND article_id={$id};";
                            $select_query = mysqli_query($connection, $query);
                            if (mysqli_num_rows($select_query) == 0) {
                                echo '<button type="button" id="fav" class="btn">Favorite</button>';
                            } else {
                                echo '<button type="button" id="fav" class="btn btn-success">Favorite</button>';
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
                            <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Last Visited</div>
                        </div>
                        <?php querys::last_visited_posts(); ?>
                    </div>
                </div>
                <div id="commentDiv">
                 <div class="row">
                        <?php getComment($id, $idPerson) ?>
                        <?php
                        if (isset($idPerson)) {
                            echo '
    <div class="col-md-8">
    <div class="media g-mb-30 media-comment">
    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src='; ?> <?php echo isMale($idPerson); ?> <?php echo ' alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
              <h5 class="h5 g-color-gray-dark-v1 mb-0"> '; ?> <?php echo getName($idPerson); ?><?php echo " </h5>
              </div>
              <br> <div class='form-group'>
              <textarea id='permbajtja' class='form-control' placeholder='Type comment'></textarea>
              </div>
              <ul class='list-inline d-sm-flex my-0'>
                <li class='list-inline-item ml-auto'>
                    <button onclick='create_($id);' type='submit' name='send_comment' class='btn btn-primary'>Comment</button>
                </li>
              </ul>
            </div>
        </div>
    </div>
    </div>";
                        } ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid pb-4 pt-5">
                <div class="container animate-box">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
                    </div>
                    <div class="owl-carousel owl-theme" id="slider2">
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="images/39-324x235.jpg" alt="" /></div>
                                <div>
                                    <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                                    <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                                </div>
                            </div>
                        </div>
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="images/joe-gardner-75333.jpg" alt="" /></div>
                                <div>
                                    <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                                    <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                                </div>
                            </div>
                        </div>
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="images/ryan-moreno-98837.jpg" alt="" /></div>
                                <div>
                                    <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                                    <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                                </div>
                            </div>
                        </div>
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="images/seth-doyle-133175.jpg" alt="" /></div>
                                <div>
                                    <a href="#" class="d-block fh5co_small_post_heading"><span class="">The top 10 best computer speakers in the market</span></a>
                                    <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php" ?>
            <div class="gototop js-top">
                <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
            <!-- Waypoints -->
            <script src="js/jquery.waypoints.min.js"></script>
            <!-- Parallax -->
            <script src="js/jquery.stellar.min.js"></script>
            <!-- Main -->
            <script src="js/main.js"></script>
            <script>
                if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
                    $(window).stellar();
                }
            </script>
            <script>
                $(document).ready(function() {
                    $("#fav").click(function() {
                        if ($("#fav").hasClass("btn-success")) {
                            <?php $id=esc($_GET['p_id']); ?>
                            var idvar = "<?php echo $id ?>";
                            var iduser = "<?php echo $idPerson; ?>";

                            $.ajax({
                                type: "POST",
                                url: "favorite.php",
                                data: {
                                    deleteid: idvar,
                                    userid: iduser
                                },
                                success: function() {
                                    console.log("success");
                                }
                            });
                            $("#fav").removeClass("btn-success");
                        } else {
                            <?php $id=esc($_GET['p_id']); ?>
                            var idvar = "<?php echo $id ?>";
                            var iduser = "<?php echo $idPerson; ?>";
                            $.ajax({
                                type: "POST", //type ,of method
                                url: "favorite.php", //your page
                                data: {
                                    insertid: idvar,
                                    userid: iduser
                                }, // passing the values
                                success: function() {
                                    console.log("success");
                                }
                            });
                            $("#fav").addClass("btn-success");
                            
                        }
                    });
                });
            </script>

            <script type="text/javascript">
            function delete_(cid){
            $.ajax({
                 type: "POST",
                 url: "comments.php",
                 data: "deleteid="+cid,
                success: function(){
                 $("#comment-"+cid).remove();
                 }
            });
            }
            </script>
            
            <script type="text/javascript">
                function edit_(cid, content){
                    document.getElementById("komenti-"+cid).innerHTML = "<br><textarea id='permbajtja' class='form-control' placeholder='Type comment'>"+content+"</textarea><br>";
                    document.getElementById("list"+cid).innerHTML = '<button onclick="update_('+cid+');" type="submit" class="btn btn-primary" value="$comment_id">Done</button>';
                }
            </script>

            <script type="text/javascript">
                function update_(cid){
                    var commentChange = $("#permbajtja").val();
                $.ajax({
                    type: "POST",
                    url: "comments.php",
                    data: "commentChange="+ commentChange+"&commentid="+cid,
                    success: function(){
                        console.log("success");
                        $('#commentDiv').load(document.URL + ' #commentDiv');
                    }
                });
                }
            </script>

            <script type="text/javascript">
            function create_(id){
                var commentContent = $("#permbajtja").val();
                var iduser = <?php echo $idPerson; ?>;
            $.ajax({
                 type: "POST",
                 url: "comments.php",
                 data: "contenti="+ commentContent+"&article_id="+id+"&user_id="+iduser,
                success: function(){
                    var commentContent = $("#permbajtja").val('');
                    $('#commentDiv').load(document.URL + ' #commentDiv');
                 }
            });
            }
            </script>
    </body>
</php>