<?php
if(isset($_POST['update']))
{

    $userType = $_POST['usertype'];
    $emailAddress = $_POST['emailaddress'];
    $phoneNumber = $_POST['phonenumber'];
    $password = $_POST['password'];
            $query = "UPDATE `users` SET `EmailAddress` = '".$emailAddress."', `PhoneNumber` = $phoneNumber, `Password` = '".$password."', `User_Type` = '".$userType."' WHERE `customers`.`CustomerID` =$userID";
            $result = mysqli_query($conn, $query);    
            if($result)
            {
                echo 'Data Updated';
            }
            else
            {
                echo 'Data not updated';
            }
            mysqli_close($conn);
}