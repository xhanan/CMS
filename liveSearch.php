<?php include "dbConnection.php";?>
<?php

//get the q parameter from URL
if (isset($_GET["q"])) {
    $search = $_GET["q"];
    $query = "SELECT distinct `articles`.`id`, `articles`.`title` 
    FROM `articles`
    LEFT JOIN `category` ON `category`.`id` = `articles`.`category_id`
    WHERE `articles`.`tags` LIKE '%$search%' or `articles`.`title` LIKE '%$search%'
    LIMIT 1;";
    $search_query = mysqli_query($connection, $query);
    
	while ($rows = mysqli_fetch_assoc($search_query)) {
		$id = $rows['id'];
        $title = $rows['title'];
        
        $hint="";
        //find a link matching the search text
            if ($hint=="") {
            $hint="<a class='dropdown-item' style='white-space: pre-line;' href='single.php?p_id={$id}'>$title</a>";
            echo $hint;
            
            }
        $hint ="";
    }
}
?>