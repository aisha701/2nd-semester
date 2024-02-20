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
									<li class="breadcrumb-item active" aria-current="page">My Patients</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">My Patients</h2>
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
											<li >
												<a href="doctor-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
									
											<li class="active">
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
						
							<div class="row row-grid">
								
		<?php
		if($_SESSION['DoctorID']){
			$DoctorID=$_SESSION['DoctorID']; 
$mypatients = "SELECT * FROM `appointments` as a
INNER JOIN `patients` as p ON a.PatientID=p.PatientID 
INNER JOIN `doctors` as d ON a.DoctorID=d.DoctorID  
WHERE a.DoctorID = $DoctorID
ORDER BY a.AppointmentID DESC;";
$mypatients_run=mysqli_query($connection, $mypatients) or die("failed");
if(mysqli_num_rows($mypatients_run) > 0){
	while($mypatients=mysqli_fetch_assoc($mypatients_run)){
		$DoctorID=$mypatients['DoctorID'];						
		echo'				
		<div class="col-md-6 col-lg-4 col-xl-3">
			<div class="card widget-profile pat-widget-profile">
			    <div class="card-body">
				    <div class="pro-widget-content">
					    <div class="profile-info-widget">
						    <a href="patient-profile.html" class="booking-doc-img"><img src="assets/img/patients/' . $mypatients["p_image"] . '" alt="User Image"></a>
								<div class="profile-det-info">
									<h3><a href="patient-profile.html">'. $mypatients["p_name"] .'</a></h3>
										<div class="patient-details">
											<h5><b>Patient ID :</b>' . $mypatients["PatientID"] . '</h5>
									        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>' . $mypatients["p_city"] . ',' . $mypatients["p_country"] . '</h5>
										</div>
							    </div>
				        </div>
					</div>
						<div class="patient-info">
							<ul>
								<li>Phone <span>' . $mypatients["p_phonenumber"] . '</span></li>
								<li>Age <span>' . $mypatients["p_age"] . ', ' . $mypatients["p_gender"] . '</span></li>
							</ul>
					        </div>
					</div>
				</div>
			</div>';
	}}}?>		
								
								
								
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