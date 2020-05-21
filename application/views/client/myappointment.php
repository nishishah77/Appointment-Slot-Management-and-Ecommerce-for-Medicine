<!DOCTYPE html>
<html lang="en" class="no-js">
  
<!-- Mirrored from wahabali.com/work/medicom/trials.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:48:16 GMT -->
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

	 
	 <!-- Web Font
	 ============================================= -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
	 
	
	

    
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	
	
	<!-- SCRIPTS
    
     ================================================== -->
					<?php $this->load->view("client/templets/header-links"); ?>

	
<script type="text/javascript" src="<?php echo base_url();?>/client_assets/js/show_appointments.js"></script>

	</head>
    <body class="fixed-header">
		
	
    
		<!-- Document Wrapper
		============================================= -->
		<div id="wrapper" class="clearfix">
    
    
					<?php $this->load->view("client/templets/client_nav_bar"); ?>

			
			
			
			<!-- Sub Page Banner
			============================================= -->
			<section class="sub-page-banner text-center" data-stellar-background-ratio="0.3">
				
				<div class="overlay"></div>
				
				<div class="container">
					<h1 class="entry-title">Appointments</h1>
					<p>----------------------------------------------------</p>
				</div>
				
			</section>
    
    
    
			<!-- Sub Page Content
			============================================= -->
			<div id="sub-page-content" class="clearfix">
   
			<div class="container">
				
				<div class="row">
					
					<div class="col-md-4">
						
						<div class="procedures">
							
							<h3>Procedures</h3>
							
							<div class="panel-group sidebar-nav" id="accordion3">
								<div class="panel panel-sidebar">
									<div class="panel-heading">
										<h4 class="panel-title active">
											<a href="<?php echo site_url('client/Profile?page=Profile');?>">
												<i class="fa fa-angle-right"></i> My Profile
											</a>
										</h4>
									</div>
								</div>
								<div class="panel panel-sidebar">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="<?php echo site_url('client/Profile/myappointment?page=myappointments');?>">
												<i class="fa fa-angle-right"></i> My Appointments
											</a>
										</h4>
									</div>
								</div>
								<div class="panel panel-sidebar">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a href="<?php echo site_url('client/Profile/Changepassword?page=Changepassword');?>">
												<i class="fa fa-angle-right"></i> Change Password
											</a>
										</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-8">
						
						<h2 class="light bordered">My<span> Appointments</span></h2>
					
						<div class="height20"></div>
						<section class="appointment-sec text-center">


			<?php

				if(isset($_SESSION['hospital_id']) || isset($_SESSION['doctor_id']) )
				{
		
					$date = date('Y-m-d',time());
			?>
			<div class="container">
				<div class="row">
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
									<option value="<?php $today = date('Y-m-d',time()); echo $today; ?>">Today</option>
									<option value="<?php 
											
 											$nextday=strftime("%Y-%m-%d", strtotime("$today +1 day"));
 											echo $nextday; ?>"><?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$today +1 day"));
 											echo $nextday; ?>
 									</option>
									<option value="<?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$today +2 day"));
 											echo $nextday; ?>"><?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$today +2 day"));
 											echo $nextday; ?>
 									</option>
									<option value="<?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$today +3 day"));
 											echo $nextday; ?>"><?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$today +3 day"));
 											echo $nextday; ?>
 												
 											</option>
									<option value="<?php 
											// $today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$today +4 day"));
 											echo $nextday; ?>"><?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$today +4 day"));
 											echo $nextday; ?>
 												
 									</option>
									<option value="<?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$today +5 day"));
 											echo $nextday; ?>"><?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$today +5 day"));
 											echo $nextday; ?>
 												
 									</option>
									<option value="<?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%Y-%m-%d", strtotime("$today +6 day"));
 											echo $nextday; ?>"><?php 
											 //$today="2007-02-28";
 											$nextday=strftime("%d-%m-%Y", strtotime("$today +6 day"));
 											echo $nextday; ?>
 												
 									</option>

								</select>
							</div>
						
							<!-- Table
							============================================= -->
							<div class="row" style="width:850px;">
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
										<?php
									     }
										?>
										<span>Date</span>
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
									<li class="table-heading">							 <span>Time</span>
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
						    				<br>
						    				<button type="button" class="btn btn-default btn-rounded" onclick="Prescription(<?php
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
		}else { ?>
 
						<div class="row" style="width:1000px;">
								<ul class="list-unstyled pricing-table first" >
									<li class="table-heading">
										<span>Sr.No</span>
										<span>Doctor</span>
										<span>Hospital</span>
										<span>Date</span>

								
									</li>
									
									<div id="firsttable">
									<?php
									$counter=0;
									foreach($PatientAppointmentList as $list)
									{
										$counter+=1;
										?>
										<li>
										<span><?php echo $counter;?></span>
									
												
										<span><?php
											echo $list['doctor_name'];
											

											?></span>

										<span><?php
											echo $list['hospital_name'];
											

											?></span>
										<span><?php echo $list['appointment_date'];?></span>										
										</li>
									
										<?php
									}
									?>
									

									</div>
							
								</ul>
								<ul class="list-unstyled pricing-table" >
									<li class="table-heading">							
										<span>Time</span>
						    			<span>Action</span>
						    			<span>Prescription</span>
						    			<span>Rate</span>
									</li>
									<!-- date,time -->
									<div id="secondtable">
										<?php
										$counter=0;
										foreach($PatientAppointmentList as $list)
											{
												$counter+=1;
											?>
											<li>
												<span><?php echo $list['appointment_time'];?></span>
												<span><?php 

												$date = date("Y-m-d");
												if($list['appointment_date']>$date)
												{

												
												?><button type="button" class="btn btn-default btn-rounded" onclick="cancel(<?php echo $list['appointment_id'];?>);">Cancel</button><?php
											    }
												?></span>
												<span>									<?php
												if($list['prescription']!="")
												{
													$prescription =  $list['prescription'];
													?>
												 <button style="width:20px;"type="button" class="btn btn-default btn-rounded" id="download_prescription" name="download_prescription" onclick='View_prescription("<?php echo $prescription; ?>");'>View</button> 
													<!--<a href="<?php base_url()."prescription/".$prescription;?>">
														<button type="">Download</button>
													</a>-->
													<?php
												}
												?>
												</span>
												<span>
													<i class="fa fa-star" id="i1<?php echo $list['appointment_id'];?>" onclick="rate(1,<?php echo $list['doctor_id'];?>,<?php echo $list['appointment_id'];?>)"></i>
													<i class="fa fa-star" id="i2<?php echo $list['appointment_id'];?>"  onclick="rate(2,<?php echo $list['doctor_id'];?>,<?php echo $list['appointment_id'];?>)"></i>
													<i class="fa fa-star" id="i3<?php echo $list['appointment_id'];?>" onclick="rate(3,<?php echo $list['doctor_id'];?>,<?php echo $list['appointment_id'];?>)"></i>
													<i class="fa fa-star" id="i4<?php echo $list['appointment_id'];?>"  onclick="rate(4,<?php echo $list['doctor_id'];?>,<?php echo $list['appointment_id'];?>)"></i>
													<i class="fa fa-star" id="i5<?php echo $list['appointment_id'];?>"  onclick="rate(5,<?php echo $list['doctor_id'];?>,<?php echo $list['appointment_id'];?>)"></i>

											    </span>

											</li>
									
									
											<?php
											}
											?>
								
									</div>

								</ul>
								
							</div>
							<?php } ?>
					</div>
					
				</div>
				
			</div>
		   
  
		</div>			<!--end sub-page-content-->
    
			<!--end sub-page-content-->
    
    
		<div class="colourfull-row"></div>
	
	
	
		<!-- Footer
		============================================= -->
	<?php $this->load->view("client/templets/client-footer"); ?>
	
		<!-- back to top -->
		<a href="#." class="back-to-top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
	
    </div><!--end #wrapper-->
	
		
		
		
      			<?php $this->load->view("client/templets/footer-links"); ?>

	
	
  </body>

<!-- Mirrored from wahabali.com/work/medicom/trials.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:48:27 GMT -->
</html>