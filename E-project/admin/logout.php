<?php

include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();

if (isset($_GET['confirm_logout'])) {
    // User has confirmed logout
    session_unset();
    session_destroy();
    header("location: login.php");
    exit(); // Make sure to exit after the header to prevent further execution
}

echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: "Logout Confirmation",
        text: "Are you sure you want to logout?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, logout!",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "login.php?confirm_logout=true";
        }
        else if (result.isDismissed) {
            // Cancel button is pressed
            window.location.href = "index.php"; 
        }
    });
</script>';
?>
