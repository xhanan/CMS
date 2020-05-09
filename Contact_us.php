<?php include "dbConnection.php";?>
<?php
if (isset($_POST['contact_send'])) {
    require 'phpmailer/class.phpmailer.php';
    require 'phpmailer/class.smtp.php';
    require 'phpmailer/PHPMailerAutoLoad.php';
    $my_email = "brainbyteinfo@gmail.com";
    $my_password = "xhanibelirrusta";
    $my_name = "Brainbyte";

    $email_to = $_POST['contact_email'];
    $name_to = $_POST['contact_name'];
    $subject = $_POST['contact_subject'];
    $message = $_POST['contact_message'];
    $adminEmails = array("treshedyshe@gmail.com", "rrustemhyseni14@gmail.com", "xhanan.shehu4@gmail.com");
    $adminNames = array("Beli", "Xhani", "Rrusta");
    $gjatesia = count($adminEmails);
    //Query for savind the submited message in database
    $query = "INSERT INTO contact_us(email, name, subject, message, date_received) ";
    $query .= "VALUES('{$email_to}','{$name_to}','{$subject}','{$message}', now())";
     
    $contact_us_query = mysqli_query($connection, $query);
    if (!$contact_us_query) {
        die("Gabim: " . mysqli_error($connection));
    }

    $mailAdmin = new PHPMailer();

    $mailAdmin->IsSMTP(); // telling the class to use SMTP
    $mailAdmin->SMTPAuth = true; // enable SMTP authentication
    $mailAdmin->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mailAdmin->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mailAdmin->Port = 465; // set the SMTP port for the GMAIL server
    $mailAdmin->Username = $my_email; // GMAIL username
    $mailAdmin->Password = $my_password; // GMAIL password

    for($i=0; $i<$gjatesia; $i++){
        // Typical mail data
        $mailAdmin->AddAddress($adminEmails[$i], $adminNames[$i]);
        $mailAdmin->SetFrom($my_email, $my_name);
        $mailAdmin->Subject = "Client message";
        $mailAdmin->Body = $name_to . " sent us this message: \n\nSubject: \n\n". $subject ."\n\nMessage: \n". $message . "\n\n\nEmail: ". $email_to;
        $mailAdmin->Send();
    }
    
    $mailAdmin->smtpClose();


    $mail = new PHPMailer();

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = $my_email; // GMAIL username
    $mail->Password = $my_password; // GMAIL password

    // Typical mail data
    $mail->AddAddress($email_to, $name_to);
    $mail->SetFrom($my_email, $my_name);
    $mail->Subject = "Contact";
    $mail->Body = "We have recived your message to us. We will reply to you shortly.";

    try {
        $mail->Send();
        echo "Success!";
    } catch (Exception $e) {
        // Something went bad
        die("Error");
    }
    $mail->smtpClose();
}
?>



<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BrainByte</title>
    <link href="css/media_query.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="css/style_1.css" rel="stylesheet" type="text/css" />
    <!-- Modernizr JS -->
    <script src="js/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <?php include "header.php" ?>
    
    <div class="container-fluid  fh5co_fh5co_bg_contcat">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-phone"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Call Us</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">+1 800 559 658</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-envelope"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Have any questions?</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">braynbyteinfo@gmail.com</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-map-marker"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Address</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">FIEK, Rruga Agim Ramadani</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-4">
        <div class="container">
            <div class="col-12 text-center contact_margin_svnit ">
                <div class="text-center fh5co_heading py-2">Contact Us</div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <form class="row" id="fh5co_contact_form" method="post" action="Contact_us.php">
                        <div class="col-12 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" name="contact_name" placeholder="Enter Your Name" />
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" name="contact_email" placeholder="E-mail" />
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" name="contact_subject" placeholder="Subject" />
                        </div>
                        <div class="col-12 py-3">
                            <textarea class="form-control fh5co_contacts_message" name="contact_message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12 py-3 text-center"><button class="btn contact_btn" name="contact_send">Send Message</button> </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 align-self-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13615.008269018117!2d21.167136203817964!3d42.66303054679151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1589063128415!5m2!1sen!2s" class="map_sss" allowfullscreen></iframe>
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
    <!-- Main -->
    <script src="js/main.js"></script>

</body>