<?php
require ("connection.php");

$id=$_POST['id'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$city=$_POST['city'];

$update="UPDATE `student` SET `name`='$name',`contact no`='$contact',`city`='$city' WHERE id='$id';";

$result=mysqli_query($connection,$update) or die("failed to insert query");
if($result){
    echo "<script>alert('update this record')</script>;";
    header("location:index.php");
}
else{
    echo "<script>alert('sorry,failed to update this record')</script>;";
}
?>
