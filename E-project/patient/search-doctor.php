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
			<div class="col-md-8 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page" >Search</li>
					</ol>
				</nav>
					<h2 class="breadcrumb-title">Search the best doctor for yourself</h2>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->
			
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
         <div class="row">
			<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
				<!-- Search Filter -->
				<div class="card search-filter">
					<div class="card-header">
						<h4 class="card-title mb-0">Search Filter</h4>
					</div>
				    <div class="card-body">
						<div class="filter-widget">
						<form class="d-flex mt-3" role="search" action="search.php" method="POST">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                            <br>
                            <button class="btn btn-outline-primary col-lg-2 fas fa-search mx-1" type="submit" action="search.php"></button>
                        </form><br>
        		        </div>
                        <div class="filter-widget"><h4>Specialist</h4>
							<div>
							<?php
$getDoctordata = "SELECT DISTINCT speciality FROM doctors";
$getDoctordata_run = mysqli_query($connection, $getDoctordata) or die("failed");

if (mysqli_num_rows($getDoctordata_run) > 0) {
    while ($doctordata = mysqli_fetch_assoc($getDoctordata_run)) {
        ?>
        <li><?= $doctordata['speciality'] ?></li>
        <?php
    }
}
?>
</div>
							
						</div>
				</div>			<!-- /Search Filter -->		
	</div>					
</div>
		
						<?php
$getDoctordata="SELECT * from doctors";
$getDoctordata_run=mysqli_query($connection, $getDoctordata) or die("failed");
if(mysqli_num_rows($getDoctordata_run) > 0){?>
						<div class="col-md-12 col-lg-8 col-xl-9">

						<?php
						while($doctordata=mysqli_fetch_assoc($getDoctordata_run)){
						$DoctorID=$doctordata['DoctorID'];
						?>
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="doctor-profile.html">
													<img src="../doctor/assets/img/doctors/<?=$doctordata['d_image']?>" class="img-fluid" alt="<?=$doctordata['d_image']?>" >
												</a>
											</div>
											<div class="doc-info-cont">
												<h3 class="doc-name"><a href="doctor-profile.php?DoctorID=<?=$DoctorID?>"> Dr. <?=$doctordata['d_name']?></a></h3>
												<p class="doc-speciality">
													<i class="fas fa-star"></i> Specialist in <?=$doctordata['speciality']?>
													<br> 
													<i class='fas fa-map-marker-alt'></i> <?=$doctordata['d_city']?>,  <?=$doctordata['d_country']?></p>
												
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(17)</span>
												</div>
												
												
											</div>
										</div>
										<div class="doc-info-right">

											<div class="clinic-booking">
												<a class="view-pro-btn" href="doctor-profile.php?DoctorID=<?=$DoctorID?>">View Profile</a>
												<a class="apt-btn" href="book-appointment.php?DoctorID=<?=$DoctorID?>">Book Appointment</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->

							
							<?php
							}
							}
							?>
							</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<?php 
			}else{
				header("location: patient-login.php");
			}
include("./assets/include/footer.php");
?>