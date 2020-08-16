<?php
include('../connect.php');
if(isset($_GET['Del']))
{     
            $imageID = $_GET["Del"];
            $query = "DELETE FROM `fooditems` WHERE `fooditems`.`id` = $imageID";
            $result = mysqli_query($db, $query);    
            if($result)
            {
                echo 'Record Deleted';
                header("Location: http:showFood.php?page=1");
            }
            else
            {
                echo 'Record not deleted';
                header("Location: http:showFood.php?page=1");
            }
            mysqli_close($db);
}

?>
