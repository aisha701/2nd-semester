<?php
include("../include/header.php");
require("../include/connection.php");

if(isset($_POST['signin']) && $_SERVER['REQUEST_METHOD']=="POST"){
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
$check="SELECT * FROM users WHERE email='$email';";
$result=mysqli_query($connection,$check) or die ("failed to insert query.");
if($result){
    if(mysqli_num_rows($result) == 1){
        $row=mysqli_fetch_assoc($result);

        $regUsername=$row['username'];
        $regEmail=$row['email'];
        $regPass=$row['password'];

        $verifyPass=password_verify($password,$regPass);
        if($verifyPass){
            session_start();
            $_SESSION['email']=$regEmail;
            $_SESSION['username']=$regUsername;
            echo "<script> alert('successfully login.')
            window.location.href='home.php';</script>;";

        }
        else{
            echo "<script> alert('Inavlid credentials')
</script>;";
        }
    }
    else{
        echo "<script> alert('create account')
        window.location.href='signup.php';
</script>;";
    }
}}

?>
<div class="container my-4">
        <h1 class="text-center">Log In</h1>

        <form action="" class="form-group" method="post">
<input type="email" class="form-control my-2" name="email" id="" placeholder="Enter your email">
<input type="password" class="form-control my-2" name="password" id="" placeholder="Enter a strong password">
<input type="submit" class="form-control my-2 submit" name="signin" id="" >

        </form>
     </div>