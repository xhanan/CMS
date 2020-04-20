<!DOCTYPE php>
<php lang="en" class="no-js">
<body class="single">
<?php include "header.php"?>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 offset-md-2 col-12 animate-box" data-animate-effect="fadeInLeft">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Titulli</label>
                    <input type="text" class="form-control" name="title" placeholder="Shkruaj titullin">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kategoria</label>
                    <input type="password" class="form-control" name="categoryId" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Përmbajtja</label>
                    <textarea id="content" class="form-control" name="content" placeholder="Password">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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