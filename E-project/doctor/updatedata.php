<?php

include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();

$d_name = $_POST['d_name'];
$d_gender = $_POST['d_gender'];
$d_email = $_POST['d_email'];
$d_phonenumber = $_POST['d_phonenumber'];
$d_city = $_POST['d_city'];
$d_country = $_POST['d_country'];
$d_address = $_POST['d_address'];
$speciality = $_POST['speciality'];
$imgname = "";
if ($_FILES['d_image']['error'] == UPLOAD_ERR_OK) {
    $imgname = $_FILES['d_image']['name'];
    $tmpname = $_FILES['d_image']['tmp_name'];
    $size = $_FILES['d_image']['size'];
    $validExtensions = ["png", "jpg", "jpeg"];
    $extension = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));

    if ($size > 1000000) {
        echo "<script>alert('File too large')</script>";
    } elseif (!in_array($extension, $validExtensions)) {
        echo "<script>alert('File type not supported')</script>";
    } else {
        $imagePath = "./assets/img/doctors/" . $imgname;
        move_uploaded_file($tmpname, $imagePath);
    }
}

$update = "UPDATE `doctors` SET `d_name`='$d_name',`d_gender`='$d_gender',`d_email`='$d_email',`d_phonenumber`='$d_phonenumber',`d_city`='$d_city',`d_country`='$d_country', `d_address`='$d_address',`speciality`='$speciality', `d_image`='$imgname' WHERE d_email='$d_email';";
$result = mysqli_query($connection, $update) or die("failed to insert query");

if ($result) {
    $_SESSION['d_name'] = $d_name;
    $_SESSION['d_email'] = $d_email;
    $_SESSION['d_phonenumber'] = $d_phonenumber;
    $_SESSION['d_address'] = $d_address;
    $_SESSION['d_city'] = $d_city;
    $_SESSION['d_country'] = $d_country;
    $_SESSION['speciality'] = $speciality;

    echo '
    <script>
        Swal.fire({
            title: "Record Updated",
            text: "Your record has been updated successfully.",
            icon: "success"
        }).then(function () {
            window.location.href="doctor-dashboard.php";
        });
    </script>';
} else {
    echo '
    <script>
        Swal.fire({
            title: "Update Failed",
            text: "Sorry, failed to update this record.",
            icon: "error"
        });
    </script>';
}
?>
