<?php
include("./assets/database/connection.php");
include("./assets/include/header.php");

if (isset($_GET['DoctorID'])) {
    $DoctorID = $_GET['DoctorID'];
    $d_name = $_POST['d_name'];
    $d_email = $_POST['d_email'];
    $d_phonenumber = $_POST['d_phonenumber'];
    $speciality = $_POST['speciality'];
    $d_address = $_POST['d_address'];
    $d_city = $_POST['d_city'];
    $d_country = $_POST['d_country'];

    $update = "UPDATE `doctors` SET 
        `d_name`='$d_name',
        `d_email`='$d_email',
        `d_phonenumber`='$d_phonenumber',
        `speciality`='$speciality',
        `d_address`='$d_address',
        `d_city`='$d_city',
        `d_country`='$d_country'
        WHERE DoctorID='$DoctorID';";

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
