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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
                <div class="radio-container">
                    <div class="radio-container">
                        <span>Gender:</span>
                        <span class="gender"><input type="radio" id="male" name="gender" value="male" ><label for="male" style="margin-left: 4px;"> Male </label></span>
                        <span class="gender"><input type="radio" id="female" name="gender" value="female"><label for="female" style="margin-left: 4px;"> Female </label</span>
                    </div>
                </div>
                
                <button type="submit" name="signupsubmit" value="SignupSubmit">Sign Up</button>
                <?php
                if (isset($error)) {
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
                <a href="forgotpassword.php">Forgot your password?</a>
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