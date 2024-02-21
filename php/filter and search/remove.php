<?php 
include("../include/header.php");
include("../include/connection.php");
include("./nav.php");


if($_GET['id']){
    // echo "id found";
   $id=$_GET['id'];


$delete="DELETE FROM `cart` WHERE id= '$id';";

$result=mysqli_query($connection , $delete) or die("failed to insert query.");
if($result){
   echo "<script>alert('Student`s Details Deleted.')</script>;";
   
}
else{
    echo "<script>alert('Sorry, Failed to delete this record.')</script>";
}}

?>





