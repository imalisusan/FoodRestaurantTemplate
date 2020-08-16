<?php
require_once('connect.php');
if(isset($_POST['login']))
{
$emailAddress = $_POST['email'];
$password = $_POST['pass'];

 if($db->connect_error)
 {
     die('Connection failed: '.connect_error);
 }
 else
 {
    $stmt = "SELECT * FROM users where EmailAddress='$emailAddress' AND Password = '$password'";
    $result = mysqli_query($db, $stmt);
    $row = mysqli_fetch_array($result);
    if($row['EmailAddress'] == $emailAddress && $row['Password'] == $password)
    {
       if($row['User_Type'] == 'admin')
       {
        setcookie('email', $emailAddress, time()+60*60+7);
        session_start();
        $_SESSION['email'] = $emailAddress;
        header("Location: http:Admin/showUsers.php?page=1");
       }
       else
       {
        setcookie('email', $emailAddress, time()+60*60+7);
        session_start();
        $_SESSION['email'] = $emailAddress;
        header("location: User/profile.php");  
       }
    }
    else
    {
        echo "You have enterred an Incorrect Password";
        $db ->close();
        header("Location: http:login.php");
    } 
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
                    <li><a href="blog.html">Blog</a></li>   
                    <li><a href="showUsers.php?page=1">Users</a></li>
                    <li><a href="login.php" class="active">LogIn</a></li>
                    <li><a href="homepage.php#header_footer">ContactUs</a></li>        
                </ul>
            </nav>
    <div class="hero">
        <div class="form-box"> 
            <div class="button-box">
                <div id="btn"></div>
                    <button type="button" class="toggle-btn">Log In</button>
                    <button type="button" class="toggle-btn"><a href="register.php" id="link">Register</a></button>
            </div>
            <form id="login" class= input-group action="login.php" method="POST">    
                <input type="text" name="email" id="email" class="input-field" placeholder="Enter Email Address" required>
                <input type="password" name="pass" id="pass" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class= "chech-box" name="remember"><span>Remember Password</span>
                <input type="submit" name="login" class= "submit-btn" value="Log In">
            </form>
        </div>
    </div>


</body>
</html>