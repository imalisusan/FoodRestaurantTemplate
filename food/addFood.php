<?php
if(isset($_POST["submit"]))
{
    // Include the database configuration file
include('../connect.php');
$name = $_POST['productname'];
$price = $_POST['productprice'];
$statusMsg = '';
$backlink = ' <a href="./">Go back</a>';

// File upload path
$targetDir = "assets/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                $insert = $db->query("INSERT INTO `fooditems`(`id`, `file_name`, `uploaded_on`, `ProductName`, `Price`) VALUES (NULL,'".$fileName."',NOW(),'".$name."',$price)");
                if($insert){
                    $statusMsg = "The file <b>".$fileName. "</b> has been uploaded successfully.";
                    header("Location: http:showFood.php?page=1");
                }else{
                    $statusMsg = "File upload failed, please try again." . $backlink;
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file." . $backlink;
            }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload." . $backlink;
        }
    }else{
            $statusMsg = "The file <b>".$fileName. "</b> is
             already exist." . $backlink;
        }
}else{
    $statusMsg = 'Please select a file to upload.' . $backlink;
}

// Display status message
echo $statusMsg;
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
                    <li><a href="../Admin/showUsers.php?page=1">Users</a></li>
                    <li><a href="viewOrders.php?page=1">Orders</a></li>
                    <li><a href="#" class="active">Add Food</a></li> 
                    <li><a href="../logout.php">LogOut</a></li>        
                </ul>
            </nav>

    <div class="hero">
        <div class="form-box"> 
       
            <form id="foodregister"class= input-group action="addFood.php" method="POST" enctype="multipart/form-data">
                 <h3 id="#food-head">Add Food Item</h3>
                 <br>
                <input type="text" name="productname" class="input-field" placeholder="Product Name" required><br>
                <input type="number" name="productprice" class="input-field" placeholder="Price" required><br><br>
                <label for="image" id="imagelabel">Product Image</label>
                <input type="file" name="file" id="image"><br> <br>
                <input type="submit" name="submit" class="submit-btn" value="Add Food Item">
            </form> 
        </div>
    </div>
    <br><br>

</body>
</html>