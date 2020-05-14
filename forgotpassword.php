<?php
    
    if(isset($_POST['forgot_email'])){
        include "dbConnection.php";
        include "postMethods.php";

        $user_email = $_POST['forgot_email'];
        $user_email = esc($user_email);
        $sql = "SELECT * FROM users WHERE email ='$user_email';";
        $if_exist_query = mysqli_query($connection, $sql);
        
       
        if(mysqli_num_rows($if_exist_query)==0){
            $email_sent = "This user doesn't exist, check your email";
        }
        else{
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
            $url = "http://localhost/CMS/resetpassword.php?selector=".$selector."&validator=".bin2hex($token);
            $expires = date("U")+1800;

            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                die("error1");
            }else{
                mysqli_stmt_bind_param($stmt, "s", $user_email);
                mysqli_stmt_execute($stmt);
            }

            $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?,?,?,?);";                
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                die("error2");
            }
            
            $hashedToken = password_hash($token,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $user_email, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        
            mysqli_stmt_close($stmt);
            mysqli_close($connection);
            require_once('phpmailer/PHPMailerAutoload.php');
            $message = "<p></p><h5>Your reset password link:</h5>";
            $message .= '<a href="'.$url.'">'.$url.'</a></p>';                
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = TRUE;
            $mail->isHTML(TRUE);
            $mail->SMTPSecure='ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->Username = '';
            $mail->Password = '';
            $mail->SetFrom('brainbyte@gmail.com');
            $mail->Subject = "Reset Password";
            $mail->Body = $message;
            $mail->AddAddress($user_email);
            if($mail->Send()){
                $email_sent = "Success. Check you email";
            }
            else{
                $email_sent = "Error. Couldn't check your email again.";
            }            
            
        }      
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgotpasswordstyle.css">
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
                                    <form action="forgotpassword.php" method="post">
                                        <div class="form-group"><label class="text-muted" for="exampleInputEmail1">Email address</label><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="forgot_email" placeholder="Enter email"> <small id="emailHelp" class="form-text text-muted">We will send you a link where you will reset you password</small></div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <?php if(isset($_GET['requestexpired'])) echo '<small id="emailHelp" class="form-text text-muted">'.$_GET['requestexpired'].'</small>'?>
                                        <?php if(isset($email_sent)) echo '<small id="emailHelp" class="form-text text-muted">'.$email_sent.'</small>'?>
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
</body>
</html>