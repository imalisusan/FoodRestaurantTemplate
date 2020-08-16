<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Items</title>
    <link rel="stylesheet" href="../CSS/showFood.css">
</head>
<body>
    <!--Navigation Menu-->
    <nav>      
        <ul>
            <li><a href="../homepage.php">Home</a></li>
            <li><a href="../showUsers?page=1.php" >Users</a></li>  
            <li><a href="showFood.php?page=1" class="active">FoodItems</a></li> 
            <li><a href="addFood.php">Add Food</a></li>     
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
                <th>FoodID</th>
                <th>Food Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        <?php 
        include('../connect.php');
        $query = "SELECT * FROM fooditems LIMIT 0,5";
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
        $query = "SELECT * FROM fooditems LIMIT $page1,5";
        $result = mysqli_query($db, $query);
            //fetches a result row as an associative array.
            while($rows = mysqli_fetch_assoc($result))
            {
        ?>
            <tr>
            <td><?php 
                $productID=$rows['id'];
                echo $productID ?></td>
                <td><?php echo $rows['ProductName']; ?></td>
                <td><?php echo $rows['Price']; ?></td>
                <td>
                <?php
                $imageURL = 'assets/'.$rows["file_name"];
                ?>
                <img src="<?= $imageURL; ?>" style="width:100px; height:56px;"/>
                </td>
                
                <td><a href="edit.php?Upd=<?php echo $productID?>">Edit</a>
                <a href="deleteFood.php?Del=<?php echo $productID?>">Delete</a></td>
            </tr>
           
            <?php 
            //count number of pages
            $quer="SELECT * FROM fooditems";
            $resul = mysqli_query($db, $quer);
            $count = mysqli_num_rows($resul);
            $a = $count/4;
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
        ?><a href="showFood.php?page=<?php echo $b;?>"><?php echo $b."   ";?></a><?php
    }
    
    
?> 
    <a href="#">&raquo;</a>
    
 </div>

</body>
</html>