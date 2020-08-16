<?php
require_once('../connect.php');
include_once('Cart_class.php');
$cart = new Cart;

if($cart->total_items() <= 0)
{
    header("Location: index.php");
}
//Get posted data from the session
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array();
unset($_SESSION['postData']);

//Get status message from session
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg']))
{
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData'][status]);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins');

body
{
    margin:0;
    padding:0;
    font-family:'Poppins', sans-serif;
    overflow-x: hidden;
    background: #A8C1C8;
}

/*Navigation Menu*/
nav
{
    width: 100%;
    height: 50px;
    background-color: #FFEEF1;
    border-top: 1px solid rgba(255, 255, 255, .2);
    border-bottom: 1px solid rgba(255, 255, 255, .2);
    position: sticky;
    top: 0;
    font-family:'Poppins', sans-serif;
}
nav ul
{
    display: flex;
    margin: 0;
    padding: 0, 100px;
    float: right;
}
nav ul li
{
    list-style: none;
}
nav ul li a
{
    display:block;
    color: black;
    padding: 0 20px;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    line-height: 50px;
}
nav ul li a.active
{
    background: rgb(247, 107, 135);
}

    </style>
</head>

<body>
    <!--Navigation Menu-->
    <nav>      
            <ul> 
                <li><a href="../homepage.php">Home</a></li>
                <li><a href="../blog.php">Blog</a></li>  
                <li><a href="../profile.php">Profile</a></li>   
                <li><a href="index.php">Order Food</a></li>
                <li><a href="../logout.php">Logout</a></li>
                <li><a href="../homepage.php#header_footer">Contact </a></li> 
                <li><a href="viewCart.php" class="active"><img src="../images/shopping-cart.png" style="width:30px;" ></a></li>          
            </ul>
        </nav>
    <div class="container">
    <h1>CHECKOUT</h1>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsg == 'success')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success"><?php echo $statusMsg ?></div>
                </div>
                <?php } elseif(!empty($statusMsg) && ($statusMsg == 'error')){  ?>
                <div class="col-md-12">
                    <div class="alert alert-danger"><?php echo $statusMsg ?></div>
                </div>
                <?php } ?>
                
                <div class="col-md-4 order-md-4 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php 
                        if($cart->total_items() >0)
                        {
                            $cartItems = $cart->contents();
                            foreach($cartItems as $item)
                            {
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                                <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                <small class="text-muted"><?php echo '$'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                        </div>
                        <span class="text-muted"><?php echo '$'.$item["subtotal"]; ?></span>
                    </li>
                    <?php }} ?>
                    <li class="list-group-item d-flex justify-content-between">
                    <span>Total (Kshs. )</span>
                    <strong><?php echo '$'.$cart->total(); ?></strong>
                    </li>
                </ul>
                <a href="index.php" class="btn btn-block btn-info">Add Items</a>
                </div>
                <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Contact Details</h4>
                <form method="POST" action="cartAction.php">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo !empty($postData['first_name'])?$postData['first_name']: '';?> " style="background-color: transparent; border:1px solid #FFEEF1;" >
                        </div>
                        <div class="col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo !empty($postData['last_name'])?$postData['last_name']: '';?>" style="background-color: transparent; border:1px solid #FFEEF1;" >
                        </div>
                        <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']: '';?>" style="background-color: transparent; border:1px solid #FFEEF1;" >
                        </div>
                        <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']: '';?>" style="background-color: transparent; border:1px solid #FFEEF1;" >
                        </div>
                        <div class="col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo !empty($postData['address'])?$postData['address']: '';?>" style="background-color: transparent; border:1px solid #FFEEF1;" >
                        <br><br><br><br>
                        </div>
                        
                        <input type="hidden" name="action" value="placeOrder">  
                        <input type="submit" class="btn btn-success btn-lg btn-block" name="checkoutSubmit" value="Place Order"> 
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
    </div>
</body>
</html> 