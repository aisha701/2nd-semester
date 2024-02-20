<?php 
include("./assets/database/connection.php");

if(isset($_POST['signin']) && $_SERVER['REQUEST_METHOD']=="POST"){
   $p_email= mysqli_real_escape_string($connection, $_POST['p_email']);
  $p_password= mysqli_real_escape_string($connection, $_POST['p_password']);
   $check="SELECT * FROM patients WHERE p_email='$p_email';";
   $result=mysqli_query($connection , $check) or die("failed to insert query.");
if($result){
if(mysqli_num_rows($result) == 1){
$row=mysqli_fetch_assoc($result);
$regPatientID =$row['PatientID'];
$regp_name=$row['p_name'];
$regp_Email=$row['p_email'];
$regp_Phonenumber=$row['p_phonenumber'];
$regp_Address=$row['p_address'];
$regp_Image=$row['p_image'];
$regp_Age=$row['p_age']; 
$regp_Dob=$row['p_dob'];
$regp_City=$row['p_city'];
$regp_Country=$row['p_country'];
$regp_Pass=$row['p_password'];//hash
$verifyPass=password_verify($p_password, $regp_Pass);
if($verifyPass){
    session_start();
    $_SESSION['PatientID']=$regPatientID;
	$_SESSION['p_name']=$regp_name;
    $_SESSION['p_email']=$regp_Email;
    $_SESSION['p_phonenumber']=$regp_Phonenumber;
    $_SESSION['p_address']=$regp_Address;
    $_SESSION['p_age']=$regp_Age; 
    $_SESSION['p_dob']=$regp_Dob; 
    $_SESSION['p_city']=$regp_City; 
    $_SESSION['p_country']=$regp_Country; 
    $_SESSION['p_image']=$regp_Image;
    
       echo "
	   <script>
		   document.addEventListener('DOMContentLoaded', function() {
			   Swal.fire({
				   title: 'Successfully logged in!',
				   icon: 'success',
				   timer: 3000,
				   showConfirmButton: false
			   }).then(function () {
				   window.location.href = 'index-2.php';
			   });
		   });
	   </script>";  
}else{
    echo "
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			Swal.fire({
				title: 'Invalid Credentials',
				icon: 'error'
			});
		});
	</script>";
}
}
else{
     echo "
	 <script>
		 document.addEventListener('DOMContentLoaded', function() {
			 Swal.fire({
				 title: 'Please signup first',
				 icon: 'info'
			 }).then(function () {
				 window.location.href = 'patient-register.php';
			 });
		 });
	 </script>";
}
}}
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
		
		
		<!-- sweet alert  -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="../index.php" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
							 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->

		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid mt-5">

				<div class="row">
					<div class="col-md-8 offset-md-2">

						<!-- Login Tab Content -->
						<div class="account-content">
							<div class="row align-items-center justify-content-center">
								<div class="col-md-7 col-lg-6 login-left">
									<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
								</div>
								<div class="col-md-12 col-lg-6 login-right">
								<div class="login-header">
										<h3>Patient Profile Login<a href="../doctor/doctor-login.php">Are you a Doctor?</a></h3>
									</div>
									<form action="" method="post">
										<div class="form-group form-focus">
											<input type="email" class="form-control floating" name="p_email">
											<label class="focus-label">Email</label>
										</div>
										<div class="form-group form-focus">
											<input type="password" class="form-control floating" name="p_password">
											<label class="focus-label">Password</label>
										</div>
										<div >
											<a class="forgot-link" href="forgot-password.php">Forgot Password ?</a>
										</div>
										<button class="btn btn-primary btn-block btn-lg login-btn"
											type="submit" name="signin">Login</button>
										
										<div class="text-center dont-have">Don’t have an account? <a
												href="patient-register.php">Register</a></div>
									</form>
								</div>
							</div>
						</div>
						<!-- /Login Tab Content -->

					</div>
				</div>

			</div>

		</div>
		<!-- /Page Content -->

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
		
		
		 <!-- sweet alert -->
		 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>