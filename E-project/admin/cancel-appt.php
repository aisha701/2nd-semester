<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
if(isset($_SESSION['role']) && $_SESSION['role'] == "Administrator"){

?>

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Cancelled Appointments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active"> Cancelled Appointments</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
                                               
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
													<th>Status</th>
													
													
												</tr>
											</thead>
											<tbody>

											<?php 
$appointments = "SELECT * FROM `appointments` AS a 
INNER JOIN `patients` AS p ON a.PatientID = p.PatientID 
INNER JOIN `doctors` AS d ON a.DoctorID = d.DoctorID  
WHERE a.status = 'cancelled'
ORDER BY a.AppointmentID DESC;
";
$appointments_run = mysqli_query($connection, $appointments) or die("failed");

if (mysqli_num_rows($appointments_run) > 0) {
    while ($appointments = mysqli_fetch_assoc($appointments_run)) {
        $AppointmentID = $appointments['AppointmentID'];
		echo'

												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar avatar-sm mr-2">
															<img src="../doctor/assets/img/doctors/' . $appointments["d_image"] . ' " alt="User Image">
															</a>
															<a href="profile.php">Dr.' . $appointments["d_name"] . '</a>
														</h2>
													</td>
													<td>' . $appointments["speciality"] . '</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar avatar-sm mr-2">
															<img src="../patient/assets/img/patients/' . $appointments["p_image"] . ' " alt="User Image">
															</a>
															<a href="profile.php">' . $appointments["p_name"] . '</a>
														</h2>
													</td>
													<td>' . $appointments["day"] . '<span class="text-primary d-block">' . $appointments["app_duration"] . '</span></td>
													
													<td>' . $appointments["Status"] . '</td>
												
													
												</tr>'; }}
												?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
			<?php 
}else{
    header("location: login.php");
}
?>
	