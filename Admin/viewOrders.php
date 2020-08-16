<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../CSS/users.css">
</head>
<body>
    <!--Navigation Menu-->
    <nav>      
        <ul>
            <li><a href="../homepage.php">Home</a></li>
            <li><a href="../homepage.php#services">About </a></li>
            <li><a href="../blog.html">Blog</a></li>   
            <li><a href="showUsers?page=1.php">Users</a></li>
            <li><a href="../food/showFood.php?page=1">FoodItems</a></li>       
            <li><a href="../food/addFood.php">Add Food</a></li>  
            <li><a href="viewOrders?page=1.php" class="active">Orders</a></li>
            <li><a href="../logout.php">LogOut</a></li>    
        </ul>
    </nav>
    <?php
session_start();
$emailAddress = $_SESSION['email'];
echo "<h3>Welcome ";
echo $emailAddress;
echo "</h3>"
?>
    <!--Table-->    
    <table>
            <tr>
                <th>OrderID</th>
                <th>CustomerID</th>
                <th>Grand Total</th>
                <th>Created</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        <?php 
        include('connect.php');
        $query = "SELECT * FROM orders LIMIT 0,5";
        $result = mysqli_query($db, $query);
        $page = $_GET["page"];
        if ($page=="" || $page=="1") 
        {
            $page1=0;
        } 
        else
        {
            $page1=($page*5)-5;
        } 
        $query = "SELECT * FROM orders LIMIT $page1,5";
        $result = mysqli_query($db, $query);
            //fetches a result row as an associative array.
            while($rows = mysqli_fetch_assoc($result))
            {
        ?>
            <tr>
            <td><?php 
                $orderID=$rows['id'];
                echo $orderID ?></td>
                <td><?php echo $rows['customer_id']; ?></td>
                <td><?php echo $rows['grand_total']; ?></td>
                <td><?php echo $rows['created']; ?></td>
                <td><?php echo $rows['status']; ?></td>
                <td><a href="edit.php?Upd=<?php echo $userID?>">Edit</a>
                <a href="delete.php?Del=<?php echo $userID?>">Delete</a></td>
            </tr>
           
            <?php 
            //count number of pages
            $quer="SELECT * FROM orders";
            $resul = mysqli_query($db, $quer);
            $count = mysqli_num_rows($resul);
            $a = $count/5;
            $a = ceil($a);
            echo "<br><br><br><br>";
            
            }
            ?>    
                          
    </table>
   <div class="pagination">
   <a href="#">&laquo;</a>
   <?php
    
    for($b = 1; $b <= $a; $b++)
    {
        ?><a href="showOrers.php?page=<?php echo $b;?>"><?php echo $b."   ";?></a><?php
    }
    
?> 
    <a href="#">&raquo;</a>
 </div>

</body>
</html>