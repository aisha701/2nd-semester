<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();


?>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoice View</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoice View</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="invoice-content">
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-logo">
												<img src="assets/img/logo.png" alt="logo">
											</div>
										</div>
										<div class="col-md-6">
											<p class="invoice-details">
												<strong>Order:</strong> #00124 <br>
												<strong>Issued:</strong> 20/07/2019
											</p>
										</div>
									</div>
								</div>
								<?php
if (isset($_GET['DoctorID'])) {
    $DoctorID = $_GET['DoctorID'];
    $getDoctordata = "SELECT * FROM `appointments` as a 
        INNER JOIN `patients` as p ON a.PatientID = p.PatientID 
        INNER JOIN `doctors` as d ON a.DoctorID = d.DoctorID  
        WHERE a.DoctorID = $DoctorID
        ORDER BY a.AppointmentID DESC";
    $getDoctordata_run = mysqli_query($connection, $getDoctordata) or die("failed");

    if (mysqli_num_rows($getDoctordata_run) > 0) {
        while ($doctor = mysqli_fetch_assoc($getDoctordata_run)) {
            ?>							
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-info">
												<strong class="customer-text">Invoice From</strong>
												<p class="invoice-details invoice-details-two">
												<?php echo $doctor['d_name']?><br>
												<?php echo $doctor['d_city']?>, <?php echo $doctor['d_country']?><br>
												<?php echo $doctor['d_address']?><br>
												</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="invoice-info invoice-info2">
												<strong class="customer-text">Invoice To</strong>
												<p class="invoice-details">
												<?php echo $_SESSION['p_name']?><br>
												<?php echo $_SESSION['p_city']?>, <?php echo $_SESSION['p_country']?><br>
												<?php echo $_SESSION['p_address']?><br>
												</p>
											</div>
										</div>
									</div>
								</div>
								<?php

							}
						}
					}
					?>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-info">
												<strong class="customer-text">Payment Method</strong>
												<p class="invoice-details invoice-details-two">
													Debit Card <br>
													XXXXXXXXXXXX-2541 <br>
													HDFC Bank<br>
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								
								
								<!-- Invoice Information -->
								<div class="other-info">
									<h4>Other information</h4>
									<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
								</div>
								<!-- /Invoice Information -->
								
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<?php 
			
include("./assets/include/footer.php");
?>