<?php
include("../include/connection.php");
if(isset($_GET['item_id'])){
    $itemid=$_GET['item_id'];
    $removeitem="DELETE FROM `cart` where `cart_id`=$itemid;";
    $removeitem_run=mysqli_query($connection,$removeitem) or die ("failed");
    if($removeitem_run){
        echo "<script>alert('item deleted successfully')
        window.location.href='cart.php'</script>";
    }
    else{
        echo "<script>alert('failed to delete item')
        window.location.href='cart.php'</script>";
    }
}else{
    header("location: cart.php");
}
?>