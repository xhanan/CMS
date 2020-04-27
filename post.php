
<!DOCTYPE php>
<php lang="en" class="no-js">
<?php include "dbConnection.php";?>
<?php


if(isset($_POST['create_post'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $content =  mysqli_real_escape_string($connection,$_POST['content']);
    $category = mysqli_real_escape_string($connection,$_POST['category_id']);
    $user_id = 1;    # user id duhet te merret nga useri qe eshte i kycur (nese eshte admin)
    $date = date('d-m-y');
    $tags = "test";
    
$query = "INSERT INTO articles(title, content, category_id ,user_id, published_date, tags) ";

$query .= "VALUES('{$title}','{$content}',{$category},{$user_id}, now(),'{$tags}')";

$create_post_query = mysqli_query($connection, $query); 
if(!$create_post_query){
    die("Gabim: " . mysqli_error($connection));
}
else{
    echo "postimi u ruajt";
}
}
?>
<body class="single">
<?php include "header.php"?>
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
                    <input type="text" class="form-control" name="category_id" placeholder="Kategoria">
                </div>
                <div class="form-group">
                    <label for="content">Përmbajtja</label>
                    <textarea id="content" class="form-control" name="content" placeholder="Permbajtja">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="create_post">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>

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