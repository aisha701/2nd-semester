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

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			
			
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
											<li>
												<a href="patient-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li  class="active" class="">
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
						
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">My Bookings</a>
											</li>
											
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
								
									
									<?php 
$PatientID = $_SESSION['PatientID'];
$getDoctordata = "SELECT * FROM `appointments` as a
INNER JOIN `patients` as p ON a.PatientID=p.PatientID 
INNER JOIN `doctors` as d ON a.DoctorID=d.DoctorID  
WHERE a.PatientID = $PatientID AND a.status = 'confirmed'	
ORDER BY a.AppointmentID DESC;";
$getDoctordata_run = mysqli_query($connection, $getDoctordata) or die("failed");
?>
    
<!-- Appointment Tab -->
<div id="pat_appointments" class="tab-pane fade show active">
    <div class="card card-table mb-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Appt Day</th>
                            <th>Status</th>
                            <th>Appt Duration</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (mysqli_num_rows($getDoctordata_run) > 0) {
                        while ($doctor = mysqli_fetch_assoc($getDoctordata_run)) {
							$DoctorID=$doctor['DoctorID'];
                    ?>      
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                        <img src="../doctor/assets/img/doctors/<?=$doctor['d_image']?>" class="img-fluid" alt="<?=$doctor['d_image']?>">
                                    </a>
                                    <a href="doctor-profile.html">Dr. <?=$doctor['d_name']?><span><?=$doctor['speciality']?></span></a>
                                </h2>
                            </td>
                            <td><?=$doctor['day']?> <span class="d-block text-info"><?=$doctor['timing']?></span></td>

                            <td><?=$doctor['Status']?></td>
                            <td><?=$doctor['app_duration']?></td>
                            <td><a href="invoice-view.php?DoctorID=<?=$DoctorID?>"><span  class="badge badge-pill bg-success-light">View Invoice</span></a></td>
                            <td class="text-right"></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
								
										<!-- /Appointment Tab -->
									</div>
									<!-- Tab Content -->
									
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