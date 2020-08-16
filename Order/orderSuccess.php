<?php
if(!isset($_REQUEST['id']))
{
    header("Location:index.php");
}
require_once('../connect.php');

$result = $db->query("SELECT r.*, c.first_name, c.last_name, c.email, c.phone FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id  WHERE r.id=".$_REQUEST['id']);

if($result->num_rows >0)
{
    $orderInfo = $result->fetch_assoc();
}
else
{
    header("Location: index.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body
{
    margin:0;
    padding:0;
    font-family:'Poppins', sans-serif;
    overflow-x: hidden;
    background: #A8C1C8;
}
    </style>
</head>
<body>
    <!--Navigation Menu-->
    <nav>      
            <ul> 
                <li><a href="../homepage.php" class="active">Home</a></li>
                <li><a href="../homepage.php#services">About </a></li>
                <li><a href="../blog.php">Blog</a></li>   
                <li><a href="index.php">FoodItems</a></li>
                <li><a href="../homepage.php#header_footer">Contact </a></li>  
                <li><a href="../logout.php">LogOut</a></li>      
            </ul>
        </nav>
    <div class="container">
    
    <h1>ORDER STATUS</h1>
    <div class="col-12">
    <?php if(!empty($orderInfo)) {?>
    <div class="col-md-12">
        <div class="alert alert-success">Your order has been placed successfully</div>
    </div>

    <div class="row col-lg-12 ord-addr-info">
        <div class="h3">Order Info</div>
        <p><b>Reference ID:</b> #<?php echo $orderInfo['id'];?> </p>
        <p><b>Total:</b> <?php echo '$'.$orderInfo['grand_total'].'Kshs. ';?> </p>
        <p><b>Placed On:</b><?php echo $orderInfo['created'];?> </p>
        <p><b>Buyer Name:</b><?php echo $orderInfo['first_name']. ' '.$orderInfo['last_name'];?> </p>
        <p><b>Email:</b><?php echo $orderInfo['email'];?> </p>
        <p><b>Phone:</b><?php echo $orderInfo['phone'];?> </p>
    </div>
    <div class="row col-lg-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $result = $db->query("SELECT i.*, p.ProductName, p.Price FROM order_items as i LEFT JOIN fooditems as p ON p.id = i.product_id WHERE i.order_id=".$orderInfo['id']);
            if($result->num_rows >0)
            {
                while($item = $result->fetch_assoc())
                {
                    $price = $item["Price"];
                    $quantity = $item["quantity"];
                    $sub_total = ($price*$quantity);
        ?>
        <tr>
        <td><?php echo $item["ProductName"]; ?></td>
        <td><?php echo '$'.$price.'Kshs. '; ?></td>
        <td><?php echo $quantity ?></td>
        <td><?php echo '$'.$sub_total.'Kshs. '; ?></td>
        </tr>
        <?php }
            } ?>
        </tbody>
    </table>
    </div>
        <?php } else { ?>
    <div class="col md-12">
        <div class="alert alert-danger">Your order submission failed</div>
    </div>
    
    </div>
        <?php }?> 
    </div>
</body>
</html>