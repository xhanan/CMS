<?php
                        include "dbConnection.php";
                        $category = "SELECT * FROM category";
                        $select_all_category_qyert = mysqli_query($connection,$category);

                        while($row = mysqli_fetch_assoc($select_all_category_qyert)){
                            $cat_title = $row['category_name'];
                            echo "<a href='#' class='fh5co_tagg'>{$cat_title}</a>";
                        }   
?>