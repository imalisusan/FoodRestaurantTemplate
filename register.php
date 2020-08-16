<?php
require_once('connect.php');
if(isset($_POST['register']))
{
    $userID = NULL;
    $emailAddress = $_POST['emailaddress'];
    $phoneNumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    if($password==$confirmPassword)
    {
            if($db->connect_error)
            {
                die('Connection failed : '.$db->connect_error);
            }
            else
            {
                $stmt =$db->prepare("INSERT INTO users(CustomerID, EmailAddress, PhoneNumber, Password) VALUES (?, ?, ?, ?)");
                //Binds variables to a prepared statement as parameters
                $stmt -> bind_param("isis", $userID, $emailAddress, $phoneNumber, $password);
                $stmt -> execute();
                echo "Registration successful...";
                $stmt ->close();
                $db ->close();
                header("Location: http:login.php");
            }   
    }
    else
    {
        echo "Passwords do not match";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Castro Foods and Restaurant</title>
    <link rel="stylesheet" href="CSS/authentication.css">
</head>
<body>
    <!--Navigation Menu-->
    <nav>      
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="homepage.php#services">About </a></li>
                    <li><a href="blog.php">Blog</a></li>   
                    <li><a href="showUsers.php?page=1">Users</a></li>
                    <li><a href="login.php" class="active">LogIn</a></li>
                    <li><a href="homepage.php#header_footer">ContactUs</a></li>        
                </ul>
            </nav>
    <div class="hero">
        <div class="form-box"> 
            <div class="button-box">
                <div id="btn"></div>
                    <button type="button" class="toggle-btn">Sign Up</button>
                    <button type="button" class="toggle-btn"> <a href="login.php" id="link">Log In</a></button>
            </div>
            <form id="register"class= input-group action="register.php" method="POST">
                <input type="email" name="emailaddress" class="input-field" placeholder="Email Address" required autocomplete="off">
                <input type="number" name="phonenumber" class="input-field" placeholder="Enter Phone Number" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="password" name="confirmpassword" class="input-field" placeholder="Confirm Password" required>
                <input type="checkbox" class="chech-box"><span>I agree to the terms and conditions</span>
                <input type="submit" name="register" class="submit-btn" value="Register">
            </form> 
        </div>
    </div>
</body>
</html>