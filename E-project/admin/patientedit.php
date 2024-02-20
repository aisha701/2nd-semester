
<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
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
												<a href="patient-dashboard.php">
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
												<a href="patient-profile-settings.php">
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
												<a href="patient-login.php">
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

if (isset($_GET['PatientID'])) {
    $PatientID = $_GET['PatientID'];
    $getPatientdata = "SELECT * from patients WHERE PatientID = '$PatientID'; ";
    $getPatientdata_run = mysqli_query($connection, $getPatientdata) or die("failed");

    if (mysqli_num_rows($getPatientdata_run) ) {
        $patient=mysqli_fetch_assoc($getPatientdata_run);
        $PatientID=$patient['PatientID'];
        $p_name=$patient['p_name'];
        $p_email=$patient['p_email'];
        $p_phonenumber=$patient['p_phonenumber'];
        $p_age=$patient['p_age'];
        $p_dob=$patient['p_dob'];
        $p_gender=$patient['p_gender'];
        $p_address=$patient['p_address'];
        $p_city=$patient['p_city'];
        $p_country=$patient['p_country'];
			?>		
						<!-- Profile Settings Form -->
						<form action="patientupdatedata.php?PatientID=<?=$PatientID?>"class="form-group" method="post" enctype="multipart/form-data" >
										<div class="row form-row ">
											<div class="col-12 col-md-12 mt-5">
												<div class="form-group">
                                                <div class="change-avatar">
                                                <div class="profile-img mt-5" >
                                                <img src="../patient/assets/img/patients/<?=$patient['p_image']?>"  class="img-fluid" alt="<?=$patient['p_image']?>"style="height:150px;" >
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
													<input type="text" class="form-control" name="p_name" value="<?=$patient['p_name']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<div class="cal-icon">
														<input type="text" class="form-control" name="p_gender" value="<?=$patient['p_gender']?>">
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control"name="p_email"  value="<?=$patient['p_email']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Phone Number</label>
													<input type="type" class="form-control"name="p_phonenumber"  value="<?=$patient['p_phonenumber']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>age</label>
													<input type="text" class="form-control"name="p_age"  value=" <?=$patient['p_age']?>">
												</div>
											</div>
                                            <div class="col-12 col-md-6">
												<div class="form-group">
													<label>D.O.B</label>
													<input type="text" class="form-control"name="p_dob"  value=" <?=$patient['p_dob']?>">
												</div>
											</div>
                                            <div class="col-12 col-md-6">
												<div class="form-group">
													<label>gender</label>
													<input type="text" class="form-control"name="p_gender"  value=" <?=$patient['p_gender']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
												<label>Address</label>
													<input type="text" class="form-control"name="p_address"  value="<?=$patient['p_address']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control"name="p_city"  value="<?=$patient['p_city']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control"name="p_country"  value="<?=$patient['p_country']?>">
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