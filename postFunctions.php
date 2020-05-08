<?php include "dbConnection.php"; ?>
<?php
/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */

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
	$query1 = "SELECT `comments`.`id`,`comments`.`descriptions`,`comments`.`user_id`, `users`.`first_name`, `users`.`last_name`, `comments`.`datetimee`
				   FROM `comments` 
                        INNER JOIN `users` ON `users`.`id` = `comments`.`user_id` WHERE `comments`.`article_id`={$id}";
	$comment_query = mysqli_query($connection, $query1);
	global $komentet;
	while ($row = mysqli_fetch_assoc($comment_query)) {
		global $comment_id;
		$comment_id = $row['id'];
		$name = $row['first_name'];
		$user_id = $row['user_id'];
		$last_name = $row['last_name'];
		$comment = $row['descriptions'];
		$date = $row['datetimee'];
		if (isset($person)) {
			if ($person == $user_id) {
				$delete = "
						<ul class='list-inline d-sm-flex my-0'>
						<li class='list-inline-item ml-auto'>
							<button id='delete_button$comment_id' type='submit' class='btn btn-primary' value='$comment_id'>Delete</button>
							</li>
						  </ul>";
						  array_push($komentet, $comment_id);
			} else {
				$delete = "Empty";
			}
		} else {
			$delete = "";
		}

		

		$avatar = isMale($user_id);
		echo "
				  <div class='col-md-8'>
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
		if (isset($gender)) {
			$avatar = "https://bootdey.com/img/Content/avatar/avatar5.png";
		} else {
			$avatar = "https://bootdey.com/img/Content/avatar/avatar7.png";
		}
	}
	return $avatar;
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

function showCategories()
{
	global $connection;
	$category = "SELECT * FROM category";
	$select_all_category_qyert = mysqli_query($connection, $category);

	while ($row = mysqli_fetch_assoc($select_all_category_qyert)) {
		$cat_title = $row['category_name'];
		$cat_id = $row['id'];
		echo "<a href='categories.php?cat_id=$cat_id' class='fh5co_tagg'>{$cat_title}</a>";
	}
}

function cout_page_views($id)
{
	global $connection;
	$countingQuery = "UPDATE articles SET post_views = post_views + 1 WHERE id = {$id}";
	$execute_query = mysqli_query($connection, $countingQuery);
	if (!$execute_query) {
		die("Query failed");
	}
}

function most_viewed_posts()
{

	global $connection;
	$most_viewed_posts_query = "SELECT `articles`.`id`,`articles`.`title`,`articles`.`published_date`,`articles`.`image` 
    FROM `articles` 
    ORDER BY post_views DESC LIMIT 5";

	$execute_query = mysqli_query($connection, $most_viewed_posts_query);

	while ($rows = mysqli_fetch_assoc($execute_query)) {
		$id = $rows['id'];
		$title = $rows['title'];
		$date = $rows['published_date'];
		$img = $rows['image'];

		echo "<div class='row pb-3'>
        <div class='col-5 align-self-center'>
            <img src='{$img}' alt='img' class='fh5co_most_trading' />
        </div>
        <div class='col-7 paddding'>
            <div class='most_fh5co_treding_font'><a href='single.php?p_id={$id}'class='fh5co_magna py-2' style = 'font-size: 15px'> {$title} </a> </div>
            <div class='most_fh5co_treding_font_123'> {$date} </div>
        </div>
    </div>";
	}
}

?>