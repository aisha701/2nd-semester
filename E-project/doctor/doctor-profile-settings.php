<?php
include("./assets/include/header.php");
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
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
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
											<li class="active">
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
						
						<!-- Profile Settings Form -->
						<form action="updatedata.php" class="form-group" method="post" enctype="multipart/form-data">
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
														<img src="<?php echo $imagePath;?>" alt="User Image"   >
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="d_image">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" name="d_name" value="<?php echo $_SESSION['d_name']?>">
												</div>
											</div>
											
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control"name="d_email"  value="<?php echo $_SESSION['d_email']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Phone Number</label>
													<input type="type" class="form-control"name="d_phonenumber"  value="<?php echo $_SESSION['d_phonenumber']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>speciality</label>
													<input type="text" class="form-control"name="speciality"  value=" <?php echo $_SESSION['speciality']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
												<label>Address</label>
													<input type="text" class="form-control"name="d_address"  value="<?php echo $_SESSION['d_address']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control"name="d_city"  value="<?php echo $_SESSION['d_city']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control"name="d_country"  value=" <?php echo $_SESSION['d_country']?>">
												</div>
											</div>
											
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn"  name="Add">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->

							
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