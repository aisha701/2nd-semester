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
			
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\SMTP;
			use PHPMailer\PHPMailer\Exception;
		
		function sendRecoveryLink($p_token, $p_email,$p_name){
			//Load Composer's autoloader 
			require './vendor/autoload.php';
			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);
			try {
				$mail->isSMTP();                               //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'aisha.aptech701@gmail.com';                     //SMTP username
				$mail->Password   = 'blme xhnw zdrp zmiu';                               //SMTP password
				$mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
				$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = 
				//Recipients
				$mail->setFrom('aisha.aptech701@gmail.com', 'DOCCURE');
				$mail->addAddress($p_email, $p_name);     //Add a recipient
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'PASSWORD RECOVERY REQUEST';
				$mail->Body    = 'A request has been generated to change your password. Please <b><a href="http://localhost:82/care/patient/resetpass.php?p_token='.$p_token.'&p_email='.$p_email.'">Click here</a></b> to reset your password.';
			
				$mail->send();
				echo'
				<script>
					document.addEventListener("DOMContentLoaded", function() {
						Swal.fire({
							title: "Email sent",
							text: "Email has been sent to '.$p_email.'. Please check your inbox.",
							icon: "success"
						});
					});
				</script>';
			} catch (Exception $e) {
				echo '
				<script>
					document.addEventListener("DOMContentLoaded", function() {
						Swal.fire({
							title: "Error",
							text: "Message could not be sent. Mailer Error: '.$mail->ErrorInfo.'",
							icon: "error"
						});
					});
				</script>';
			}
		
		}
		
		if(isset($_POST['sendlink']) && $_SERVER['REQUEST_METHOD']=="POST"){
		   $p_email= mysqli_real_escape_string($connection, $_POST['recoveryemail']);
		   $p_token=md5(rand());
		
		   $check="SELECT * FROM patients WHERE p_email='$p_email';";
		   $result=mysqli_query($connection , $check) or die("failed to insert query.");
		
		if($result){
		if(mysqli_num_rows($result) > 0){
		$row=mysqli_fetch_assoc($result);
		$p_name=$row['p_name'];
		
		$updatetoken="UPDATE `patients` SET `p_token`='$p_token' WHERE p_email='$p_email'; ";
		$updatetoken_run=mysqli_query($connection, $updatetoken) or die("faile to execute");
		if($updatetoken_run){
			sendRecoveryLink($p_token, $p_email,$p_name);
		}
		}
		else{
			 echo '
             <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Account not found",
                        text: "You don\'t have an account",
                        icon: "info"
                    }).then(function () {
                        window.location.href="doctor-register.php";
                    });
                });
             </script>';
		}
		}}
			
			
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
										<form action="" method="POST">
											<div class="form-group form-focus">
												<input type="email" name="recoveryemail" class="form-control floating">
												<label class="focus-label">Email</label>
											</div>
											<div >
												<a class="forgot-link" href="patient-login.php">Remember your password?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="sendlink">Reset Password</button>
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