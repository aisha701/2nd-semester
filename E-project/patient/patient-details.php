<?php 
require("./assets/database/connection.php");
session_start();

if(isset($_POST['add']) && $_SERVER['REQUEST_METHOD'] == "POST"){
   $p_email = $_SESSION['p_email'];
   $p_name = $_POST['p_name'];  
   $p_gender = $_POST['p_gender'];  
   $p_phonenumber = $_POST['p_phonenumber'];
   $p_age = $_POST['p_age'];
   $p_dob = $_POST['p_dob'];
   $p_city = $_POST['p_city'];
   $p_country = $_POST['p_country']; 
   $p_address = $_POST['p_address'];
   if($_FILES['p_image']['error'] ==4){
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Image Not Found',
                text: 'Image not found.',
                icon: 'error'
            });
        });
    </script>";
}else{

$imgname=$_FILES['p_image']['name'];
$tmpname=$_FILES['p_image']['tmp_name'];
$size=$_FILES['p_image']['size'];

$validExtensions=["png","jpg","jpeg"];
// abc.jpg
$extension= explode(".",$imgname);// ["abc", "jpg"]
// print_r($extension);
$extension= strtolower(end($extension));//jpg
if($size > 100000000){
    echo "<script>
	document.addEventListener('DOMContentLoaded', function() {
		Swal.fire({
			title: 'File Too Large',
			text: 'File size is too large.',
			icon: 'error'
		});
	});
</script>";
}elseif(!in_array($extension, $validExtensions)){
    echo "<script> 
	document.addEventListener('DOMContentLoaded', function() {
		Swal.fire({
			title: 'Unsupported File Type',
			text: 'File type not supported.',
			icon: 'error'
		});
	});
</script>";
}else{

   $update = "UPDATE `patients` SET `p_gender`='$p_gender',`p_phonenumber`='$p_phonenumber', `p_age`='$p_age', `p_dob`='$p_dob',`p_city`='$p_city',`p_country`='$p_country', `p_address`='$p_address' ,`p_image`='$imgname' WHERE `p_email`='$p_email'";
   $result = mysqli_query($connection, $update);

   if($result){
	move_uploaded_file($tmpname, "./assets/img/patients/".$imgname);
	$_SESSION['p_image']=$imgname;
	$_SESSION['p_name']=$p_name;
	$_SESSION['p_email']=$p_email;
	$_SESSION['p_phonenumber']=$p_phonenumber;
    $_SESSION['p_address']=$p_address;
    $_SESSION['p_age']=$p_age; 
    $_SESSION['p_dob']=$p_dob; 
    $_SESSION['p_city']=$p_city; 
    $_SESSION['p_country']=$p_country;

      echo "<script>
	  document.addEventListener('DOMContentLoaded', function() {
		  Swal.fire({ 
			  title: 'Success',
			  text: 'Account details added successfully.',
			  icon: 'success'
		  }).then(() => {
			  window.location.href='index-2.php';
		  });
	  });
  </script>";
      
   } else {
	echo "<script>
	document.addEventListener('DOMContentLoaded', function() {
		Swal.fire({
			title: 'Failed',
			text: 'Failed to update account details.',
			icon: 'error'
		});
	});
</script>";
   }
}}}
?>


<!DOCTYPE html> 
<html lang="en">
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
             <div class="container profile-form">
                 <h3 class="details-head text-center mt-2">Customize your <span>Patient</span> profile—add your distinctive touch by filling out the form below</h3>
               </div>


				
<div class="container ">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form method="post"  enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 form-title">
								<h4 class="card-title text-uppercase">patient's details</h4>
								<div class="form-group  form-input-color">
								<label>Full Name</label>
								<input type="text" class="form-control" name="p_name" required>
							    </div>

								<div class="form-group form-input-color">
									 <select name="p_gender" id="gender" class="form-control my-3" >
                                 <option value="none" disabled selected>Select gender</option>
                                 <option value="male" >Male</option>
                                 <option value="female" >Female</option>
</select>
	  </div>
								  


								<div class="form-group form-input-color">
								<label>Phone Number</label>
								<input type="text" class="form-control" name="p_phonenumber" required>
								</div>
								<div class="form-group form-input-color">
								<label>Age</label>
								<input type="number" class="form-control" name="p_age" required>
								</div>
								<div class="form-group form-input-color">
								<label>D.O.B</label>
								<input type="date" class="form-control" name="p_dob" required>
								</div>
								<div class="form-group form-input-color">
								<label>City</label>
								<input type="text" class="form-control" name="p_city" required>
								</div>
								<div class="form-group form-input-color">
								<label>Country</label>
								<input type="text" class="form-control" name="p_country" required>
								</div>
								<div class="form-group form-input-color">
								<label>Address</label>
								<input type="text" class="form-control" name="p_address" required>
								</div>
								
				

								<div class="form-group form-input-color row">
								<label class="col-form-label col-md-2">File Input</label>
								<div class="col-md-10">
								<input class="form-control" type="file" name="p_image" accept=".jpg, .png, .jpeg">
								</div>
							</div>
							<div class="text-right mt-3">
							<button type="submit" name="add" class="btn btn-primary">Submit</button>
						</div>
						</div>
					</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	</body>
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
		<footer>
   
</html>