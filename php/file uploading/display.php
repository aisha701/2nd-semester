<?php
include("../include/header.php");
require("../include/connection.php");

$connection=mysqli_connect($server,$username,$dbpass,$dbname);
if($connection){
    $read=" SELECT * FROM `mobiles`;";
    $result=mysqli_query($connection,$read);
    if($result){
        if(mysqli_num_rows($result) > 0){
            ?>
<div class="container">
    <div class="row">
       
    </div>
</div>
  <?php
while($row=mysqli_fetch_assoc($result)){
$image=$row['image'];
    echo "<div class='col-lg-4'>";
    echo '<div class="card" style="width: 18rem;">
    <img src='$image' class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">'.$row['name'].'</h5>
      <p class="card-text">'.$row['price'].'</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>';
    echo "</div>";
}
 
 }
 else{
    echo "<script>alert('record not found')</script>";
 }
    }
    else{
        echo "<script>alert('failed to execute query')</script>";
    }
}
else{
    die("failed to connect");
}
?>