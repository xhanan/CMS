<?php include "dbConnection.php";?>
<?php

function esc(String $value){
	// bring the global db connect object into function
	global $connection;
	// remove empty space sorrounding string
	$val = trim($value); 
	$val = mysqli_real_escape_string($connection, $value);
	return $val;
}
?>