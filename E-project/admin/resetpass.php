
<?php
include("./assets/include/header.php");

include("./assets/database/connection.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/forgot-password.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Forgot Password</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                        </div>
						<?php
			if(isset($_POST['resetpass']) && $_SERVER['REQUEST_METHOD']=="POST"){
                $a_password= mysqli_real_escape_string($connection, $_POST['a_password']);
                $a_cpassword= mysqli_real_escape_string($connection, $_POST['a_cpassword']);
                
                if(isset($_GET['a_token'])){
                  $a_token=$_GET['a_token'];
                }else{
                  $a_token="";
                }
                if(isset($_GET['a_email'])){
                  $a_email=$_GET['a_email'];
                }else{
                  $a_email="";
                }
              
                 $check="SELECT * FROM users WHERE a_email='$a_email' AND a_token='$a_token';";
                 $result=mysqli_query($connection , $check) or die("failed to insert query.");
              
              if(mysqli_num_rows($result) > 0){
              $row=mysqli_fetch_assoc($result);
              if(!$a_password=="" && !$a_cpassword=="" && $a_password==$a_cpassword){
                  $a_newtoken=md5(rand());
                  $a_hashpass=password_hash($a_password,PASSWORD_BCRYPT);
              
              
              $updatePass="UPDATE `users` SET `a_password`='$a_hashpass',`a_token`='$a_newtoken' WHERE  a_email='$a_email' ;";
              $updatePass_run=mysqli_query($connection , $updatePass) or die("failed to insert query.");
              if($updatePass_run){
               echo '
			   <script>
				   document.addEventListener("DOMContentLoaded", function() {
					   Swal.fire({
						   title: "Password Updated",
						   text: "Your password has been updated. You can now login with your new password.",
						   icon: "success"
					   }).then(function () {
						   window.location.href="patient-login.php";
					   });
				   });
			   </script>';
              }
              else{
                  echo'
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
              }
              else{
                  echo'
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
              }
              else{
                   echo '
				   <script>
					   document.addEventListener("DOMContentLoaded", function() {
						   Swal.fire({
							   title: "Invalid Token",
							   text: "Invalid token.",
							   icon: "info"
						   }).then(function () {
							   window.location.href="newpass.php";
						   });
					   });
				   </script>';     
              }
              }
              ?>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Change Password</h1>

								<!-- Forgot Password Form -->
								<form action="" method="POST">
											<div class="form-group form-focus">
												<input type="password" name="a_password" class="form-control floating">
												<label class="focus-label">New password</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="a_cpassword" class="form-control floating">
												<label class="focus-label">Confirm new password</label>
											</div>
										
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="resetpass">Reset Password</button>
										</form>
										<!-- /Forgot Password Form -->
								
								<div class="text-center dont-have">Remember your password? <a href="login.php">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/forgot-password.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
</html>