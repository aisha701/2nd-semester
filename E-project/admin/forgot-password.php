
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include("./assets/database/connection.php");




	?>
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
		
		
		<!-- sweet alert  -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
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
			
			
		
		function sendRecoveryLink($a_token, $a_email,$a_name){
			//Load Composer's autoloader
			require './vendor/autoload.php';
			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);
			try {
				$mail->isSMTP();                               //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'aisha.aptech701@gmail.com';                     //SMTP username
				$mail->Password   = 'drzz gzow ycbk pclc';                               //SMTP password
				$mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
				$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = 
				//Recipients 
				$mail->setFrom('aisha.aptech701@gmail.com', 'DOCCURE');
				$mail->addAddress($a_email, $a_name);     //Add a recipient
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'PASSWORD RECOVERY REQUEST';
				$mail->Body    = 'A request has been generated to change your password. Please <b><a href="http://localhost:82/care/admin/resetpass.php?a_token='.$a_token.'&a_email='.$a_email.'">Click here</a></b> to reset your password.';
			
				$mail->send();
				echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
					Swal.fire({
						title: "Email sent",
						text: "Email has been sent to '.$a_email.'. Please check your inbox.",
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
		   $a_email= mysqli_real_escape_string($connection, $_POST['recoveryemail']);
		   $a_token=md5(rand());
		
		   $check="SELECT * FROM users WHERE a_email='$a_email';";
		   $result=mysqli_query($connection , $check) or die("failed to insert query.");
		
		if($result){
		if(mysqli_num_rows($result) > 0){
		$row=mysqli_fetch_assoc($result);
		$a_name=$row['a_name'];
		
		$updatetoken="UPDATE `users` SET `a_token`='$a_token' WHERE a_email='$a_email'; ";
		$updatetoken_run=mysqli_query($connection, $updatetoken) or die("faile to execute");
		if($updatetoken_run){
			sendRecoveryLink($a_token, $a_email,$a_name);
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
                    })
                });
             </script>';
		}
		}}
			
			
			?>

                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Forgot Password?</h1>
								<p class="account-subtitle">Enter your email to get a password reset link</p>
								
								<!-- Form -->
								<form action="" method="POST">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email" name="recoveryemail">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit" name="sendlink">Reset Password</button>
									</div>
								</form>
								<!-- /Form -->
								
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
		
		
		<!-- sweet alert -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/forgot-password.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
</html>
