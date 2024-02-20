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
											<li class="active">
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
						<?php
if (isset($_SESSION['DoctorID']) && isset($_POST['add'])) {
    $DoctorID = (int)$_SESSION['DoctorID'];
    $timing = isset($_POST['timing']) ? mysqli_real_escape_string($connection, $_POST['timing']) : '';
    $availabilityday = isset($_POST['availabilityday']) ? mysqli_real_escape_string($connection, $_POST['availabilityday']) : '';
    $timingslotduration = isset($_POST['timingslotduration']) ? mysqli_real_escape_string($connection, $_POST['timingslotduration']) : '';
if (empty($timing) || empty($availabilityday) || empty($timingslotduration)) {
        echo  '<script>
		// Use SweetAlert for displaying a message
		Swal.fire({
			title: "Validation Error",
			text: "Please fill in all required fields.",
			icon: "error"
		});
	</script>';
    } else {
        $check = "SELECT * FROM doctoravailability WHERE DoctorID='$DoctorID';";
        $result_check = mysqli_query($connection, $check);
        if (mysqli_num_rows($result_check) > 0) {
			
			echo '<script>
				// Use SweetAlert for a more visually appealing confirmation
				Swal.fire({
					title: "You already have a schedule.",
					text: "Do you want to update it?",
					icon: "question",
					showCancelButton: true,
					confirmButtonText: "Yes, update it!",
					cancelButtonText: "No, cancel!",
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {
						// User clicked "Yes", redirect to the update_schedule.php;
						window.location.href = "update_schedule.php?DoctorID=' . $DoctorID . '&timing=' . $timing . '&availabilityday=' . $availabilityday . '&timingslotduration=' . $timingslotduration . '";
					} else {
						// User clicked "No", display a SweetAlert message
						Swal.fire("Cancelled", "Schedule not updated.", "error");
					}
				});
			</script>';
			
			
        } else {
            $insert = "INSERT INTO doctoravailability (DoctorID, timing, availabilityday, timingslotduration) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($connection, $insert);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'isss', $DoctorID, $timing, $availabilityday, $timingslotduration);
                $result = mysqli_stmt_execute($stmt);
                if ($result) {
                    echo  '<script>
    // Use SweetAlert for displaying a message
    Swal.fire({
        title:"Successfully added",
        text: "New schedule added",
        icon: "success"
    });
</script>';
                } else {
                    echo "<script>alert('Insert error: " . mysqli_stmt_error($stmt) . "');</script>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Insert error: " . mysqli_error($connection) . "');</script>";
            }
        }}}
?>


						<div class="col-md- col-lg-8 col-xl-9">
						 
							
								<div class="col-sm-12">
									
									<div class="card ">
										<div class="card-body ">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
								

                                          <form action=""  method="post">
													<div class="col-lg-6">
														<div class="form-group">               
															<label>Timing </label>
															<select class="select form-control " name="timing" >
																<option>-</option>
																<option>8:00 PM</option>
																<option >9:00 PM</option>  
																<option>8:00 AM</option>
																<option>9:00 AM</option>
															</select>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">               
															<label>Availability Day</label>
															<select class="select form-control" name="availabilityday">
																<option>-</option>
																<option>Monday</option>
																<option>Tuesday</option>  
																<option>Wednesday</option>
																<option>Thursday</option>
																<option>Friday</option>
															</select>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">               
															<label>Timing Slot Duration</label>
															<select class="select form-control" name="timingslotduration">
																<option>-</option>
																<option>15 mins</option>
																<option >30 mins</option>  
																<option>45 mins</option>
																<option>1 Hour</option>
															</select>
														</div>
													</div>	</div>     
												<button class="btn btn-outline-primary d-flex justify-content-between  " type="submit" name="add">Submit</button>
			                                 </form>
											
											 
											</div>
											<div class="col-lg-10">
											<?php
if (isset($_SESSION['DoctorID'])) {
    $DoctorID = (int)$_SESSION['DoctorID']; 

    $getschedule = "SELECT * FROM `doctoravailability` WHERE DoctorID = $DoctorID";
    
    $getschedule_run = mysqli_query($connection, $getschedule);
    if ($getschedule_run) {
        if (mysqli_num_rows($getschedule_run) > 0) {
            $doctordata = mysqli_fetch_assoc($getschedule_run);

            
            echo '
            
                <div class="col-lg-6">
                    <p><i>Selected Timing</i> : <b>' . $doctordata['timing'] . '</b></p>
                </div>
                <div class="col-lg-6">
                    <p><i>Selected Availability Day</i> :<b> ' . $doctordata['availabilityday'] . '</b></p>
                </div>
                <div class="col-lg-6">
                    <p><i>Selected Timing Slot Duration</i> : <b>' . $doctordata['Timingslotduration'] . '</b></p>
                </div>
            ';
        } 
    } 
} 
?>

</div>							</div>
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