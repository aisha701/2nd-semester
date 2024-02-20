<?php
include("./assets/include/header.php");

include("./assets/database/connection.php");

if(isset($_GET['DoctorID'])) {
    $DoctorID = $_GET['DoctorID'];
}

if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    $delete = "DELETE FROM `doctors` WHERE DoctorID='$DoctorID';";
    $result = mysqli_query($connection, $delete) or die("failed to execute query");

    if($result) {
        echo "<script>
                Swal.fire({
                    title: 'Successfully deleted!',
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
                    title: 'Failed to delete this record',
                    icon: 'error'
                });
             </script>";
    }
} else {
    echo "<script>
            Swal.fire({
                title: 'Delete Confirmation',
                text: 'Are you sure you want to delete this record?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete.php?DoctorID=$DoctorID&confirm=true';
                }
                else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = 'index.php'; 
                  }
            });
         </script>";
}
?>
