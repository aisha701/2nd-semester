
<?php
 session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] == "Administrator"){
include("./assets/include/header.php");
include("./assets/database/connection.php");
$_SESSION['a_name'];
// Check if the 'a_image' key is set in the session
if (isset($_SESSION['a_image'])) {
    $imagePath = './assets/img/profiles/' . $_SESSION['a_image'];
    // echo "<img src='$imagePath' alt='User Image'>";
} else {
    echo "<img src='./assets/img/default-image.png' alt='Default Image'>";
}
?>
<style>
   .modal-dialog-centered .change-photo-btn {
    background-color: #20c0f3;
    border-radius: 50px;
    color: #fff;
    cursor: pointer;
    display: block;
    font-size: 10px;
    font-weight: 600;
 margin:1rem 0px ;
    padding: 10px 15px;
    position: relative;
    transition: .3s;
    text-align:center;
    width: 200px;
}
.modal-dialog-centered .change-photo-btn input.upload {
	bottom: 0;
    cursor: pointer;
    filter: alpha(opacity=0);
	left: 0;
    margin: 0;
    opacity: 0;
    padding: 0;
    position: absolute;
    right: 0;
    top: 0;
	width: 220px;
}
</style>

			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row"> 
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="<?php echo $imagePath; ?> ">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?php echo $_SESSION['a_name']?></h4>
										<h6 class="text-muted"><?php echo $_SESSION['a_email']?></h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> <?php echo $_SESSION['a_city']?>, <?php echo $_SESSION['a_country']?></div>
									
									</div>
									
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10"><?php echo $_SESSION['a_name']?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10"><?php echo $_SESSION['a_email']?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-10"><?php echo $_SESSION['a_phonenumber']?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-10 mb-0"><?php echo $_SESSION['a_address']?><br>
														<?php echo $_SESSION['a_city']?><br>
														<?php echo $_SESSION['a_country']?></p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="updateadmin.php" method="post" enctype="multipart/form-data">
															<div class="change-avatar">
														<div class="profile-img">
														<img src="<?php echo $imagePath;?>" alt="User Image"  height="100" >
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="a_image">
															</div>
														</div>
													</div>
																<div class="row form-row">
																
																	<div class="col-12 col-sm-6">

																		<div class="form-group">
																		
																			<label>First Name</label>
																			<input type="text" name="a_name" class="form-control" value="<?php echo $_SESSION['a_name']?>" >
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" name="a_email" class="form-control" value="<?php echo $_SESSION['a_email']?>" >
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input type="text"  name="a_phonenumber" value="<?php echo $_SESSION['a_phonenumber']?>"class="form-control">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Age</label>
																			<input type="text" name="a_age"  value="<?php echo $_SESSION['a_age']?> years "class="form-control">
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Address</label>
																			<input type="text" name="a_address" class="form-control" value="<?php echo $_SESSION['a_address']?>" >
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>City</label>
																			<input type="text" name="a_city" class="form-control" value="<?php echo $_SESSION['a_city']?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Country</label>
																			<input type="text" name="a_country" class="form-control" value="<?php echo $_SESSION['a_country']?>" >
																		</div>
																	</div>
																	
																	
																</div>
																<button type="submit" class="btn btn-primary btn-block"  name="Add">Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
		
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
												<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['changepass'])) {
    // Validate and sanitize form data
    $a_password = isset($_POST['a_password']) ? mysqli_real_escape_string($connection, $_POST['a_password']) : '';
    $a_cpassword = isset($_POST['a_cpassword']) ? mysqli_real_escape_string($connection, $_POST['a_cpassword']) : '';

    // Check if email is set in session
    $a_email = isset($_SESSION['a_email']) ? $_SESSION['a_email'] : '';

    // Check if both passwords match and are not empty
    if (!empty($a_password) && !empty($a_cpassword) && ($a_password == $a_cpassword)) {
        // Validate password length or complexity
        if (strlen($a_password) < 3) {
            echo "<script>alert('Password should be at least 6 characters long.')</script>";
        } else {
            // Hash the password
            $a_hashpass = password_hash($a_password, PASSWORD_BCRYPT);

            // Use prepared statement for better security
            $updatePass = "UPDATE `users` SET `a_password`=? WHERE  a_email=?";
            $stmt = mysqli_prepare($connection, $updatePass);

            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, 'ss', $a_hashpass, $a_email);

                // Execute the statement
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "<script>alert('Your password has been changed.')</script>";
                    
                    exit();
                } else {
                    // Display or log the specific MySQL error
                    echo "<script>alert('Something went wrong. Please try again later.')</script>";
                    echo "SQL Error: " . mysqli_stmt_error($stmt);
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                // Display or log the specific MySQL error
                echo "<script>alert('Something went wrong. Please try again later.')</script>";
                echo "SQL Error: " . mysqli_error($connection);
            }
        }
    } else {
        echo "<script>alert('Passwords should match and must not be empty.')</script>";
    }
}
?>							
													<form method="POST">
														<div class="form-group">
															<label>New Password</label>
															<input type="password" class="form-control" name="a_password">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control" name="a_cpassword">
														</div>
													
														<button class="btn btn-primary" type="submit" name="changepass"> Change password</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
			<?php 
}else{
    header("location: login.php");
}
?>