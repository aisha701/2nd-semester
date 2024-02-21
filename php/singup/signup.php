<?php
include("../include/header.php");
require("../include/connection.php");

if(isset($_POST['signup'])){
    
    $username=mysqli_real_escape_string($connection,$_POST['username']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);

$encrypedPassword=password_hash($password, PASSWORD_BCRYPT);

$check="SELECT * FROM users WHERE email='$email';";
$res=mysqli_query($connection,$check) or die ("failed");
if(mysqli_num_rows($res)>0){
echo "<script> alert('Already registered. Please login now..')
window.location.href='login.php';</script>;";
}

else{
$insert="INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$username','$email','$encrypedPassword');";
$result=mysqli_query($connection,$insert) or die("failed to insert query");
if($result){
    echo "<script>alert('Account Created Succesfully');
    window.location.href='login.php';</script>;";
}
else{
    echo "<script>alert('sorry,failed to create your account')</script>;";
}
}
}
?>

<div class="container my-4">
        <h1 class="text-center">SIGNUP FROM</h1>

        <form action="" class="form-group" method="post">
<input type="name" class="form-control my-2" name="username" id="" placeholder="Enter your name">
<input type="email" class="form-control my-2" name="email" id="" placeholder="Enter your email">
<input type="password" class="form-control my-2" name="password" id="" placeholder="Enter a strong password">
<input type="submit" class="form-control my-2 submit" name="signup" id="" >

        </form>
     </div>
