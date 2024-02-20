<?php

include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();
if(isset( $_SESSION['d_email']) ){ 
                // Check if the 'image' key is set in the session
                if (isset($_SESSION['d_image'])) {
                    $imagePath = './assets/img/doctors/' . $_SESSION['d_image'];
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
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb --> 
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
										<img src='<?php echo $imagePath; ?>' alt='User Image'>
										</a>
										<div class="profile-det-info">
										<h3><?php echo $_SESSION['d_name']?></h3>
											
											<div class="patient-details">
												<h5 class="mb-0 "><i class='fas fa-phone'></i>  <?php echo $_SESSION['d_phonenumber']?></h5>
												<h5 class="mb-0 "><i class='fas fa-map-marker-alt'></i> <?php echo $_SESSION['d_city']?>, <?php echo $_SESSION['d_country']?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="doctor-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											
											<li>
												<a href="my-patients.php">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
											<li>
												<a href="schedule-timings.php">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li>
											<li>
												<a href="doctor-profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="doctor-change-password.php">
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
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3>1500</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="65">
																<img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Today Patient</h6>
															<h3>160</h3>
															<p class="text-muted">06, Nov 2019</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
															<h3>85</h3>
															<p class="text-muted">06, Apr 2019</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinments</h4>
									<div class="appointment-tab">
									
										
										
										
										
											
									   
											
											
										
										<?php 
							if($_SESSION['DoctorID']){
								$DoctorID=$_SESSION['DoctorID']; 
								$appointments = "SELECT * FROM `appointments` as a
								INNER JOIN `patients` as p ON a.PatientID=p.PatientID 
								INNER JOIN `doctors` as d ON a.DoctorID=d.DoctorID  
								WHERE a.DoctorID = $DoctorID AND a.status = 'confirmed'	
								ORDER BY a.AppointmentID DESC;";
$appointments_run = mysqli_query($connection, $appointments) or die("failed");

if (mysqli_num_rows($appointments_run) > 0) {
    while ($appointments = mysqli_fetch_assoc($appointments_run)) {
        $AppointmentID = $appointments['AppointmentID'];
		
        echo ' 
            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="../patient/assets/img/patients/' . $appointments["p_image"] . ' " alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">' . $appointments["p_name"] . '</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i>' . $appointments["timing"] . ' (' .  $appointments["app_duration"]  . ')</h5>
                            <h5><i class="far fa-calendar"></i>' . $appointments["day"] . '</h5>
                            <h5><i class="fas fa-phone"></i>' . $appointments["p_phonenumber"] . '</h5>
                            <h5><i class="fas fa-map-marker-alt"></i>' . $appointments["p_city"] . ', ' . $appointments["p_country"] . '</h5>
                            
                        </div>
                    </div>
                </div>
               
            </div>';
    }
    echo '</tbody>';
}}
?>
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
				header("location: doctor-login.php");
			}
include("./assets/include/footer.php");

?>