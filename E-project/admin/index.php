<?php 
include("./assets/database/connection.php");
include("./assets/include/header.php");

if(isset($_SESSION['role']) && $_SESSION['role'] == "Administrator"){
	include("./assets/include/header.php");
?>


			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					
					<div class="row">
						<div class="col-md-12 col-lg-6">
						
							
							
						</div>	
					</div>
					<div class="row">
						<div class="col-md-6 d-flex">
						
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Doctors List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
												
													<th>City</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
$getDoctordata="SELECT * from doctors";
$getDoctordata_run=mysqli_query($connection, $getDoctordata) or die("failed");
if(mysqli_num_rows($getDoctordata_run) > 0){
	while($doctordata=mysqli_fetch_assoc($getDoctordata_run)){
	$DoctorID=$doctordata['DoctorID'];
	?>


												<tr class="text-capitalize">
													<td>
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar avatar-sm mr-2">
															<img src="../doctor/assets/img/doctors/<?=$doctordata['d_image']?>" class="img-fluid" alt="<?=$doctordata['d_image']?>" >
															</a>
															<a href="profile.php">Dr.<?=$doctordata['d_name']?></a>
														</h2>
													</td>
													<td ><?=$doctordata['speciality']?></td>
													
													<td><?=$doctordata['d_city']?></td>
													<td><a class="btn badge badge-pill btn-success text-light my-1" href="doctoredit.php?DoctorID=<?=$DoctorID?>">&nbsp;&nbsp;Edit &nbsp;&nbsp;</a><br>
												<a class="btn badge badge-pill btn-danger text-light" href="doctordatadelete.php?DoctorID=<?=$DoctorID?>"> Delete</a></td>
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
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card  card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Patients List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>													
													<th>Patient Name</th>
													<th>Phone</th>
													<th>Gender</th>													
													<th>Actions</th>													
												</tr>
											</thead>
											<tbody>
											<?php
$getpatientdata="SELECT * from patients";
$getpatientdata_run=mysqli_query($connection, $getpatientdata) or die("failed");
if(mysqli_num_rows($getpatientdata_run) > 0){
	while($patientdata=mysqli_fetch_assoc($getpatientdata_run)){
	$PatientID=$patientdata['PatientID'];
	?>

												<tr class="text-capitalize">
													<td>
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar avatar-sm mr-2">
															<img src="../patient/assets/img/patients/<?=$patientdata['p_image']?>" class="img-fluid" alt="<?=$patientdata['p_image']?>" >
															</a>
															<a href="profile.php"><?=$patientdata['p_name']?> </a>
														</h2>
													</td>
													<td><?=$patientdata['p_phonenumber']?></td>
													<td class="text-right"><?=$patientdata['p_gender']?></td>
													<td><a class=" my-1 btn badge badge-pill btn-success text-light" href="patientedit.php?PatientID=<?=$PatientID?>">&nbsp;&nbsp;Edit &nbsp;&nbsp;</a><br>
													<a class="btn badge badge-pill btn-danger text-light" href="patientdatadelete.php?PatientID=<?=$PatientID?>"> Delete</a></td>
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
							<!-- /Feed Activity -->
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						
							
							
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