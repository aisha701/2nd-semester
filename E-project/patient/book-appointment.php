<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();
if(isset( $_SESSION['p_email']) ){ 

                // Check if the 'image' key is set in the session
                if (isset($_SESSION['p_image'])) {
                    $imagePath = './assets/img/patients/' . $_SESSION['p_image'];
                     "<img src='$imagePath' alt='User Image'>";
                } else {
                     "<img src='./assets/img/default-image.png' alt='Default Image'>";
                }
                ?>


			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

            
	<!-- Profile Sidebar -->
    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
						
								<div class='widget-profile pro-widget-content'>
									<div class='profile-info-widget'>
										<a href='#' class='booking-doc-img'>
											<img src='<?php echo $imagePath; ?>' alt='User Image'>
										</a>
										<div class='profile-det-info '>
											<h3 class="text-capitalize"><?php echo $_SESSION['p_name']?></h3>
											<div class='patient-details'>
												<h5><i class='fas fa-birthday-cake'></i> <?php echo $_SESSION['p_dob']?>, <?php echo $_SESSION['p_age']?> years</h5>
												<h5 class='mb-0'><i class='fas fa-map-marker-alt'></i><?php echo $_SESSION['p_address']?></h5>
											</div>
										</div>
									</div>
								</div>

								<div class="dashboard-widget">
								<nav class="dashboard-menu">
										<ul>
											<li >
												<a href="patient-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="">
												<a href="Booking.php">
													<i class="fas fa-columns"></i>
													<span>My Booking </span>
												</a>
											</li>
											<li>
												<a href="profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="patient-change-password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="logout.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->



			<?php

if (isset($_GET['DoctorID'])) {
    $DoctorID = $_GET['DoctorID'];
    $getDoctordata = "SELECT * from doctors WHERE DoctorID = $DoctorID ";
    $getDoctordata_run = mysqli_query($connection, $getDoctordata) or die("failed");

    if (mysqli_num_rows($getDoctordata_run) > 0) {
        while ($doctor = mysqli_fetch_assoc($getDoctordata_run)) {
            $DoctorID = $doctor['DoctorID'];

            echo '
            
            <!-- Page Content -->
            <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="content">
                <div class="container">
                  
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="booking-doc-info ">
                                        <a href="doctor-profile.html" class="booking-doc-img">
                                            <img src="../doctor/assets/img/doctors/' . $doctor["d_image"] . '" alt="User Image">
                                        </a>
                                        <div class="booking-info">
                                            <h4><a href="doctor-profile.html">Dr. ' . $doctor["d_name"] . '</a></h4>
                                           
                                            <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> ' . $doctor["d_city"] . ', ' . $doctor["d_country"] . '</p>
                                            <p class="text-muted mb-0"><i class="fas fa-user-md"></i> ' . $doctor["speciality"] . '</p>
                                        </div>
                                       <div class="extra">
                                       
                                       
                                       </div>

										</div>
                                   
                   
            ';
        }
    }
}
?> 

<?php
if (isset($_GET['DoctorID']) )  {
    $DoctorID = $_GET['DoctorID'];
    $getdoctoravailability = "SELECT * FROM doctoravailability WHERE DoctorID = $DoctorID";
    $getdoctoravailability_run = mysqli_query($connection, $getdoctoravailability) or die("failed");

    if (mysqli_num_rows($getdoctoravailability_run) > 0) {
        while ($doctor = mysqli_fetch_assoc($getdoctoravailability_run)) {
            $DoctorID = $doctor['DoctorID'];
            $timing = $doctor['timing'];
            $availabilityday = $doctor['availabilityday'];
            $Timingslotduration = $doctor['Timingslotduration'];

            echo '
                <div>
                    <form action="" class="mt-5" method="Post">
                       
                            <div class="form-group col-lg-4">
                                <label for="timing">Timing</label>
                                <input  name="timing" value="'.$timing.'" class="form-control" readonly>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="day">Day</label>
                                <input  name="day" value="'.$availabilityday.'" class="form-control" readonly>

                            </div>
                            <div class="form-group col-lg-4">
                                <label for="appointmentDuration">Available for</label>
                                <input  name="app_duration" value="'.$Timingslotduration.'" class="form-control" readonly>

                            </div>
                        
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-outline-primary" name="add">Book Now</button>
                        </div>
                    </form>
                </div>';
        }

        if (isset($_POST['add']) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $DoctorID=$_GET['DoctorID'];
            $p_name =$_SESSION['p_name'];
            $PatientID =$_SESSION['PatientID'];
            $day = isset($_POST['day']) ? mysqli_real_escape_string($connection, $_POST['day']) : '';
            $timing = isset($_POST['timing']) ? mysqli_real_escape_string($connection, $_POST['timing']) : '';
            $app_duration = isset($_POST['app_duration']) ? mysqli_real_escape_string($connection, $_POST['app_duration']) : '';

            // Check if the user has already booked an appointment with the doctor
            $check = "SELECT * FROM appointments WHERE DoctorID = $DoctorID AND PatientID = $PatientID";
            $Result = mysqli_query($connection, $check);

            if (mysqli_num_rows($Result) > 0) {
                echo'<script>
                Swal.fire({
                    title: "Appointment Booking",
                    text: "You have already booked an appointment with this doctor.",
                    icon: "warning",
                    showCancelButton: false,
                }).then((result) => {
                  
                });
            </script>';
            } else {
                $insert = "INSERT INTO `appointments`(`DoctorID`,  `PatientID`, `p_name`, `day`, `timing`, `app_duration`) 
                           VALUES ('$DoctorID','$PatientID','$p_name','$day','$timing','$app_duration')";

                $result = mysqli_query($connection, $insert);

                if ($result) {
                    echo' <script>alert("failed")</script>';
                } else {
                    echo '<script>
                    Swal.fire({
                        title: "Failed",
                        text: "Failed to add appointment details.",
                        icon: "error"
                    });
                </script>;';
                }
            }
        }
    }
}
?>
<!-- Rest of your HTML code -->

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

</div>

<!-- /Page Content -->










</div>
   </div>
</div>
 </div>
 </div>
</div>
							
										
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