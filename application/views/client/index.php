<!DOCTYPE html>
<html lang="en" class="no-js">
  
<!-- Mirrored from wahabali.com/work/HugsAndDrugs/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:43:09 GMT -->
<head>
    <base #href="" />
	<!-- Basic Page Needs

     ================================================== -->
	 
	 <meta charset="utf-8">
	 
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	 <link rel="icon" type="image/png" href="<?php echo base_url();?>/client_assets/images/title.png">
	
     <title>HugsAndDrugs</title>
    
     <meta name="description" content="">
    
     <meta name="keywords" content="">
    
     <meta name="author" content="">

	 
	 <!-- Mobile Specific Metas
    
     ================================================== -->
    
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    
     <meta name="format-detection" content="telephone=no">

	<?php $this->load->view("client/templets/header-links"); ?>

	<script type="text/javascript" src="<?php echo base_url();?>/client_assets/js/appointment_form.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>/client_assets/js/show_appointments.js"></script>
  
	</head>
    <body class="fixed-header">

		<?php 
			if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="logout" )
			unset($_SESSION['username']);
		?>

		<!-- Main banner
		============================================= -->
		<section class="slider-revolution clearfix" data-stellar-background-ratio="0.3">
    	
			<div class="slider-revolution-overlay"></div>
             
			 	
				<!-- Header
				============================================= -->
				<header class="HugsAndDrugs-header">
                
				
					<div class="container">

					
						<!-- Primary Navigation
						============================================= -->
						<nav class="navbar navbar-default" role="navigation">
						
							<!-- Brand and toggle get grouped for better mobile display
							============================================= -->
							
							<div class="navbar-header">
								
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-nav">
								  <span class="sr-only">Toggle navigation</span>
								  <span class="icon-bar"></span>
								  <span class="icon-bar"></span>
								  <span class="icon-bar"></span>
								</button>
								
								<a class="navbar-brand" href="index-2.html"><img src="<?php echo base_url();?>/client_assets/images/logo2	.png" alt="" title=""></a>
							
							</div>
						
							
							<div class="collapse navbar-collapse navbar-right" id="primary-nav">
								
								<ul class="nav navbar-nav">
										
									<li class="dropdown active">
										<a href="<?php echo site_url('client/Home?page=index');?>" class="dropdown-toggle">Home</a>						
										
									</li>
									
									<li>
										<a href="<?php echo site_url('client/about_us?page=about-us');?>" class="dropdown-toggle">About Us</a>
										
									</li>
									<li class="dropdown">
										<a href="<?php echo site_url('client/Doctor?page=Doctor');?>" class="dropdown-toggle">Doctors</a>
										
											<ul class="dropdown-menu" style="
											      columns:2;     
											      width: 500px ;
   												  height: 500px;
   												 ">
   												 <li><a style="color:#2b96cc !important;"><strong>SPECIALITY</strong>
														</a></li>									
												<?php

													foreach($DoctorSpecialityList as $specialist)
													{
													?>
													<li><a href="<?php echo "doctor"."?doctor=".$specialist['speciality_id'];?>">
														<?php echo $specialist['doctor_speciality'];?></a></li>
													<?php
												
												  
												}
												?>
											</ul>
											
										
									</li>
								  
									
									<li class="dropdown">
										<a href="<?php echo site_url('client/Hospital?page=Hospital');?>" class="dropdown-toggle">Hospitals</a>
										
											<ul class="dropdown-menu" style="
											      columns:2;     
											      width: 500px ;
   												  height: 500px;
   												 ">
   												 <li><a style="color:#2b96cc !important;"><strong>SPECIALITY</strong>
														</a></li>									
												<?php

													foreach($HospitalSpecialityList as $specialist)
													{
													?>
													<li><a href="<?php echo "hospital"."?hospital=".$specialist['speciality_id'];?>">
														<?php echo $specialist['hospital_speciality'];?></a></li>
													<?php
												
												  
												}
												?>
											</ul>
									</li>
								  
									
								  
									<?php if(isset($_SESSION['doctor_id']) || isset($_SESSION['hospital_id']))
									{
								    }
								    else
								    {

								    	?>

								  
									<li class="dropdown last">
										<a href="<?php echo site_url('client/shop?page=shop');?>" class="dropdown-toggle">Shop</a>
										
									</li>

									<?php
								}
									?>
								  
									<li class="dropdown last">
										<a href="<?php echo site_url('client/contact_us?page=contact-us');?>" class="dropdown-toggle" >Contact Us</a>
										
									</li>
								<?php
										

												if(isset($_SESSION['username']))
												{

										        $name = $_SESSION['username'];
										        ?><li class="dropdown "><a   class="dropdown-toggle" ><?php
													echo "Hello ".$name;
												?>

										</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url();?>/client/Profile?page=Profile">View Profile</a></li>
											<?php 
											$page="";
												if(isset($_REQUEST['page']))
												{
													$page = $_REQUEST['page'];
												}
												$medicine="";
												if(isset($_REQUEST['medicine']))
												{
													$medicine = $_REQUEST['medicine'];
												}
											?>
											<li><a href="<?php echo base_url();?>/client/login/logout?page=index">Logout</a></li>
										</ul>
									</li>

											<?php
											}
											else
											{
												?><li class="dropdown"><a id="myBtn" class="dropdown-toggle" >
													<?php
												echo "Login / Register";
												?>
												
												<?php
											}
											?>
											
										</a>
									</li>

								  
								</ul>

								
							</div>
							
						</nav>
						
					</div>
						
					<div class="header-bottom-line"></div>
					
				</header>

 				<!-- Modal 
				============================================= -->
				<?php $this->load->view("client/templets/client_login") ?>
				
			
			<div id="content-index" class="no-margin-top">
			
			
				<!-- Main Banner
				============================================= -->
				<div class="container">
		   
					<div class="tp-banner-container">
						
						<div class="tp-banner">
							
							<ul>	
								
								<!-- Fade
								============================================= -->
								<li data-transition="fade" data-slotamount="10" data-thumb=""> 										
									<img src="<?php echo base_url();?>/client_assets/images/blank.png" alt="" />
									<div class="caption lfr" data-x="860" data-y="80" data-speed="2000" data-start="1300" data-easing="easeOutBack"><img src="<?php echo base_url();?>/client_assets/images/slider2-img2.jpg" alt="" class="img-circle" /></div>
									<div class="caption sfb" data-x="610" data-y="250" data-speed="3000" data-start="900" data-easing="easeOutExpo">
									<img src="<?php echo base_url();?>/client_assets/images/slider2-img3.jpg" alt="" class="img-circle" /></div>
									<div class="caption lfr" data-x="590" data-y="120" data-speed="2000" data-start="900" data-easing="easeOutExpo">
									<img src="<?php echo base_url();?>/client_assets/images/slider2-img1.jpg" alt="" class="img-circle" /></div>
									<div class="caption lfr" data-x="900" data-y="300" data-speed="3000" data-start="900" data-easing="easeOutExpo">
									<img src="<?php echo base_url();?>/client_assets/images/slider2-img4.jpg" alt="" class="img-circle" /></div>
									<div class="caption lft big_white" data-x="0" data-y="130" data-speed="1500" data-start="1700" data-easing="easeOutExpo">Life can be better</div>
									<div class="caption sfr medium_grey" data-x="0" data-y="220" data-speed="1000" data-start="2500" data-easing="easeOutExpo"><br />Your Preferred Choice for World-Class Care
									<br />in over 20 Medical Specialities
									</div>
								</li>

							</ul>
																		
						</div>	
						
					</div>
	   
				</div>

			</div>
                
		</section>

		<!-- Appointment
		============================================= -->
		<section class="appointment-sec text-center bg-gray">


			<?php

				if(isset($_SESSION['hospital_id']) || isset($_SESSION['doctor_id']) )
				{
		
					$date = date('Y-m-d',time());
			?>
			<div class="container">
				<div class="row">
					<h1>Appointments</h1>
					<p class="lead">-------------------------------------------------------------------------</p>
						<div class="col-md-12">
							<div class="row">
								<?php	if(isset($_SESSION['hospital_id']))
									{
								?>
								<select name="date" id="date" onchange="getAppointment('hospital');">
								<?php
								}
	     
	     						if(isset($_SESSION['doctor_id']))
	     							{
	     						?>
								<select name="date" id="date" onchange="getAppointment('doctor');">
											
								<?php
	     						}
	    					 	?>
									<option value="<?php echo date('Y-m-d',time()); ?>">Today</option>
									<option value="<?php 
											$today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$date +1 day"));
 											echo $nextday; ?>"><?php 
											 $today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$date +1 day"));
 											echo $nextday; ?>
 									</option>
									<option value="<?php 
											 $today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$date +2 day"));
 											echo $nextday; ?>"><?php 
											 $today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$date +2 day"));
 											echo $nextday; ?>
 									</option>
									<option value="<?php 
											 $today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$date +3 day"));
 											echo $nextday; ?>"><?php 
											 $today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$date +3 day"));
 											echo $nextday; ?>
 												
 											</option>
									<option value="<?php 
											 $today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$date +4 day"));
 											echo $nextday; ?>"><?php 
											 $today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$date +4 day"));
 											echo $nextday; ?>
 												
 									</option>
									<option value="<?php 
											 $today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$date +5 day"));
 											echo $nextday; ?>"><?php 
											 $today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$date +5 day"));
 											echo $nextday; ?>
 												
 									</option>
									<option value="<?php 
											 $today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$date +6 day"));
 											echo $nextday; ?>"><?php 
											 $today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$date +6 day"));
 											echo $nextday; ?>
 												
 									</option>

								</select>
							</div>
						
							<!-- Table
							============================================= -->
							<div class="row">
								<ul class="list-unstyled pricing-table first" >
									<li class="table-heading">
										<span>Sr.No</span>
										<span>Patient</span>
										<?php
										if(isset($_SESSION['doctor_id']))
										{
										?>
										<span>Hospital</span>
										<?php
									    }
									    elseif(isset($_SESSION['hospital_id']))
									    {
										?>
										<span>Doctor</span>
										<span>Date</span>
										<?php
									     }
										?>

										
									</li>
									<!-- srno,patientname,doctor/hospitalname -->
									<div id="firsttable">
									<?php
									$counter=0;
									foreach($AppointmentList as $list)
									{
										$counter+=1;
										?>
										<li>
										<span><?php echo $counter;?></span>
									
										<span><?php echo $list['first_name']." ".$list['last_name'];?></span>			
										<span><?php 
											if(isset($_SESSION['doctor_id']))
											{
											echo $list['hospital_name'];
											}
											if(isset($_SESSION['hospital_id']))
											{
											echo $list['doctor_name'];
											}

											?></span>
										<span><?php echo $list['appointment_date'];?></span>											
										</li>
									
										<?php
									}
									?>
									</div>
							
								</ul>
								<ul class="list-unstyled pricing-table">
									<li class="table-heading">
										
						    			<span>Time</span>
						    			<?php
						    			if(isset($_SESSION['doctor_id']))
						    			{
						    			?>
						    			<span>Prescription</span>
						    			<?php
						    			}	
						    			?>
									</li>
									<!-- date,time -->
									<div id="secondtable">
										<?php
										$counter=0;
										foreach($AppointmentList as $list)
											{
												$counter+=1;
											?>
											<li>
												<span><?php echo $list['appointment_time'];?></span>
						    			<?php
						    			if(isset($_SESSION['doctor_id']))
						    			{
						    			?>

											<span>
						    				<form name="prescription_form" id="prescription_form" enctype="multipart/form-data">
						    				<input type="file" name="prescription" id="prescription" style="width:180px; ">
						    				
						    				<span style="color:red;text-align:left">PDF Only</span>
						    				<button type="button" onclick="Prescription(<?php
						    					echo $list['appointment_id'];
						    					?>);">Prescribe</button>
						    				</form>
						    			</span>
						    			<?php
						    			}
						    			?>
											</li>
									
									
											<?php
											}
											?>
								
									</div>

								</ul>
							</div>
						</div>

				</div>
			</div>
			
			<?php
		}
		else
		{
			?>

			
			<div class="container">
				
				<h1>Make an appointment</h1>
				<p class="lead">-------------------------------------------------------------------------</p>
				
				<div class="row">
				
					<div class="col-md-6">
						<figure><img src="<?php echo base_url();?>/client_assets/images/appointment-img2.png" alt="image" title="Appointment image" class="img-responsive lady"></figure>
					</div>
					
					<div class="col-md-6">
						<div class="appointment-form clearfix">
							<?php
							$fname = $lname=$phone=$email=$appointment_time=$appointment_date=$gender = $doctor_name=$doctor=$hospital_name=$hospital=$newDate="";
							if(isset($_SESSION['app_fname']))
							{
								$fname = $_SESSION['app_fname'];
							}
							if(isset($_SESSION['app_lname']))
							{
								$lname = $_SESSION['app_lname'];
							}
							if(isset($_SESSION['app_phone']))
							{
								$phone = $_SESSION['app_phone'];
							}
							if(isset($_SESSION['app_email']))
							{
								$email = $_SESSION['app_email'];
							}
							if(isset($_SESSION['app_appointment_date']))
							{
								$appointment_date = $_SESSION['app_appointment_date'];
							}
							if(isset($_SESSION['app_gender']))
							{
								$gender = $_SESSION['app_gender'];
							}
							if(isset($_SESSION['app_hospital']))
							{
								$hospital = $_SESSION['app_hospital'];
							}
							if(isset($_SESSION['app_doctor']))
							{
								$doctor = $_SESSION['app_doctor'];
							}

							if(isset($_SESSION['app_hospital_name']))
							{
								$hospital_name = $_SESSION['app_hospital_name'];
							}
							if(isset($_SESSION['app_doctor_name']))
							{
								$doctor_name = $_SESSION['app_doctor_name'];
							}
							if(isset($_SESSION['app_appointment_time']))
							{
								$appointment_time = $_SESSION['app_appointment_time'];
							}
							if(isset($_SESSION['first_name']))
							{
								$fname = $_SESSION['first_name'];
							}
							if(isset($_SESSION['last_name']))
							{
								$lname = $_SESSION['last_name'];
							}
							if(isset($_SESSION['mobile_number']))
							{
								$phone = $_SESSION['mobile_number'];
							}
							if(isset($_SESSION['username']))
							{
								$email = $_SESSION['username'];
							}
							if(isset($_SESSION['gender']))
							{
								$gender = $_SESSION['gender'];
							}
							if(isset($_SESSION['app_hospital']))
							{
								$hospital = $_SESSION['app_hospital'];
							}

							$newDate = date("d-m-Y", strtotime($appointment_date));

							if($appointment_date=="")
							{
								$newDate="";
							}
							
							?>
							<form name="appoint_form" id="appoint_form" method="post" action="Home/insert">
								<input type="text" name="app_fname" id="app_fname" placeholder="First Name" value="<?php echo $fname; ?>" style="color:#9ba4b2;">
								<input type="text" name="app_lname" id="app_lname" placeholder="Last Name" value="<?php echo $lname; ?>"style="color:#9ba4b2;">
								<input type="text" name="app_email_address" id="app_email_address" placeholder="Email Address" value="<?php echo $email; ?>"style="color:#9ba4b2;">
								<input type="text" name="app_phone" id="app_phone" placeholder="Phone No" value="<?php echo $phone; ?>"style="color:#9ba4b2;">
								<div class="row">
									<div class="col-md-12">
								<select name="hospital" id="hospital" onchange="getDoctor(this);"style="color:#9ba4b2;">
									<option value=""style="color:#9ba4b2;">Select Hospital</option>
									<?php

									foreach ($HospitalList as $list) {
										?>

										<option value="<?php echo $list['hospital_id'];?>"
											<?php
											if($hospital==$list['hospital_id'])
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?>
											style="color:#9ba4b2;"
											><?php echo $list['hospital_name'];?></option>
										<?php
									}

									?>
								</select>
							</div>
						</div>
								<div class="row">
								<div class="col-md-12">
								<select style="" name="doctor" id="doctor" style="color:#9ba4b2;">
									<option value="" style="color:#9ba4b2;">Select Doctor</option>
									<?php

									foreach ($DoctorList as $list) {
										?>

										<option value="<?php echo $list['doctor_id'];?>"
											<?php
											if($doctor==$list['doctor_id'])
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?>
											style="color:#9ba4b2;"
											><?php echo $list['doctor_name'];?></option>
										<?php
									}

									?>
									
								</select>
							</div>
								</div>
								<input type="text" name="appointment_date" id="appointment_date" placeholder="Appointment Date" onchange="Appointment();" value="<?php echo $newDate; ?>" style="color:#9ba4b2;">
								<select style="color:#2B96CC;" name="app_gender" id="app_gender" style="color:#9ba4b2;">
									<option value="Male" <?php

									if($gender=="Male")
									{
										echo "selected";
									}
									else
									{
										echo "";
									}

									?>style="color:#9ba4b2;">Male</option>
									<option value="Female"
									<?php

									if($gender=="Female")
									{
										echo "selected";
									}
									else
									{
										echo "";
									}
									
									?>style="color:#9ba4b2;">Female</option>

								</select>
								<div class="row">
									<div class="col-md-12">
								<select name="time" id="time" style="color:#9ba4b2;">
									<?php
								// 	foreach($AppointmentList as $list)
								// {

								// }
									?>
									<option value="" style="color:#9ba4b2;">Select Time</option>

									<option value="11:00-11:30" id="o1" style="color:#9ba4b2;"
									<?php

									if($appointment_time=="11:00-11:30")
									{
										echo "selected";
									}
									else
									{
										echo "";
									}

									?>
									>11:00-11:30</option>
									<option value="11:30-12:00" id="o2" style="color:#9ba4b2;"
									<?php

									if($appointment_time=="11:30-12:00")
									{
										echo "selected";
									}
									else
									{
										echo "";
									}

									?>

									>11:30-12:00</option>
									<option value="12:00-12:30" id="o3"	style="color:#9ba4b2;"								<?php

									if($appointment_time=="12:00-12:30")
									{
										echo "selected";
									}
									else
									{
										echo "";
									}

									?>
									>12:00-12:30</option>
									<option value="12:30-01:00" id="o4" style="color:#9ba4b2;"
										<?php

									if($appointment_time=="12:30-01:00")
									{
										echo "selected";
									}
									else
									{
										echo "";
									}

									?>

									>12:30-01:00</option>
								</select>
								</div>
								</div>
								<div class="row">
									<div class="col-md-12">
								<input type="submit" value="submit" class="btn btn-default btn-rounded" >
							</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
				
			</div>



			<?php
		}

			?>
			
		</section>
    
		<div class="height40"></div>

		<!-- About
		============================================= -->		
		<section class="about-sec text-center" data-stellar-background-ratio="0.3">
			<div class="container">
				<h1>Our Family</h1>
				<p class="lead">-------------------------------------</p>
				
				<div class="row text-center" id="counters">
					<div class="col-md-4 col-xs-6">
						<div class="counter">
						   <span class="quantity-counter1 highlight">0</span>
						   <h6 class="counter-details">PATIENTS</h6>
						 </div>
					</div>
					<div class="col-md-4 col-xs-6">
						<div class="counter">
						   <span class="quantity-counter2 highlight">0</span>
						   <h6 class="counter-details">DOCTORS</h6>
						 </div>
					</div>
					<div class="col-md-4 col-xs-6">
						<div class="counter">
						   <span class="quantity-counter3 highlight">0</span>
						   <h6 class="counter-details">HOSPITALS</h6>
						 </div>
					</div>
				</div>
				
			</div>
			
		</section>
    
		<div class="height40"></div>

		<!-- Latest News and HugsAndDrugs Tour
		============================================= -->
		<div class="container">
		
			<div class="row">
				
				<div class="col-md-6">
						
						<h2 class="light bordered">Benefits from <span>HugsAndDrugs</span></h2>
						
						<div class="feature">
							<i class="pull-left feature-icon fa fa-user-md"></i>
							<div class="feature-content">
								<h5><a href="#.">Online Appoitmnents</a></h5>
								<p>HugsAndDrugs platform can be used to book an appointment for specific doctor in respective hospital. </p>
							</div>
						</div>
						
						<div class="feature">
							<i class="pull-left feature-icon fa fa-tint"></i>
							<div class="feature-content">
								<h5><a href="#.">Drug Store</a></h5>
								<p>Isers can also buy medication through the facility. This will help users to Save time</p>
							</div>
						</div>
						
						<div class="feature">
							<i class="pull-left feature-icon fa fa-phone-square"></i>
							<div class="feature-content">
								<h5><a href="#.">Hospitals & Doctors Details</a></h5>
								<p>HugsAndDrugs platform can be used to see information about Hospitals & Doctors.</p>
							</div>
						</div>
						
					</div>
				
				<div class="col-md-5">
					
					<h2 class="light bordered">why choose <span>HugsAndDrugs</span></h2>
						
					<div class="panel-group accordian-style2" id="accordion2">
						  
						<div class="panel panel-default">
							
							<div class="panel-heading">
							  <h4 class="panel-title active">
								<a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
								  <i class="fa fa-medkit"></i>our responsibility<i class="fa pull-right fa-angle-up"></i>
								</a>
							  </h4>
							</div>
							
							<div id="collapseOne" class="panel-collapse collapse in">
							  <div class="panel-body">
								HugsAndDrugs platform can be used to book an appointment for specific doctor in respective hospital. Users can also buy medication through the facility. This will help users to Save time & also they can access their medical report anytime anywhere.

								
							  </div>
							</div>
							
						</div>
						  
						<div class="panel panel-default">
							
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
								  <i class="fa fa-heart"></i>Medical Information<i class="fa fa-angle-down pull-right"></i>
								</a>
							  </h4>
							</div>
							
							<div id="collapseTwo" class="panel-collapse collapse">
							  <div class="panel-body">
							   

								HugsAndDrugs is powerful, flexible, and easy to use and is designed and developed to deliver real conceivable benefits to hospitals. HugsAndDrugs is designed for doctors hospitals, to cover a wide range of doctors & hospital..
							  </div>
							</div>
							
						</div>
						  
						<div class="panel panel-default">
							
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
								  <i class="fa fa-eye"></i>Buy Medicines<i class="fa fa-angle-down pull-right"></i>
								</a>
							  </h4>
							</div>
							
							<div id="collapseThree" class="panel-collapse collapse">
							  <div class="panel-body">
							

								HugsAndDrugs is powerful, flexible, and easy to use and is designed and developed to deliver real conceivable benefits for user to buy medicines
							  </div>
							</div>
							
						</div>
						 
					</div>
					
				</div>
					
			</div>
			
		</div>
    
	
		<div class="height30"></div>
    
	
	
	
	
	
    <div class="colourfull-row"></div>
    
	<!-- Footer
	============================================= -->
	<?php $this->load->view("client/templets/client-footer"); ?>
	
	
		<!-- back to top -->
		<a href="#." class="back-to-top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
	
	</div><!--end #wrapper-->
	
	
	<!-- All Javascript 
	============================================= -->
		<?php $this->load->view("client/templets/footer-links"); ?>
		<script src="<?php echo base_url();?>/client_assets/js/client_login_model.js"></script>
			<script src="<?php echo base_url();?>/client_assets/js/home.js"></script>

    <script>
 $( function() {
    $( "#appointment_date" ).datepicker();
  } );
 

		var total_patients = "<?php echo $total_patients ?>";
		var total_doctors = "<?php echo $total_doctors ?>";
		var total_hospitals = "<?php echo $total_hospitals ?>";
		(function () {
			
			// Revolution slider
			var revapi;
			revapi = jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:576,
				hideThumbs:200,
				fullWidth:"on",
				forceFullWidth:"on"
			});
			
			
			/* ------------------------------------------------------------------------ 
			   SMALL HEADER 
			------------------------------------------------------------------------ */ 
			function checkWidth() {
				var windowSize = $(window).width();

				if (windowSize >= 767) {
					jQuery(window).scroll(function() {    
						var scroll = jQuery(window).scrollTop();	
						if (scroll >= 1) {
							jQuery(".fixed-header").addClass("small-header");
							jQuery(".navbar-brand img" ).attr("src", "<?php echo base_url();?>/client_assets/images/logo.png");
						}
						else {
							jQuery(".fixed-header").removeClass("small-header");
							jQuery(".navbar-brand img" ).attr("src", "<?php echo base_url();?>/client_assets/images/logo2.png");
						}
					});
				}
			}

			// Execute on load
			checkWidth();
			// Bind event listener
			$(window).resize(checkWidth);
			
			
			
			

			
			
		
		})(jQuery);


	</script>

    
  </body>

<!-- Mirrored from wahabali.com/work/HugsAndDrugs/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:43:58 GMT -->
</html>