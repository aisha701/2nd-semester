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
								<h3 class="page-title">List of Doctors</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Doctor</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th class="text-center">Doctor Name</th>
													<th class="text-center">Country</th>
													<th class="text-center">Phone number</th>
													<th class="text-center">Speciality</th>
													<th class="text-center">Availbillity day</th>
													<th class="text-center">Time Availability</th>
													<th class="text-center">Action</th>
													
												</tr>
											</thead>
											<tbody>
											<?php 
$doctoravailability = "SELECT * FROM `doctors` as d
INNER JOIN `doctoravailability` as a ON d.DoctorID=a.DoctorID 
ORDER BY d.DoctorID DESC;";

$doctoravailability_run = mysqli_query($connection, $doctoravailability) or die("failed");

if (mysqli_num_rows($doctoravailability_run) > 0) {
while ($doctor_data = mysqli_fetch_assoc($doctoravailability_run)) {
$DoctorID = $doctor_data['DoctorID'];
	?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar avatar-sm mr-2">
																<img class="avatar-img rounded-circle" src="../doctor/assets/img/doctors/<?=$doctor_data['d_image']?>" alt="<?=$doctor_data['d_image']?>" ></a>
															<a href="profile.php">Dr. <?=$doctor_data['d_name']?> </a>
														</h2>
													</td>
													<td class="text-center"><?=$doctor_data['d_country']?></td>
													<td class="text-center"><?=$doctor_data['d_phonenumber']?></td>
													<td class="text-center"><?=$doctor_data['speciality']?></td>
													<td class="text-center"><?=$doctor_data['availabilityday']?></td>
													<td class="text-center"><?=$doctor_data['timing']?></td>
													<td class="text-center"><a class="btn badge badge-pill btn-success text-light" href="doctoredit.php?DoctorID=<?=$DoctorID?>">&nbsp;&nbsp;Edit &nbsp;&nbsp;</a><br>
													<a  class="btn badge badge-pill btn-danger text-light" href="doctordatadelete.php?DoctorID=<?=$DoctorID?>"> Delete</a></</td>

													
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
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			<?php 
}else{
    header("location: login.php");
}
?>
       