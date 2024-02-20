<?php
require("./assets/database/connection.php");

if (isset($_POST['signin']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $a_email = mysqli_real_escape_string($connection, $_POST['a_email']);
    $a_password = mysqli_real_escape_string($connection, $_POST['a_password']);
    $check = "SELECT * FROM users WHERE a_email='$a_email';";
    $result = mysqli_query($connection, $check) or die("Failed to execute query.");

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $regUserID = $row['UserID'];
            $rega_name = $row['a_name'];
            $rega_email = $row['a_email'];
            $rega_Pass = $row['a_password'];
            $UserID = $row['UserID'];
            $role = $row['UserType'];
            $imgname = $row['a_image'];
            $rega_age = $row['a_age'];
            $rega_city = $row['a_city'];
            $rega_country = $row['a_country'];
            $rega_address = $row['a_address'];
            $rega_phonenumber = $row['a_phonenumber'];
            $verifypass = password_verify($a_password, $rega_Pass);

            if ($verifypass) {
                session_start();
                $_SESSION['UserID'] = $regUserID;
                $_SESSION['a_image'] = $imgname;
                $_SESSION['a_email'] = $rega_email;
                $_SESSION['a_name'] = $rega_name;
                $_SESSION['a_age'] = $rega_age;
                $_SESSION['a_city'] = $rega_city;
                $_SESSION['a_country'] = $rega_country;
                $_SESSION['a_address'] = $rega_address;
                $_SESSION['a_phonenumber'] = $rega_phonenumber;
                $_SESSION['role'] = $role;
                $_SESSION['UserID'] = $UserID;

                echo "
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Successfully logged in!',
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.href = 'index.php';
                        });
                    });
                </script>";
            } else {
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
        } else {
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Account not found',
                        text: 'Please sign up first',
                        icon: 'info'
                    }).then(function () {
                        window.location.href = 'register.php';
                    });
                });
            </script>";
        }
    }
}
?>


 

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Login</title>
		
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
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email" name="a_email" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="password" placeholder="password" name="a_password" required>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit" name="signin">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								
								
								<div class="text-center dont-have"><a href="forgot-password.php">FORGOT PASSWORD</a></div>
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

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>