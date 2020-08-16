<?php
require_once('../connect.php');
if(isset($_GET['Del']))
{     
            $userID = $_GET["Del"];
            $query = "DELETE FROM `customers` WHERE `customers`.`CustomerID` = $userID";
            $result = mysqli_query($conn, $query);    
            if($result)
            {
                echo 'Record Deleted';
                header("Location: http:../homepage.php");
            }
            else
            {
                echo 'Record not deleted';
                header("Location: http:../homepage.php");
            }
            mysqli_close($conn);
}

?>
