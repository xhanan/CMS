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
function getComment($id){
	global $connection;
        $query1 = "SELECT `comments`.`descriptions`,`comments`.`user_id`, `users`.`first_name`, `users`.`last_name`, `comments`.`datetimee`, `users`.`gender`
				   FROM `comments` 
                        INNER JOIN `users` ON `users`.`id` = `comments`.`user_id` WHERE `comments`.`article_id`={$id}";
			$comment_query = mysqli_query($connection, $query1);
			
            while ($row = mysqli_fetch_assoc($comment_query)) {
				  $name = $row['first_name'];
				  $user_id = $row['user_id'];
                  $last_name = $row['last_name'];
                  $comment = $row['descriptions']; 
				  $date = $row['datetimee'];
				  $gender = $row['gender'];
				  if(isset($gender))
				  {
					$avatar = "https://bootdey.com/img/Content/avatar/avatar5.png";
				  }
				  else{
					$avatar = "https://bootdey.com/img/Content/avatar/avatar7.png";
				  }
				  if($id == $user_id){
					$delete = "<ul class='list-inline d-sm-flex my-0'>
					<li class='list-inline-item ml-auto'>
						<button type='submit' name='delete_comment' class='btn btn-primary'>Delete</button>
						</li>
					  </ul>";
				  }
				  else{
					  $delete = "Empty";
				  }
                  echo "<div class='col-md-8'>
                  <div class='media g-mb-30 media-comment'>
                      <img class='d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15' src=$avatar alt='Image Description'>
                      <div class='media-body u-shadow-v18 g-bg-secondary g-pa-30'>
                      
                        <div class='g-mb-15'>
                          <h5 class='h5 g-color-gray-dark-v1 mb-0'>{$name} {$last_name}</h5>
                          <span class='g-color-gray-dark-v4 g-font-size-12'>{$date}</span>
                        </div>
                        <div class='komenti'>
                        <p>{$comment}</p>
						</div>
						{$delete}
                      </div>
                    </div>
                </div>";}
}
function getPostImage($id){
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
function esc(String $value){
	// bring the global db connect object into function
	global $connection;
	// remove empty space sorrounding string
	$val = trim($value); 
	$val = mysqli_real_escape_string($connection, $value);

	return $val;
}
?>