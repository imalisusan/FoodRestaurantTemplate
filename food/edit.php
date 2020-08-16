<?php
include('../connect.php');
if(isset($_GET['Upd']))
{     
            $imageID = $_GET["Upd"];
            $query = "SELECT * FROM fooditems WHERE id= $imageID";
            $result = mysqli_query($db, $query);
            while($rows = mysqli_fetch_assoc($result))
            {
                $name = $rows['ProductName'];
                $price = $rows['Price'];
                $origfile = $rows['file_name'];
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/addfood.css">
    <title>Document</title>
</head>
<body>
    <!--Navigation Menu-->
    <nav>      
                <ul>
                    <li><a href="../homepage.php">Home</a></li>
                    <li><a href="../homepage.php#services">About </a></li>  
                    <li><a href="../showUsers.php?page=1">Users</a></li>
                    <li><a href="showFood.php?page=1">FoodItems</a></li>
                    <li><a href="addFood.php">Add Food</a></li>        
                    <li><a href="#"class="active">Edit Food</a></li>
                    <li><a href="../logout.php">LogOut</a></li>     
                </ul>
            </nav>

    <div class="hero">
        <div class="form-box"> 
       
            <form id="foodregister"class= input-group action="updateFood.php?Upd=<?php echo $imageID?>" method="POST" enctype="multipart/form-data">
                 <h3 id="#food-head">Edit Food Item</h3>
                 <br>
                <input type="text" name="productname" class="input-field" value="<?php echo $name?>" required ><br>
                <input type="number" name="productprice" class="input-field" value="<?php echo $price?>" required><br><br>
                <label for="image" id="imagelabel">Product Image</label>
                <input type="file" name="file" id="image"><br> <br>
                <input type="submit" name="submit" class="submit-btn" value="Edit Food Item">
            </form> 
        </div>
    </div>
    <br><br>

</body>
</html><?php
            
}

?>

