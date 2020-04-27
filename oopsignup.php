<?php
    include "dbConnection.php";
    class Users {
        private $firstname;
        private $lastname;
        private $email;
        private $username;
        private $password;
    
        function __construct($firstname, $lastname, $email, $username, $password){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
        }
        function insertUsers(){
            global $connection;
            
            $query = "INSERT INTO users (first_name, last_name,email, username, passwordd)";
            $query .= "VALUES('$this->firstname','$this->lastname','$this->email','$this->username','$this->password')";
            $insert = mysqli_query($connection, $query);
            if(!$insert){
                die("Couldn't connect to the database ".mysqli_error($connection));
            }
        

        }
        
    }
?>