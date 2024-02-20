<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();
if(isset( $_SESSION['p_email']) ){
	
?>
	
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/  30 Nov 2019 04:11:34 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>
		
		<!-- Favicons -->
		<link type="image/x-icon" href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper ">
		
			
			
			<!-- Home Banner -->
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center" >
							<h1>Search Doctor, Make an Appointment</h1>
							<p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
						</div>
                         
						
						
					</div>
				</div>
			</section>
			<!-- /Home Banner -->
			  

		  


			
			
			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header ">
								<h2>Book Our Doctor</h2>
								<p>Lorem Ipsum is simply dummy text </p>
							</div>
							<div class="about-content">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
								<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
							
							</div>
						</div>
						<div class="col-lg-8">
							<div class="doctor-slider slider">
					
<?php
$getDoctordata="SELECT * from doctors";
$getDoctordata_run=mysqli_query($connection, $getDoctordata) or die("failed");
if(mysqli_num_rows($getDoctordata_run) > 0){while($doctordata=mysqli_fetch_assoc($getDoctordata_run)){
	$DoctorID=$doctordata['DoctorID'];
	?>							

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.php?DoctorID=<?=$DoctorID?>">
											<img src="../doctor/assets/img/doctors/<?=$doctordata['d_image']?>" class="img-fluid" alt="<?=$doctordata['d_image']?>" >
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.php">Dr. <?=$doctordata['d_name']?></a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality"> <?=$doctordata['speciality']?></p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(49)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i>  <?=$doctordata['d_city']?>, <?=$doctordata['d_country']?>
</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $400 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.php?DoctorID=<?=$DoctorID?>" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="book-appointment.php?DoctorID=<?=$DoctorID?>" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- Doctor Widget -->
								
								<?php
							}
							}
							?>				
							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->
		   
		   
			
			
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slick JS -->
		<script src="assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>
<?php 
include("./assets/include/footer.php");
}else{
    header("location: patient-login.php");
}
?>