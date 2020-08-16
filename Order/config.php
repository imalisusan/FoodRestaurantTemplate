<?php
//connect to database
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "orders";  

//create connection
$db = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

//check connection
if($db -> connect_error)
{
    die("Connection failed: " . $db->connect_error);
}

?>