<!DOCTYPE php>
<php lang="en" class="no-js">

    <?php include "postFunctions.php"; ?>
    <?php include "header.php" ?>

    <?php


    if (isset($_POST['create_post'])) {
        $title = esc($_POST['title']);
        $content =  esc($_POST['content']);
        $category = esc($_POST['category_id']);
        $user_id = $_SESSION['id'];    # user id duhet te merret nga useri qe eshte i kycur (nese eshte admin)
        $date = esc(date('d-m-y'));
        $tags = esc($_POST['tag']);
        $media = esc($_POST['image']);
        $foto = "images/$media";
        $media_type = 1;
        $adminNumber = 1;
        $adminNumberRead;

        $query2 = "SELECT max(id) as postid FROM articles";
        $query2result = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_assoc($query2result)) {
            $post_id= $row['postid'] + 1;
        }
        $query1 = "SELECT isadmin  FROM users WHERE id={$user_id}";
        $isAdmin = mysqli_query($connection, $query1);
        while ($row = mysqli_fetch_assoc($isAdmin)) {
            $adminNumberRead = $row['isadmin'];
        }
        if ($adminNumberRead == $adminNumber) {
            $query = "INSERT INTO articles(title, content, category_id ,user_id, published_date, tags, image) ";

            $query .= "VALUES('{$title}','{$content}',{$category},{$user_id}, now(),'{$tags}', '{$foto}')";
             
            $create_post_query = mysqli_query($connection, $query);
            if (!$create_post_query) {
                die("Gabim: " . mysqli_error($connection));
            } else {
                echo "<script> alert(\"Postimi eshte bere me sukses.\"); </script>";
               echo "<script type=\"text/javascript\">location.href = 'single.php?p_id={$post_id}';</script>";
            }
        } else {
            echo "<script> alert(\"Nuk eshte i kycur ndonje admin.\"); </script>";
        }
    }
    ?>

    <body class="single">

        <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
            <div class="container paddding">
                <div class="row mx-0">
                    <div class="col-md-8 offset-md-2 col-12 animate-box" data-animate-effect="fadeInLeft">
                        <form action="post.php" method="post">
                            <div class="form-group">
                                <label for="title">Titulli</label>
                                <input type="text" class="form-control" name="title" placeholder="Shkruaj titullin">
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
                                <input type="text" class="form-control" name="tag" placeholder="Post tags">
                            </div>
                            <div class="form-group">
                                <label for ="image" class="file">Fotoja e artikullit</label><br>
                                <input class="btn btn-category" type="file" name="image">
                                <span class="file-custom"></span>
                            </div>
                            <div class="form-group">
                                <label for="content">Përmbajtja</label>
                                <textarea id="content" class="form-control" name="content" placeholder="Permbajtja">
                    </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="create_post" onclick>Submit</button>
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