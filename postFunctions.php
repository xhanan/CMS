<?php include "dbConnection.php"; ?>
<?php
/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */
if(isset($_POST['postid'])){
	$post_id = $_POST['postid'];
	$queryDelete = "DELETE FROM articles WHERE id={$post_id};";
	$p_query = mysqli_query($connection, $queryDelete);
	if (!$p_query) {
		die("Gabim: " . mysqli_error($connection));
	  }
	}
	
function getPost($id)
{
	global $connection;
	// Get single post slug
	$post_id = $id;
	$sql = "SELECT * FROM articles WHERE id='$post_id'";
	$result = mysqli_query($connection, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);

	return $post;
}




function getComment($id, $person)
{
	global $connection;
	global $editOrNot;
	$query1 = "SELECT `comments`.`id`,`comments`.`descriptions`,`comments`.`user_id`, `users`.`first_name`, `users`.`last_name`, `comments`.`datetimee`, `comments`.`editedDate`
				   FROM `comments` 
                        INNER JOIN `users` ON `users`.`id` = `comments`.`user_id` WHERE `comments`.`article_id`={$id}";
	$comment_query = mysqli_query($connection, $query1);
	while ($row = mysqli_fetch_assoc($comment_query)) {
		$comment_id = $row['id'];
		$name = $row['first_name'];
		$user_id = $row['user_id'];
		$last_name = $row['last_name'];
		$comment = $row['descriptions'];
		$date = $row['datetimee'];
		$editedDate = $row['editedDate'];
		if($editedDate != ""){
			$edited = "Edited";
		}
		else{
			$edited="";
		}

		if (isset($person)) {
			if ($person == $user_id) {
				$delete = "
						<ul class='list-inline d-sm-flex my-0'>
						<li id='list$comment_id' class='list-inline-item ml-auto'>
							<button onclick='edit_(\"$comment_id\", \"$comment\");' type='submit' class='btn btn-primary' value='$comment_id'>Edit</button>
							<button onclick='delete_(\"$comment_id\");' type='submit' class='btn btn-primary' value='$comment_id'>Delete</button>
							</li>
						  </ul>";
			} else {
				$delete = "";
			}
		} else {
			$delete = "";
		}

		
		$avatar = isMale($user_id);
		echo "
				  <div id='comment-$comment_id' class='col-md-8'>
                  <div class='media g-mb-30 media-comment'>
                      <img class='d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15' src=$avatar alt='Image Description'>
                      <div class='media-body u-shadow-v18 g-bg-secondary g-pa-30'>
                      
                        <div class='g-mb-15'>
                          <h5 class='h5 g-color-gray-dark-v1 mb-0'>{$name} {$last_name}</h5>
                          <span class='g-color-gray-dark-v4 g-font-size-12'>{$date}</span>
						</div> 
						<div id='komenti-$comment_id'>
						<p>{$comment}</p>
						</div> " .
						"{$edited}" .
						"{$delete}
						</form>
                      </div>
                    </div>
                </div>";
	}
}
function getPostImage($id)
{
	global $connection;
	$query = "SELECT image
				FROM articles
                WHERE id = {$id}";
	$photo_query = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($photo_query)) {
		$image = $row['image'];
		echo $image;
	}
}
function isMale($person)
{
	global $connection;
	$query1 = "SELECT gender
				   FROM users
                    WHERE id={$person}";
	$comment_query = mysqli_query($connection, $query1);

	while ($row = mysqli_fetch_assoc($comment_query)) {
		$gender = $row['gender'];
		if ($gender == "F") {
			$avatar = "https://bootdey.com/img/Content/avatar/avatar5.png";
			return $avatar;
		} elseif($gender == "M" or $gender == "") {
			$avatar = "https://bootdey.com/img/Content/avatar/avatar7.png";
			return $avatar;
		}
	}
	
}
function getName($person)
{
	global $connection;
	$query = "SELECT first_name, last_name
				   FROM users
                    WHERE id={$person}";
	$Namequery = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($Namequery)) {
		$name = $row['first_name'];
		$last_name = $row['last_name'];
		$emri = $name . " " . $last_name;
	}
	return $emri;
}
function esc(String $value)
{
	// bring the global db connect object into function
	global $connection;
	// remove empty space sorrounding string
	$val = trim($value);
	$val = mysqli_real_escape_string($connection, $value);

	return $val;
}

function cout_page_views($id,$user_id)
{
	global $connection;
	$cookie_value = $_COOKIE['brainbyte'];
	if($user_id === null){
		$countingQuery = "INSERT INTO count_page_views(cookie_id,article_id) VALUES('$cookie_value',$id)";
	}else
		$countingQuery = "INSERT INTO count_page_views(cookie_id,user_id,article_id) VALUES('$cookie_value',$user_id,$id)";

	$execute_query = mysqli_query($connection, $countingQuery);
	if (!$execute_query) {
		die("Query failed");
	}
}
?>

