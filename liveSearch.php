<?php include "dbConnection.php";?>
<?php

//get the q parameter from URL
if (isset($_GET["term"])) {
    $search = $_GET["term"];
    $query = "SELECT distinct `articles`.`id`, `articles`.`title` 
    FROM `articles`
    LEFT JOIN `category` ON `category`.`id` = `articles`.`category_id`
    WHERE `articles`.`tags` LIKE '%$search%' or `articles`.`title` LIKE '%$search%'
    LIMIT 5;";
    $search_query = mysqli_query($connection, $query);
    
    $result = [];
	while ($rows = mysqli_fetch_assoc($search_query)) {
		$id = $rows['id'];
        $title = $rows['title'];
        
        array_push($result, (object)[ 'value' => $id, 'label' => $title ]);
    }
    echo json_encode($result);
}
?>