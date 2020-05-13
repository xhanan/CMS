<?php
    include "dbConnection.php";
    class Users {
        private $firstname;
        private $lastname;
        private $email;
        private $username;
        private $password;
        private $gender;
    
        function __construct($firstname, $lastname, $email, $username, $password, $gender){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
            $this->gender = $gender;
        }
        function insertUsers(){
            global $connection;
            
            $query = "INSERT INTO users (first_name, last_name,email, username, passwordd, gender)";
            $query .= "VALUES('$this->firstname','$this->lastname','$this->email','$this->username','$this->password','$this->gender')";
            $insert = mysqli_query($connection, $query);
            if(!$insert){
                die("Couldn't connect to the database ".mysqli_error($connection));
            }
        

        }
        
    }
?>