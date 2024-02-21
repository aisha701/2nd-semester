<?php
include("../include/header.php");
require("../include/connection.php");

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']=="POST"){
    echo $name=$_POST['name'];
    echo $price=$_POST['price'];

if($_FILES['image']['error']==4){
    echo "<script>alert('image not found')</script>";
}else{
    $imgname=$_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];
    $size=$_FILES['image']['size'];
    $validextension=$_FILES=["png","jpg","jpeg"];

    $extension = explode(".",$imgname);
    $extension = strtolower(end($extension));

    if($size > 1000000){
        echo "<script>alert('file too large')</script>"; 
    } elseif(!in_array($extension, $validextension)){
        echo "<script>alert('file type not supported')</script>"; 
    }else{
        $newimgname=uniqid().".".$extension;
        $insert ="INSERT INTO `mobiles`( `name`, `price`, `image`) VALUES ('$name','$price','$newimgname')";
        $result=mysqli_query($connection,$insert) or die("failed");
if($result){
    move_uploaded_file($tmpname,"images/".$newimgname);
    echo "<script>alert('product registered succesfully')</script>"; 
}
    }
}

}

?>
<div class="container ">
        <h3 class="text-center display-3 ">PRODUCT REGISTRATION</h3>

        <form action="" method="post" enctype="multipart/form-data">
<input  class="form-control my-2" type="text" name="name" id="name" placeholder="Enter mobile's name">
<input class="form-control my-2" type="number" name="price" id="price" placeholder="Enter mobile's price">
<input  class="form-control my-2" type="file" name="image" id="image" accept =".jpg, .png, .jpeg" >
<input type="submit" class="form-control my-2 submit" name="submit" value="ADD" >

        </form>
     </div>
