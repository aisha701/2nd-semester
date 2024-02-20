<?php

include("./assets/database/connection.php");?>
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
						<?php
if (isset($_POST['resetpass']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $d_password = mysqli_real_escape_string($connection, $_POST['d_password']);
    $d_cpassword = mysqli_real_escape_string($connection, $_POST['d_cpassword']);

    if (isset($_GET['d_token'])) {
        $d_token = $_GET['d_token'];
    } else {
        $d_token = "";
    }
    if (isset($_GET['d_email'])) {
        $d_email = $_GET['d_email'];
    } else {
        $d_email = "";
    }

    $check = "SELECT * FROM doctors WHERE d_email='$d_email' AND d_token='$d_token';";
    $result = mysqli_query($connection, $check) or die("failed to insert query.");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (!$d_password == "" && !$d_cpassword == "" && $d_password == $d_cpassword) {
            $d_newtoken = md5(rand());
            $d_hashpass = password_hash($d_password, PASSWORD_BCRYPT);

            $updatePass = "UPDATE `doctors` SET `d_password`='$d_hashpass',`d_token`='$d_newtoken' WHERE  d_email='$d_email' ;";
            $updatePass_run = mysqli_query($connection, $updatePass) or die("failed to insert query.");

            if ($updatePass_run) {
                echo '
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "Password Updated",
                            text: "Your password has been updated. You can now login with your new password.",
                            icon: "success"
                        }).then(function () {
                            window.location.href="doctor-login.php";
                        });
                    });
                </script>';
            } else {
                echo '
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "Error",
                            text: "Something went wrong. Please try again later.",
                            icon: "error"
                        });
                    });
                </script>';
            }
        } else {
            echo '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Invalid Passwords",
                        text: "Passwords should match and must not be empty.",
                        icon: "warning"
                    });
                });
            </script>';
        }
    } else {
        echo '
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Invalid Token",
                    text: "Invalid token.",
                    icon: "info"
                }).then(function () {
                    window.location.href="doctor-login.php";
                });
            });
        </script>';
    }
}
?>


			
		
			
			
					
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Forgot Password?</h3>
											<p class="small text-muted">Enter your email to get a password reset link</p>
										</div>
										
										<!-- Forgot Password Form -->
										<form action="" method="post">
											<div class="form-group form-focus">
												<input type="password" name="d_password" class="form-control floating">
												<label class="focus-label">New password</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="d_cpassword" class="form-control floating">
												<label class="focus-label">Confirm new password</label>
											</div>
											<div >
												<a class="forgot-link" href="doctor-login.php">Remember your password?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="resetpass">Reset Password</button>
										</form>
										<!-- /Forgot Password Form -->
										
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