<?php
include_once('Cart_class.php');
$cart = new Cart;
require_once('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food</title>
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
                <li><a href="../User/profile.php">Profile</a></li>   
                <li><a href="#" class="active">Order Food</a></li>
                <li><a href="../logout.php">Logout</a></li>
                <li><a href="homepage.php#header_footer">Contact </a></li> 
                <li><a href="viewCart.php"><img src="../images/shopping-cart.png" style="width:30px;" ></a></li>       
            </ul>
        </nav>
    <div class="container">
    <h1>FOOD ITEMS</h1>
    <div class="cart-view">
    <a href="viewCart.php" title="View Cart"><i class="icart"></i>(Cart status: <?php echo ($cart->total_items() >0)?$cart->total_items().' Items':'Empty';?>)</a>
    </div>
    <div class="row col-lg-12">
    <?php
    //Get products from database
    $result = $db->query("SELECT * FROM fooditems ORDER BY id DESC LIMIT 10");
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
    
    ?>
    <div class="card col-lg-3" style="background-color: #FFEEF1">
        <div class="card-body" >
        <p>
                <?php
                $imageURL = '../food/assets/'.$row["file_name"];
                ?>
                <img src="<?= $imageURL; ?>" style="width:200px; height:100px;"/>
        </p>
            <h5 class="card-title"><?php echo $row["ProductName"];?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo '$'.$row["Price"].'Kshs. ';?></h6>
            <p class="card-text"><?php echo $row["description"];?></p>
            <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary" style="background: rgb(247, 107, 135); border: 1px solid rgb(247, 107, 135);">Add to Cart</a>
        </div>
    </div>
    <?php } } else{ ?>
    <p>Products not found.....</p>
    <?php }?>
    </div>
    </div>
</body>
</html>