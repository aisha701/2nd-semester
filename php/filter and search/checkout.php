
<?php
include("../include/header.php");
include("../include/connection.php");
include("./nav.php");
      session_start();
      if(isset($_SESSION['total'])) {
          $total = $_SESSION['total'];
          echo "<input type='hidden' name='total' value='$total'>";
          echo'  <div class="container mt-5">
          <h1>Total: '.$total.'</h1></div>';
      }


if(isset($_POST['Add'])){

 $name=$_POST['name'];
 $email=$_POST['email'];
 $address=$_POST['address'];
 $payment_method=$_POST['payment_method'];

 
$insert="INSERT INTO `orders`( `name`, `email`, `address`, `payment_method`) VALUES ('$name','$email','$address','$payment_method');";
$result=mysqli_query($connection , $insert) or die("failed to insert query.");
if($result){
   echo "<script>alert('Student`s Details added.')</script>;";
}
else{
    echo "<script>alert('Sorry, Failed to insert this record.')</script>";
}
}
if(isset($_POST['Add'])){

    $card_number=$_POST['card_number'];
    $card_name=$_POST['card_name'];
    $expiry=$_POST['expiry'];
    $cvv=$_POST['cvv'];

 
$insert="INSERT INTO `payments`( `card_number`, `card_name`, `expiry_date`, `CVV`) VALUES ('$card_number','$card_name','$expiry_date','$cvv');";
$result=mysqli_query($connection , $insert) or die("failed to insert query.");
if($result){
   echo "<script>alert('Student`s Details added.')</script>;";
}
else{
    echo "<script>alert('Sorry, Failed to insert this record.')</script>";
}
}
?>
<body>
  <div class="container" style="margin-top:10rem;">
    <h1 class="mb-4">Checkout Form</h1>
    <form action="" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address:</label>
        <textarea class="form-control" id="address" name="address" required></textarea>
      </div>

      <div class="mb-3">
        <label for="payment_method" class="form-label">Payment Method:</label>
        <select class="form-select" id="payment_method" name="payment_method" required>
          <option value="credit_card">Credit Card</option>
          <option value="debit_card">Debit Card</option>
          <option value="paypal">PayPal</option>
        </select>
      </div>
      <div class="container mt-5">
    <h1>Card Information</h1>
   
      <div class="mb-3">
        <label for="card-number" class="form-label">Card Number:</label>
        <input type="text" class="form-control" id="card-number" name="card_number" placeholder="Card Number" required>
      </div>

      <div class="mb-3">
        <label for="card-name" class="form-label">Cardholder Name:</label>
        <input type="text" class="form-control" id="card-name" name="card_name" placeholder="Cardholder Name" required>
      </div>

      <div class="mb-3">
        <label for="expiry" class="form-label">Expiry Date:</label>
        <input type="text" class="form-control" id="expiry" name="expiry" placeholder="MM/YY" required>
      </div>

      <div class="mb-3">
        <label for="cvv" class="form-label">CVV:</label>
        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" required>
      </div>


  </div>

      

      <button type="submit" class="btn btn-primary">Confirm Order</button>
    </form>
  </div>
  
  <?php
include("./footer.php");
?>

 
