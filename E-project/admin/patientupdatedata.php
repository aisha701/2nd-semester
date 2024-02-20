<?php
include("./assets/database/connection.php");
include("./assets/include/header.php");

if (isset($_GET['PatientID'])) {
    $PatientID = $_GET['PatientID'];
    $p_name = $_POST['p_name'];
    $p_email = $_POST['p_email'];
    $p_phonenumber = $_POST['p_phonenumber'];
    $p_age = $_POST['p_age'];
    $p_dob = $_POST['p_dob'];
    $p_gender = $_POST['p_gender'];
    $p_address = $_POST['p_address'];
    $p_city = $_POST['p_city'];
    $p_country = $_POST['p_country'];

    $update = "UPDATE `patients` SET 
        `p_name`='$p_name',
        `p_email`='$p_email',
        `p_phonenumber`='$p_phonenumber',
        `p_age`='$p_age',
        `p_phonenumber`='$p_dob',
        `p_gender`='$p_gender',
        `p_address`='$p_address',
        `p_city`='$p_city',
        `p_country`='$p_country'
        WHERE PatientID='$PatientID';";

    $result = mysqli_query($connection, $update) or die("failed to insert query");

    if ($result) {
        echo "<script>
        Swal.fire({
            title: 'Record Updated',
            text: 'This record has been updated successfully.',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        }).then(function () {
            window.location.href = 'index.php';
        });
     </script>";
    } else {
        echo "<script>
        Swal.fire({
            title: 'Update Failed',
            text: 'Sorry, failed to update this record.',
            icon: 'error'
        });
     </script>";
    }
}
?>
 
