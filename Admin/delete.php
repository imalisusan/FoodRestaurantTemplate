<?php
include('connect.php');
if(isset($_GET['Del']))
{     
            $userID = $_GET["Del"];
            $query = "DELETE FROM `users` WHERE `customers`.`CustomerID` = $userID";
            $result = mysqli_query($db, $query);    
            if($result)
            {
                echo 'Record Deleted';
                header("Location: http:showUsers.php?page=1");
            }
            else
            {
                echo 'Record not deleted';
                header("Location: http:showUsers.php?page=1");
            }
            mysqli_close($db);
}

?>
