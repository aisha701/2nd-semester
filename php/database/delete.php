<?php
require ("connection.php");

$id=$_POST['id'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$city=$_POST['city'];

if($_GET['id']){
    $id=$_GET['id'];}
$delete="DELETE FROM `student` WHERE id='$id';";

$result=mysqli_query($connection,$delete) or die("failed to insert query");
if($result){
    echo "<script>alert(' record deleted')</script>;";
    header("location:index.php");
}
else{
    echo "<script>alert('sorry,failed to delete this record')</script>;";
}
?>
