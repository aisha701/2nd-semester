<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();
if(isset( $_SESSION['d_email']) ){ 
                // Check if the 'image' key is set in the session
                if (isset($_SESSION['d_image'])) {
                    $imagePath = './assets/img/doctors/' . $_SESSION['d_image'];
                     "<img src='$imagePath' alt='User Image'>";
                } else {
                     "<img src='./assets/img/default-image.png' alt='Default Image'>";
                }

				



                ?>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
								
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
										<img src='<?php echo $imagePath; ?>' alt='User Image'>
										</a>
										<div class="profile-det-info">
										<h3><?php echo $_SESSION['d_name']?></h3>
											
											<div class="patient-details">
												<h5 class="mb-0 "><i class='fas fa-phone'></i>  <?php echo $_SESSION['d_phonenumber']?></h5>
												<h5 class="mb-0 "><i class='fas fa-map-marker-alt'></i> <?php echo $_SESSION['d_city']?>, <?php echo $_SESSION['d_country']?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li >
												<a href="doctor-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											
											<li>
												<a href="my-patients.php">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
											<li>
												<a href="schedule-timings.php">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li>
											<li>
												<a href="doctor-profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li class="active">
												<a href="doctor-change-password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="logout.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">


										<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['changepass'])) {
    $d_password = isset($_POST['d_password']) ? mysqli_real_escape_string($connection, $_POST['d_password']) : '';
    $d_cpassword = isset($_POST['d_cpassword']) ? mysqli_real_escape_string($connection, $_POST['d_cpassword']) : '';
    $d_email = isset($_SESSION['d_email']) ? $_SESSION['d_email'] : '';
    if (!empty($d_password) && !empty($d_cpassword) && ($d_password == $d_cpassword)) {
        if (strlen($d_password) < 3) {
            echo '<script>
                Swal.fire({
                    title: "Password Length",
                    text: "Password should be at least 3 characters long.",
                    icon: "warning"
                });
            </script>';
        } else {
            $d_hashpass = password_hash($d_password, PASSWORD_BCRYPT);
            $updatePass = "UPDATE `doctors` SET `d_password`=? WHERE  d_email=?";
            $stmt = mysqli_prepare($connection, $updatePass);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'ss', $d_hashpass, $d_email);
                $result = mysqli_stmt_execute($stmt);
                if ($result) {
                    echo '<script>
                        Swal.fire({
                            title: "Password Changed",
                            text: "Your password has been changed.",
                            icon: "success"
                        }).then(() => {
                            window.location.href = "doctor-dashboard.php";
                        });
                    </script>';
                    exit();
                } else {
                    echo '<script>
                        Swal.fire({
                            title: "Error",
                            text: "Something went wrong. Please try again later.",
                            icon: "error"
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                        title: "Error",
                        text: "Something went wrong. Please try again later.",
                        icon: "error"
                    });
                </script>';
            }
        }
    } else {
        echo '<script>
            Swal.fire({
                title: "Password Mismatch",
                text: "Passwords should match and must not be empty.",
                icon: "error"
            });
        </script>';
    }
}
?>


<!-- Change Password Form -->
<form method="POST">
    <div class="form-group">
        <label>New Password</label>
        <input type="password" class="form-control" name="d_password">
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="d_cpassword">
    </div>
    <div class="submit-section">
        <button type="submit" name="changepass" class="btn btn-primary submit-btn">Save Changes</button>
    </div>
</form>
<!-- /Change Password Form -->

											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content --> 
   
			<?php 
 
}else{
    header("location: doctor-login.php");
}
include("./assets/include/footer.php");

?>