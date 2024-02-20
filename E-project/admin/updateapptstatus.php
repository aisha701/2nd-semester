<?php
include("./assets/database/connection.php");
include("./assets/include/header.php");
session_start();

if(isset($_SESSION['role']) && $_SESSION['role'] == "Administrator"){
    if(isset($_GET['apt_id']) && isset($_GET['action'])){
        $apt_id = $_GET['apt_id'];
        $action = $_GET['action'];
        
        $updateStatus = "UPDATE `appointments` SET `Status`='$action' WHERE `AppointmentID`=$apt_id;";
        $result = mysqli_query($connection, $updateStatus) or die("failed to insert query");

        if ($result) {
            echo "<script>
                    Swal.fire({
                        title: 'Success',
                        text: 'Record updated successfully.',
                        icon: 'success',
                        timer: 3000,
                        showConfirmButton: false
                    }).then(function () {
                        window.location.href = 'appointment-list.php';
                    });
                 </script>";
            exit();
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to update record.',
                        icon: 'error'
                    });
                 </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'Invalid parameters.',
                    icon: 'error'
                });
             </script>";
    }
} else {
    header("location: login.php");
}
?>
