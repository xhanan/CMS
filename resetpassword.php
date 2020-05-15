<?php
    
    if(isset($_POST['reset-password'])){
        include "postFunctions.php";
        $selector = $_GET['selector'];  
        $validator = $_GET['validator'];

        $selector = esc($selector);
        $validator = esc($validator);
       
        $newpassword = $_POST['new-password'];
        $confirmnewpassword = $_POST['confirm-new-password'];

        $newpassword = esc($newpassword);
        $confirmnewpassword = esc($confirmnewpassword);
        
        
        $time = date("U");
        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires>=?;";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            die("error2");
        }            
        mysqli_stmt_bind_param($stmt, "ss", $selector, $time);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)){
            $request="Your request has expired. Please make a request again!";
            header("Location: forgotpassword.php?requestexpired=".$request);
        }
    
        $validator = hex2bin($validator);
        $isvalid = password_verify($validator,$row['pwdResetToken']);
        if(!$isvalid){
            die("Your request is FALSE! You need to resubmit your request.");
        }
        $email = $row['pwdResetEmail'];
        if(empty($newpassword) || empty($confirmnewpassword)){
            $error = "Field must not be empty";
        }
        else if($newpassword!=$confirmnewpassword){
            $error = "Your password are not the same!";
        }
        else if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $newpassword)) {
            $error = "Your password must contain at least 8 characters,
                one lower casse letter, one upper case letter, one number and one character! ";
        }
        else{
            $sql = "UPDATE users SET passwordd=? WHERE email=?";
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                die("error6");
            }
            $hash_format = "$2y$10$";
            $salt = "iusesomecrazystrings22";
            $hash_and_salt = $hash_format . $salt;
            $newpassword =  crypt($newpassword, $hash_and_salt);
        
            mysqli_stmt_bind_param($stmt, "ss", $newpassword, $email);
            mysqli_stmt_execute($stmt);

            $sql = "SELECT * FROM users WHERE email=?";
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                die("error7");
            }            
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)){
                die("Can't retrieve user data!");
            }
            
            $dbfirstname = $row['first_name'];
            $dblastname = $row['last_Name'];
            $dbid = $row['id'];
            $dbADMIN = $row['isadmin'];

            session_start();
            $_SESSION['user'] = $dbfirstname . " " . $dblastname;
            $_SESSION['id'] = $dbid;
            $_SESSION['isadmin'] = $dbADMIN;
            header("Location: index.php");

        }       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgotpasswordstyle.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <div id="content" class="flex">
        <div class="">
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><strong>Restore your password</strong></div>
                                <div class="card-body">
                                    <?php 
                                        $url = "http://localhost/CMS/resetpassword.php?selector=".$_GET['selector']."&validator=".$_GET['validator'];
                                    ?>
                                    <form action="<?php echo $url;?>" method="post">
                                        <div class="form-group"><label class="text-muted" for="exampleInputEmail1">New Password</label><input type="password" name="new-password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_password"></div>
                                        <div class="form-group"><label class="text-muted" for="exampleInputEmail1">Confirm Password</label><input type="password" name="confirm-new-password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_passwordc"></div>
                                        <button type="submit" class="btn btn-primary" name="reset-password">Submit</button>
                                        <?php if(isset($error)) echo '<small id="emailHelp" class="form-text text-muted">'.$error.'</small>'?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script>
       window.onbeforeunload = function () {
        <?php 
            $url = "http://localhost/CMS/resetpassword.php?selector=".$_GET['selector']."&validator=".$_GET['validator'];
        ?>
        window.location.href =<?php echo $url;?>;
        };

    </script> -->
</body>
</html>