<?php

$error = NULL;
if (isset($_POST['signupsubmit'])) {
    $firstname = $_POST['signupname'];
    $lastname = $_POST['signuplastname'];
    $email = $_POST['signuppemail'];
    $username = $_POST['signupusername'];
    $password = $_POST['signuppassword'];

    if (empty($firstname)) {
        $error = "You must enter the first name. ";
    } else if (empty($lastname)) {
        $error = "You must enter the last name. ";
    } else if (empty($email)) {
        $error = "You must enter an email. ";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Unvalid email address. ";
    } else if (strlen($username) < 5) {
        $error = "Your username must contain at least 6 characters. ";
    } else if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $password)) {
        $error = "Your password must contain at least 8 characters,
            one lower casse letter, one upper case letter, one number and one character! ";
    }

    if ($error == NULL) {
        include "dbConnection.php";
        require "oopsignup.php";


        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $email = mysqli_real_escape_string($connection, $email);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $hash_format = "$2y$10$";
        $salt = "iusesomecrazystrings22";
        $hash_and_salt = $hash_format . $salt;

        $password =  crypt($password, $hash_and_salt);
        $user = new Users($firstname, $lastname, $email, $username, $password);
        $user->insertUsers();


        $query_signup = "SELECT * FROM users WHERE username = '$username'";
        $select_query_signup = mysqli_query($connection, $query_signup);

        if (!$select_query_signup) {
            die("Couldn't connect to the database " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_query_signup)) {
            $dbemail = $row['email'];
            $dbusername = $row['username'];
            $dbpassword = $row['passwordd'];
            $dbfirstname = $row['first_name'];
            $dblastname = $row['last_Name'];
            $dbid = $row['id'];
            $dbADMIN = $row['isadmin'];
        }
        if (isset($dbemail) && isset($dbusername) && isset($dbpassword)) {
            if ($username == $dbusername && $password == $dbpassword) {
                session_start();
                $_SESSION['user'] = $dbfirstname . " " . $dblastname;
                $_SESSION['id'] = $dbid;
                $_SESSION['isadmin'] = $dbADMIN;
                header("Location: index.php");
            }
        }
    }
}

if (isset($_POST['loginsubmit'])) {
    include "dbConnection.php";

    $emailorusername = $_POST['loginstr'];
    $password = $_POST['loginpassword'];

    if (empty($emailorusername) || empty($password)) {
        $print_message = "Enter your username or email and password";
    } else {
        $emailorusername = mysqli_real_escape_string($connection, $emailorusername);
        $password = mysqli_real_escape_string($connection, $password);

        $hash_format = "$2y$10$";
        $salt = "iusesomecrazystrings22";
        $hash_and_salt = $hash_format . $salt;
        $password =  crypt($password, $hash_and_salt);

        $query = "SELECT * FROM users WHERE email = '$emailorusername' OR username = '$emailorusername'";
        $select_query = mysqli_query($connection, $query);

        if (!$select_query) {
            die("Couldn't connect to the database " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_query)) {
            $dbemail = $row['email'];
            $dbusername = $row['username'];
            $dbpassword = $row['passwordd'];
            $dbfirstname = $row['first_name'];
            $dblastname = $row['last_Name'];
            $dbADMIN = $row['isadmin'];
            $dbid = $row['id'];
        }
        if (isset($dbemail) && isset($dbusername) && isset($dbpassword)) {
            if (($emailorusername == $dbemail || $emailorusername == $dbusername) && $password == $dbpassword) {
                session_start();
                $_SESSION['user'] = $dbfirstname . " " . $dblastname;
                $_SESSION['id'] = $dbid;
                $_SESSION['isadmin'] = $dbADMIN;
                header("Location: index.php");
            } else {
                $print_message = "<p>This user doesn't exist. Email/Username or Password wrong? </p>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/0f92c53527.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #2aa2d4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        p {
            font-size: 14px;
            font-weight: 100px;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
            width: 780px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container form {
            background-color: #fff;
            display: flex;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .form-container input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        button {
            border-radius: 12px;
            padding: 5px;
            border: 1px solid #1c1c1c;
            background-color: #1c1c1c;
            color: #2aa2d4;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            /*e hek nifar vije pldh qe del anash komplet*/
            outline: none;
        }

        button.buttons {
            background: transparent;
            border-color: #2aa2d4;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2px;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            /*opacity e percakton sa transparent eshte qaj element*/
            opacity: 0;
            z-index: 1px;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 2;
        }

        .overlay {
            background-color: #1c1c1c;
            color: #2aa2d4;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        /*e leviz sign in ne te djathte*/
        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        /*e leviz sign up ne te majte*/
        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        /*me e qite sign up permi sign in*/
        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 5;
            z-index: 5;
        }

        /*me e kthy singin ne te djathte*/
        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="login.php" name="signupform">
                <h1>Create Account</h1>
                <input type="text" placeholder="First name" name="signupname" />
                <input type="text" placeholder="Last name" name="signuplastname" />
                <input type="text" placeholder="Email" id="signupemail" name="signuppemail" />
                <input type="text" placeholder="Username" name="signupusername" />
                <input type="password" placeholder="Password" name="signuppassword" />
                <button type="submit" name="signupsubmit" value="SignupSubmit">Sign Up</button>
                <?php
                if ($error != NULL) {
                    echo "<p>$error</p>";
                }
                ?>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post" action="login.php" name="loginform">
                <h1>Sign in</h1>
                <input type="text" placeholder="Email or username" name="loginstr" />
                <input type="password" placeholder="Password" name="loginpassword" />
                <?php
                if (isset($print_message)) {
                    echo $print_message;
                }
                ?>
                <a href="#">Forgot your password?</a>
                <button type="submit" name="loginsubmit" value="LoginSubmit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="buttons" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="buttons" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');
        signUpButton.addEventListener('click', () =>
            container.classList.add('right-panel-active'));
        signInButton.addEventListener('click', () =>
            container.classList.remove('right-panel-active'));
    </script>
</body>

</html>