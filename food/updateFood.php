<?php
// Include the database configuration file
include('../connect.php');
$imageID = $_GET["Upd"];
$name = $_POST['productname'];
$price = $_POST['productprice'];
$statusMsg = '';
$backlink = ' <a href="editfood.php">Go back</a>';

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
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
            {
                $myQuery = $db->prepare("UPDATE fooditems SET `file_name`=?, `ProductName`=?, `Price`=?  WHERE `id`=?");
                $myQuery -> bind_param("ssii", $fileName, $name, $price, $imageID);
                $myQuery->execute();
                if($myQuery){
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
            $statusMsg = "The file <b>".$fileName. "</b> is already exist." . $backlink;
        }
}else{
    $statusMsg = 'Please select a file to upload.' . $backlink;
}

// Display status message
echo $statusMsg;

?>