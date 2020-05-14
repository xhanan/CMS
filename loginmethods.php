<?php
    function encrypt_password($password){
        $hash_format = "$2y$10$";
        $salt = "iusesomecrazystrings22";
        $hash_and_salt = $hash_format . $salt;
        $password =  crypt($password, $hash_and_salt);
        return $password;
    }
?>