<?php
include_once('Cart_class.php');
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <script>
    function updateCartItem(obj, id)
    {
        $.get("cartAction.php", {action: "updateCartItem", id:id, qty:obj.value}, function(data)
        {
            if(data == 'ok')
            {
                location.reload();
            }
            else
            {
                alert('Cart update failed, please try again.');
            }
        });
    }
    
    </script>
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
                <li><a href="../blog.html">Blog</a></li>  
                <li><a href="../User/profile.php">Profile</a></li>   
                <li><a href="index.php">Order Food</a></li>
                <li><a href="../logout.php">Logout</a></li>
                <li><a href="../homepage.php#header_footer">Contact </a></li> 
                <li><a href="viewCart.php" class="active"><img src="../images/shopping-cart.png" style="width:30px;" ></a></li>          
            </ul>
        </nav>
  <div class="container">
  <h1>Shopping Cart</h1>
    <div class="row">
    <div class="cart">
    <div class="col-12">
    <div class="table table-responsive">
    <table class="table table-stripped">
    <thead>
    <tr>
    <th width="45%">Product</th>
    <th width="10%">Price</th>
    <th width="15%">Quantity</th>
    <th class="text-right" width="20%">Total</th>
    <th width="10%"></th>
    </tr>
    </thead>
    <tbody>
    <?php
        if($cart->total_items() >0)
        {
            //Get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item)
            {
    ?>
    <tr>
        <td><?php echo $item["name"];?></td>
        <td><?php echo '$'.$item["price"].'Kshs. ';?></td>
        <td><input class="form-control" style="background-color: transparent; border:1px solid #FFEEF1;" type="number" value="<?php echo $item["qty"]; ?>" onchange=" updateCartItem(this, '<?php echo $item["rowid"]; ?>') "/></td>
        <td class="text-right"><?php echo '$'.$item["subtotal"].' Kshs. '; ?></td>
        <td class="text-right"><input  class="btn btn-sm btn-danger" value="Remove" style="background: rgb(247, 107, 135);border: 1px solid rgb(247, 107, 135);width:100px;"onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"></td>
         </tr>
            <?php }} else {?>
            <tr><td colspan="5"><p>Your cart is empty...</p></td></tr>
            <?php } ?>
            <?php if($cart->total_items() >0)
            {
                ?>
            <tr>
            <td></td>
            <td></td>
            <td><strong>Cart Total</strong></td>
            <td class="text-right"><strong><?php  echo '$'.$cart->total().'Kshs. '; ?></strong></td>
            <td></td>
            </tr>
            <?php } ?>
    </tbody>
    
    </table>
    </div>
    </div>
    <div class="col mb-2">
        <div class="row">
        <div class="col-sm-12 col-md-6">
            <a href="index.php" class="btn btn-block btn-light">Continue Shopping</a>
        </div>
        <div class="col-sm-12 col-md-6 text-right">
            <?php if($cart->total_items() > 0){?>
            <a href="checkout.php" class="btn btn-ig btn-block btn-primary"style="background: rgb(247, 107, 135); border: 1px solid rgb(247, 107, 135);">Checkout</a>
            <?php } ?>
        </div>   
        </div>
    </div>
    </div>
    </div>
  </div>  
</body>
</html>

