<?php
include("./assets/database/connection.php");
session_start();
$a_image=$_POST['p_image'];
$p_name=$_POST['p_name'];
$a_name=$_POST['p_dob'];
$p_email=$_POST['p_email'];
$p_phonenumber=$_POST['p_phonenumber'];
$p_address=$_POST['p_address'];
$p_city=$_POST['p_city'];
$p_country=$_POST['p_country']; 
$p_age=$_POST['p_age'];


if ($_FILES['p_image']['error'] == UPLOAD_ERR_OK) {
    $imgname = $_FILES['p_image']['name'];
    $tmpname = $_FILES['p_image']['tmp_name'];
    $size = $_FILES['p_image']['size'];

    $validExtensions = ["png", "jpg", "jpeg"];
    $extension = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));

    if ($size > 1000000) {
        echo "<script>alert('File too large')</script>";
    } elseif (!in_array($extension, $validExtensions)) {
        echo "<script>alert('File type not supported')</script>";
    } else {
        $imagePath = "./assets/img/patients/" . $imgname;
        move_uploaded_file($tmpname, $imagePath); 
    }
}




$update="UPDATE `patients` SET `p_image`='$p_image',`p_name`='$p_name',`p_dob`='$p_dob',`p_email`='$p_email',`p_phonenumber`='$p_phonenumber',`p_address`='$p_address',`p_city`='$p_city',`p_country`='$p_country' , `p_image`='$imgname',`p_age`='$p_age' WHERE p_email='$p_email';";

$result=mysqli_query($connection,$update) or die("failed to insert query");
if($result){
    
	$_SESSION['p_name']=$p_name;
	$_SESSION['p_email']=$p_email;
	$_SESSION['p_phonenumber']=$p_phonenumber;
    $_SESSION['p_address']=$p_address;
    $_SESSION['p_age']=$p_age; 
    $_SESSION['p_dob']=$p_dob; 
    $_SESSION['p_city']=$p_city; 
    $_SESSION['p_country']=$p_country;
    echo '
    <script>
        Swal.fire({
            title: "Record Updated",
            text: "Your record has been updated successfully.",
            icon: "success"
        }).then(function () {
            window.location.href="patient-dashboard.php";
        });
    </script>';
    header("location:patient-dashboard.php");
}
else{
    echo '<script>
    Swal.fire({
        title: "Update Failed",
        text: "Sorry, failed to update this record.",
        icon: "error"
    });
</script>';
}
?>