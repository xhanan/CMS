<?php include "dbConnection.php";?>

<?php
/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */

function getPost($id){
	global $connection;
	// Get single post slug
	$post_id = $id;
	$sql = "SELECT * FROM articles WHERE id='$post_id'";
	$result = mysqli_query($connection, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	
	return $post;
}

function esc(String $value){
	// bring the global db connect object into function
	global $connection;
	// remove empty space sorrounding string
	$val = trim($value); 
	$val = mysqli_real_escape_string($connection, $value);

	return $val;
}

?>