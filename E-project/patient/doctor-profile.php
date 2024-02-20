<?php
include("./assets/include/header.php");
include("./assets/database/connection.php");
session_start();
if(isset( $_SESSION['p_email']) ){ 

?>

<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

				
 <!-- Tab Menu -->
 <nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
								
								</ul>
							</nav>
							<!-- /Tab Menu -->
<?php


if(isset($_GET['DoctorID'])){
	$DoctorID=$_GET['DoctorID']; 

	$getDoctordetails="SELECT * FROM `doctors`  WHERE DoctorID = $DoctorID ";
    $getDoctordetails_run=mysqli_query($connection, $getDoctordetails) or die("failed");
    if(mysqli_num_rows($getDoctordetails_run) > 0){
    while($details=mysqli_fetch_assoc($getDoctordetails_run)){
        $DoctorID=$details['DoctorID'];
       
	       ?>
		     <!-- Doctor Widget --> 
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
									<img src="../doctor/assets/img/doctors/<?=$details['d_image']?>" class="img-fluid" alt="<?=$details['d_image']?>" ><span class="badge bg-danger text-light fw-lighter text-uppercase"><?=$details['speciality']?> </span>
									</div>
									<div class="doc-info-cont">
									
										<h3 class="doc-name ">Dr. <?=$details['d_name']?><br></h3>
										<p style="line-height: 1.7;"> 
											<i class='fas fa-map-marker-alt'></i> <?=$details['d_address']?><br> <i class="fas fa-city"></i> <?=$details['d_city']?>, <?=$details['d_country']?><br>
										 <i class='fas fa-phone'></i> <?=$details['d_phonenumber']?> <br>
										 <i class="fas fa-envelope"></i> <?=$details['d_email']?>
										 
										</p>

										
									</div>
								</div>
								<div class="doc-info-right">
									<div class="clini-infos">
										<ul>
											<li><i class="far fa-thumbs-up"></i> 99%</li>
											<li><i class="far fa-comment"></i> 35 Feedback</li>
											<li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
											<li><i class="far fa-money-bill-alt"></i> $100 per hour </li>
										</ul>
									</div>
									
									<div class="clinic-booking">
										<a class="apt-btn" href="book-appointment.php?DoctorID=<?=$DoctorID?>">Book Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
	}}}

?>
			
			

					
					




						
							
							
							
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>		
			<!-- /Page Content -->
   
			
	
		
		
		<?php 

}else{
    header("location: patient-login.php");
}
include("./assets/include/footer.php");
?>