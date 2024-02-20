<?php
include("./assets/include/header.php");

include("./assets/database/connection.php");
session_start();
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_city=$_POST['a_city'];
$a_country=$_POST['a_country'];
$a_address=$_POST['a_address'];
$a_age=$_POST['a_age'];
$a_phonenumber=$_POST['a_phonenumber'];
// $a_image=$_FILES['a_image']; 
if ($_FILES['a_image']['error'] == UPLOAD_ERR_OK) {
    $imgname = $_FILES['a_image']['name'];
    $tmpname = $_FILES['a_image']['tmp_name'];
    $size = $_FILES['a_image']['size'];

    $validExtensions = ["png", "jpg", "jpeg"];
    $extension = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));

    if ($size > 1000000) {
        echo "<script>alert('File too large')</script>";
    } elseif (!in_array($extension, $validExtensions)) {
        echo "<script>alert('File type not supported')</script>";
    } else {
        $imagePath = "./assets/img/profiles/" . $imgname;
        move_uploaded_file($tmpname, $imagePath);
    }
}
$update="UPDATE `users` SET `a_name`='$a_name',`a_email`='$a_email',`a_city`='$a_city',`a_country`='$a_country',`a_address`='$a_address',`a_age`='$a_age',`a_phonenumber`='$a_phonenumber',`a_image`='$imgname' WHERE a_email='$a_email';";

$result=mysqli_query($connection,$update) or die("failed to insert query");
if($result){
    
	$_SESSION['a_name']=$a_name;
	$_SESSION['a_email']=$a_email;
	$_SESSION['a_city']=$a_city;
    $_SESSION['a_country']=$a_country;
    $_SESSION['a_address']=$a_address; 
    $_SESSION['a_age']=$a_age; 
    $_SESSION['a_phonenumber']=$a_phonenumber; 
    $_SESSION['a_image']=$imgname;
    
    echo '
    <script>
        Swal.fire({
            title: "Record Updated",
            text: "Your record has been updated successfully.",
            icon: "success"
        }).then(function () {
            window.location.href="profile.php";
        });
    </script>';
   
}
else{
    echo  '<script>
    Swal.fire({
        title: "Update Failed",
        text: "Sorry, failed to update this record.",
        icon: "error"
    });
</script>';
}
?>