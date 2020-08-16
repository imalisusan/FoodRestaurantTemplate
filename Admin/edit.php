<?php
include('connect.php');
if(isset($_POST['update']))
{
    $userID = $_POST['userid'];
    $emailAddress = $_POST['emailaddress'];
    $phoneNumber = $_POST['phonenumber'];
    $password = $_POST['password'];
            $query = "UPDATE `users` SET `EmailAddress` = '".$emailAddress."', `PhoneNumber` = $phoneNumber, `Password` = '".$password."' WHERE `customers`.`CustomerID` =$userID";
            $result = mysqli_query($db, $query);    
            if($result)
            {
                echo 'Data Updated';
            }
            else
            {
                echo 'Data not updated';
            }
            mysqli_close($db);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Castro Foods and Restaurant</title>
    <link rel="stylesheet" href="../CSS/authentication.css">
</head>
<body>
    <!--Navigation Menu-->
    <nav>      
        <ul>  
            <li><a href="../homepage.php">Home</a></li>
            <li><a href="../homepage.php#services">About </a></li>
            <li><a href="../blog.html">Blog</a></li>   
            <li><a href="#" class="active">Edit Profile</a></li>
            <li><a href="../homepage.php#header_footer">ContactUs</a></li>        
        </ul>
    </nav>

    <div class="hero">
        <div class="form-box"> 
            <div class="button-box">
                <div id="btn"></div>
                    <button type="button" class="toggle-btn">Edit</button>
                    <button type="button" class="toggle-btn"> <a href="profile.php" id="link">Go Back</a></button>
            </div>
            <form id="register"class= input-group action="edit.php" method="POST">
                <input type="number" name="userid" class="input-field" placeholder="User ID" required>
                <input type="email" name="emailaddress" class="input-field" placeholder="Email Address" required autocomplete="off">
                <input type="number" name="phonenumber" class="input-field" placeholder="Enter Phone Number" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="submit" name= "update" class="submit-btn" value="Edit">
            </form> 
        </div>
    </div>  


</body>
</html>