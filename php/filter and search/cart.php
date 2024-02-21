<?php 
include("../include/header.php");
include("../include/connection.php");
include("./nav.php");


?>

<div class="container" style="margin-top:120px;">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S No.</th>
      <th scope="col">Product Name</th>
      <th scope="col">Picture</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
<?php
$subtotal=0;
$getCartItems="SELECT * FROM `cart` as c inner join `clothes` as cl on c.p_id=cl.id inner join  `category` as cat on cl.category_id=cat.category_id
ORDER by c.cart_id DESC;";
$getCartItems_run=mysqli_query($connection, $getCartItems) or die("failed");
if(mysqli_num_rows($getCartItems_run) > 0){
?>

  <tbody>
    <?php
    $i=1;
    
    while($cartItem=mysqli_fetch_assoc($getCartItems_run)){

        $id=$cartItem['id'];
        $subtotal+=$cartItem['total'];
    ?>
    <tr>
      <th scope="row">1</th>
      <td><?=$cartItem['name']?><?=$cartItem['category_name']?></td>
      <td><img src="./images/<?=$cartItem['image']?>"  alt="<?=$cartItem['name']?>" height=100></td>
      <td><?=$cartItem['price']?></td>
      <td><?=$cartItem['qty']?></td>
      <td><?=$cartItem['total']?></td>
      <td><a href="removecartitem.php?item_id=<?=$cartItem['cart_id']?>"><i class="fa-solid fa-xmark"></i></a></td>
    </tr>
    <?php
    $i++;
  }
    echo '</tbody>';
  }
    ?>
  </tbody>
</table>

<h2 class="display-5">subtotal: <?=$subtotal?> PKR <button class="btn btn-outline-danger btn-sm"><a href="checkout.php"> Proceed To Checkout</a></button></h2>
</div>
<?php
include("./footer.php");
?>
