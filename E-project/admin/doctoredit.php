
<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
if(isset($_SESSION['role']) && $_SESSION['role'] == "Administrator"){

?>
<style>
    .change-photo-btn {
    background-color: #20c0f3;
    border-radius: 50px;
    color: #fff;
    cursor: pointer;
    display: block;
    font-size: 13px;
    font-weight: 600;
    margin: 0 auto;
    padding: 10px 15px;
    position: relative;
    transition: .3s;
    text-align: center;
    width: 220px;
}
.change-photo-btn input.upload {
	bottom: 0;
    cursor: pointer;
    filter: alpha(opacity=0);
	left: 0;
    margin: 0;
    opacity: 0;
    padding: 0;
    position: absolute;
    right: 0;
    top: 0;
	width: 220px;
}
</style>
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
										<img src='' alt='User Image'>
										</a>
										<div class="profile-det-info">
										<h3></h3>
											
											<div class="patient-details">
												<h5 class="mb-0 "><i class='fas fa-phone'></i>  </h5>
												<h5 class="mb-0 "><i class='fas fa-map-marker-alt'></i> </h5>
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
												<a href="appointments.php">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
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
												<a href="doctor-login.php">
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
<?php

if (isset($_GET['DoctorID'])) {
    $DoctorID = $_GET['DoctorID'];
    $getDoctordata = "SELECT * from doctors WHERE DoctorID = '$DoctorID'; ";
    $getDoctordata_run = mysqli_query($connection, $getDoctordata) or die("failed");

    if (mysqli_num_rows($getDoctordata_run) ) {
        $doctor=mysqli_fetch_assoc($getDoctordata_run);
        $DoctorID=$doctor['DoctorID'];
        $d_name=$doctor['d_name'];
        $d_email=$doctor['d_email'];
        $d_phonenumber=$doctor['d_phonenumber'];
        $speciality=$doctor['speciality'];
        $d_address=$doctor['d_address'];
        $d_city=$doctor['d_city'];
        $d_country=$doctor['d_country'];
			?>		
						<!-- Profile Settings Form -->
						<form action="doctorupdatedata.php?DoctorID=<?=$DoctorID?>"class="form-group" method="post" enctype="multipart/form-data" >
										<div class="row form-row ">
											<div class="col-12 col-md-12 mt-5">
												<div class="form-group">
                                                <div class="change-avatar">
                                                <div class="profile-img mt-5">
                                                <img src="../doctor/assets/img/doctors/<?=$doctor['d_image']?>" class="img-fluid" alt="<?=$doctor['d_image']?>" style="height:150px;" >
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" class="upload" name="image">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>
                                            </div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" name="d_name" value="<?=$doctor['d_name']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<div class="cal-icon">
														<input type="text" class="form-control" name="d_gender" value="<?=$doctor['d_gender']?>">
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control"name="d_email"  value="<?=$doctor['d_email']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Phone Number</label>
													<input type="type" class="form-control"name="d_phonenumber"  value="<?=$doctor['d_phonenumber']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>speciality</label>
													<input type="text" class="form-control"name="speciality"  value=" <?=$doctor['speciality']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
												<label>Address</label>
													<input type="text" class="form-control"name="d_address"  value="<?=$doctor['d_address']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control"name="d_city"  value="<?=$doctor['d_city']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control"name="d_country"  value="<?=$doctor['d_country']?>">
												</div>
											</div>
											
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn"  name="Add">Save Changes</button>
										</div>
                                        <!-- /Profile Settings Form -->
									</form><?php
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
    header("location: login.php");
}
?>