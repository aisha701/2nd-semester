<?php
include("./assets/database/connection.php");
include("./assets/include/header.php");

session_start();
if(isset( $_SESSION['d_email']) ){ 
	
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
		<div class="main-wrapper">
		
			
		
			<!-- Home Banner -->
			<section class="section section-search my-5 mt-5 ">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center home my-5 ">
							<h2 style="font-size:2.5rem ;">Treat Patients and Manage Appointments</h2>
							<p class="mx-5 ">Effortlessly managing appointments is integral to delivering exceptional patient care. Streamlined scheduling systems and user-friendly interfaces empower healthcare professionals to prioritize their patients. By efficiently navigating appointment schedules, providers can optimize resource allocation, enhancing the overall patient experience. </p>
						</div>
                         
						
					</div>
				</div>
			</section>
			<!-- /Home Banner -->
			  
	
		  
		
		   
		 
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
}else{
    header("location: doctor-login.php");
}
?>