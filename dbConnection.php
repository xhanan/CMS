<?php

    define("DB_HOST","127.0.0.1:3307");
    define("DB_USER","root");
    define("DB_PASS","");
    define("DB_NAME","brainbyte");
    
    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$connection){
        die("Connection failed");
    }
?>