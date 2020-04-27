<?php
    include "dbConnection.php";
    class Users {
        private $firstname;
        private $lastname;
        private $email;
        private $username;
        private $password;
    
        public function __construct($firstname, $lastname, $email, $username, $password){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;

        }
        public function escapeStrings(){
            global $connection;
            $this->firstname = mysqli_real_escape_string($connection, $this->firstname);
            $this->lastname = mysqli_real_escape_string($connection, $this->lastname);
            $this->email = mysqli_real_escape_string($connection, $this->email);
            $this->username = mysqli_real_escape_string($connection, $this->username);
            $this->password = mysqli_real_escape_string($connection, $this->password);
        }
        public function hash_password($passwordd){
            $hash_format = "$2y$10$";
            $salt = "iusesomecrazystrings22";
            $hash_and_salt = $hash_format.$salt;
            $passwordd =  crypt($passwordd, $hash_and_salt);
            return $passwordd;
        }
        public function insertUsers(){
            global $connection;
            $password = hash_password($password);
            $query = "INSERT INTO users (first_name, last_name,email, username, passwordd)";
            $query .= "VALUES('$this->firstname','$this->lastname','$this->email','$this->username','$this->password')";
            $insert = mysqli_query($connection, $query);
            if(!$insert){
                die("Couldn't connect to the database ".mysqli_error($connection));
            }
        

        }
        
    }
?>