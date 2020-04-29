<!DOCTYPE php>
<php lang="en" class="no-js">

    <?php include "postFunctions.php";
    include "header.php";
    if (isset($_GET['p_id'])) {
        $id = $_GET['p_id'];
	    $post = getPost($id);
    }
    if (isset($_POST['update_post'])) {
        $title1 = esc($_POST['title']);
        $content1 =  esc($_POST['content']);
        $category1 = esc($_POST['category_id']);
        $user1 = $_SESSION['id'];    # user id duhet te merret nga useri qe eshte i kycur (nese eshte admin)
        $tags1 = esc($_POST['tag']);

        if (isset($_SESSION['id'])) {
            $query1 = "UPDATE articles SET title='{$title1}',content='{$content1}',
            category_id={$category1},user_id={$user1},tags='{$tags1}' WHERE id={$id}";
            
            $update_post_query = mysqli_query($connection, $query1);
            if (!$update_post_query) {
                die("Gabim: " . mysqli_error($connection));
            } else {
                echo "<h5> Postimi u ndryshua me sukses. </h5>";
            }
        } else {
            echo "<h5> Nuk eshte i kycur ndonje admin </h5>";
        }
    }
    ?>
    <body class="single">

        <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
            <div class="container paddding">
                <div class="row mx-0">
                    <div class="col-md-8 offset-md-2 col-12 animate-box" data-animate-effect="fadeInLeft">
                            <?php echo "<form action='editPost.php?p_id={$id}' method='post'>"?>
                            <div class="form-group">
                                <label for="title">Titulli</label>
                                <?php $titulli=$post['title']; 
                                echo "<input type=\"text\" class=\"form-control\" name=\"title\" placeholder=\"Shkruaj titullin\"  value='$titulli'>";?>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategoria</label>
                                <div>
                                <select class="btn btn-category dropdown-toggle" data-toggle="dropdown" name="category_id">
                                <?php
                                        $query = "SELECT * FROM category";
                                        $select_categories = mysqli_query($connection,$query);
                                        //confirmQuery($select_categories);
                                        while($row = mysqli_fetch_assoc($select_categories )) {
                                            $cat_id = $row['id'];
                                            $cat_name = $row['category_name'];
                                            echo "<option value='$cat_id'>{$cat_name}</option>";
                                        }
                                ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tags</label>
                                <?php $tags=$post['tags'];
                                echo "<input type=\"text\" class=\"form-control\" name=\"tag\" placeholder=\"Post tags\" value='$tags'>"; ?>
                            </div>
                            <div class="form-group">
                                <label for="content">Përmbajtja</label>
                                <?php $permbajtja=$post['content']; 
                                echo "<textarea id=\"content\" class=\"form-control\" name=\"content\" placeholder=\"Permbajtja\">$permbajtja</textarea>";?>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update_post">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/trumbowyg.min.js" integrity="sha256-oFd4Jr73mXNrGLxprpchHuhdcfcO+jCXc2kCzMTyh6A=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/langs/sq.min.js"></script>
        <script>
            $(document).ready(function() {
                console.log('1');
                $('#content').trumbowyg();
            });
        </script>
    </body>
</php>