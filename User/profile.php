<?php
require_once('../connect.php');
session_start();
$emailAddress = $_SESSION['email'];
$query = "SELECT * FROM users where EmailAddress='$emailAddress'";
$result = mysqli_query($db, $query);
 //fetches a result row as an associative array.
 while($rows = mysqli_fetch_assoc($result))
 {
    $userID=$rows['CustomerID'];
    $emailAddress=$rows['EmailAddress'];
    $phoneNumber=$rows['PhoneNumber'];
    $userType=$rows['User_Type'];
 }
?>  
<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../CSS/profile.css">
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        </head>
        <body>
            <!--Navigation Menu-->
        <nav>      
            <ul> 
                <li><a href="../homepage.php">Home</a></li>
                <li><a href="../homepage.php#services">About </a></li>
                <li><a href="../blog.html">Blog</a></li>   
                <li><a href="profile.php" class="active">Profile</a></li>  
                <li><a href="../Order/trial.php">Order</a></li>
                <li><a href="../logout.php">LogOut</a></li>  
                <li><a href="../homepage.php#header_footer">Contact </a></li>        
            </ul>
        </nav>
         <div class="container">
             <div class="cover-photo">
                 <img class="profile" src="../images/user.png" alt="_blank" >
             </div>
             <div class="profile-name">
                <p>Profile Details </p>
             </div>
             <p class="about">
             User ID: <?php echo $userID?> <br>
             Email: <?php echo $emailAddress?> <br>
             Phone Number: <?php echo $phoneNumber?> <br>
             Account Type: <?php echo $userType?> <br>
            
             </p>
          
             <a class="msg-btn" href="edit.php" id="edit">Edit Details</a>
             <a class="follow-btn" id="delete" href="delete.php?Del=<?php echo $userID?>">Delete Profile</a>
            
             <div>
                 <i class="fab fa-facebook-f"></i>
                 <i class="fab fa-instagram"></i>
                 <i class="fab fa-youtube"></i>
                 <i class="fab fa-twitter"></i>
             </div>
         </div>   

        </body>
        </html>