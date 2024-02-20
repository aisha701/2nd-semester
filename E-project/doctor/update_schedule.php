<?php
include("./assets/database/connection.php");
include("./assets/include/header.php");
if (isset($_GET['DoctorID']) && isset($_GET['timing']) && isset($_GET['availabilityday']) && isset($_GET['timingslotduration'])) {
    $DoctorID = (int)$_GET['DoctorID'];
    $timing = mysqli_real_escape_string($connection, $_GET['timing']);
    $availabilityday = mysqli_real_escape_string($connection, $_GET['availabilityday']);
    $timingslotduration = mysqli_real_escape_string($connection, $_GET['timingslotduration']);
    $update = "UPDATE doctoravailability SET timing='$timing', availabilityday='$availabilityday', timingslotduration='$timingslotduration' WHERE DoctorID=$DoctorID";
    $result = mysqli_query($connection, $update);
    if ($result) {
        echo '<script>
            // Use SweetAlert for displaying a success message
            Swal.fire({
                title: "Success",
                text: "Schedule updated successfully",
                icon: "success"
            });
        </script>';
    } else {
        // Display or log the specific MySQL error
        echo "<script>alert('Update error: " . mysqli_error($connection) . "');</script>";
    }
} else {
    echo '<script>
    // Use SweetAlert for displaying an error message
    Swal.fire({
        title: "Error",
        text: "Invalid parameters",
        icon: "error"
    });
</script>';
}
echo "<script>window.location.href = 'schedule-timings.php';</script>";
?>
