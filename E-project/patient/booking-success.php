<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();
if(isset( $_SESSION['p_email']) ){ 

?>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content success-page-cont">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
<?php
if (isset($_GET['DoctorID'])) {
    $DoctorID = $_GET['DoctorID'];
    $getDoctordata = "SELECT * FROM `appointments` as a 
        INNER JOIN `patients` as p ON a.PatientID=p.PatientID 
        INNER JOIN `doctors` as d ON a.DoctorID=d.DoctorID  
        WHERE a.DoctorID = $DoctorID
        ORDER BY a.AppointmentID DESC;";
    $getDoctordata_run = mysqli_query($connection, $getDoctordata) or die("failed");

    if (mysqli_num_rows($getDoctordata_run) > 0) {
        while ($doctor = mysqli_fetch_assoc($getDoctordata_run)) {
            echo '
                <!-- Success Card -->
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                            <i class="fas fa-check"></i>
                            <h3>Appointment booked Successfully!</h3>
                            <p>Appointment booked with <strong>Dr. ' . $doctor["d_name"] . '</strong><br> on <strong> ' . $doctor["day"] . ' at ' . $doctor["timing"] . ' </strong></p>
                            
                        </div>
                    </div>
                </div>
                <!-- /Success Card -->';
        }
    }
}
?>



							
						</div>
					</div>
					
				</div>
			</div>		
			<!-- /Page Content -->
   
		   
			<?php 
			
}else{
    header("location: patient-login.php");
}
include("./assets/include/footer.php");
?>