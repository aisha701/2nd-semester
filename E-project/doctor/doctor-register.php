<?php 
include("./assets/database/connection.php");
session_start(); // Start session at the beginning of the script

if (isset($_POST['signup'])) {
    //prevent sql injection real escape string
    $d_name = mysqli_real_escape_string($connection, $_POST['d_name']);
    $d_email = mysqli_real_escape_string($connection, $_POST['d_email']);
    $d_password = mysqli_real_escape_string($connection, $_POST['d_password']);

    $encrypedPassword = password_hash($d_password, PASSWORD_BCRYPT);

    $check = "SELECT * FROM doctors WHERE d_email='$d_email';";
    $res = mysqli_query($connection, $check) or die("failed");

    if (mysqli_num_rows($res) > 0) {
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Already registered',
                    text: 'Please Login Now!',
                    icon: 'info'
                }).then(function () {
                    window.location.href='doctor-login.php';
                });
            });
        </script>";
    } else {
        $insert = "INSERT INTO `doctors`(`d_name`, `d_email`, `d_Password`) VALUES ('$d_name','$d_email','$encrypedPassword');";
        $result = mysqli_query($connection, $insert) or die("failed to insert query.");

        if ($result) {
            $_SESSION['DoctorID'] = mysqli_insert_id($connection);
            $_SESSION['d_email'] = $d_email;
            $_SESSION['d_name'] = $d_name;

            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Account Successfully Created',
                        icon: 'success',
                        timer: 3000,
                        showConfirmButton: false
                    }).then(function () {
                        window.location.href='doctor-details.php';
                    });
                });
            </script>";
        } else {
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Failed to Create your account',
                        icon: 'error'
                    });
                });
            </script>";
        }
    }
}
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
							<a href="index-2.php" class="menu-logo">
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
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Doctor Register <a href="../patient/patient-register.php">Not a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form action="" method="post">
									
												
												
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="d_name">
												<label class="focus-label">Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="email" class="form-control floating"name="d_email">
												<label class="focus-label" >email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating"name="d_password">
												<label class="focus-label" >Create Password</label>
											</div>
											<div>
												<a class="forgot-link" href="doctor-login.php">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="signup">Signup</button>
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
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