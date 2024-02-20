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
								<h3 class="page-title">List of Patient</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Patient</li>
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
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													
													<th class="text-center">Patient Name</th>
													<th class="text-center">Age</th>
													<th class="text-center">Address</th>
													<th class="text-center">Gender</th>
													<th class="text-center">Phone</th>
													<th class="text-center">Lives In</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php 
$patients = "SELECT * FROM `patients` ";
$patients_run = mysqli_query($connection, $patients) or die("failed");

if (mysqli_num_rows($patients_run) > 0) {
while ($patients_data = mysqli_fetch_assoc($patients_run)) {
$PatientID = $patients_data['PatientID'];
	?>
												<tr class="text-capitalize">
													
													<td>
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../patient/assets/img/patients/<?=$patients_data['p_image']?>" alt="<?=$patients_data['p_image']?>" ></a>
															<a href="profile.php"><?=$patients_data['p_name']?></a>
														</h2>
													</td>
													<td class="text-center"><?=$patients_data['p_age']?> years</td>
													<td class="text-center"><?=$patients_data['p_address']?></td>
													<td class="text-center"><?=$patients_data['p_gender']?></td>
													<td class="text-center"><?=$patients_data['p_phonenumber']?></td>
													<td class="text-center"><?=$patients_data['p_city']?>, <?=$patients_data['p_country']?></td>
													<td class="text-center"><a class="btn badge badge-pill btn-danger text-light" href="patientedit.php?PatientID=<?=$PatientID?>">&nbsp;&nbsp;Edit &nbsp;&nbsp;</a><br>
													<a class="btn badge badge-pill btn-success text-light" href="patientdatadelete.php?PatientID=<?=$PatientID?>"> Delete</a></td>
													
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
			</div>
			<!-- /Page Wrapper -->
		
			<?php 
}else{
    header("location: login.php");
}
?>