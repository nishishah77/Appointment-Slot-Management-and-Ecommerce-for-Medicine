	<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="<?php echo base_url();?>/client_assets/images/title.png">
	<title>Admin - HugsAndDrugs</title>


	<!-- Global stylesheets -->
	<?php $this->load->view("admin/templates/admin-header-links");?>
	<!-- /theme JS files -->
     <script type="text/javascript" src="<?php echo base_url();?>/assets/js/Patient-Add-Validation.js"></script>

</head>

<body class="navbar-bottom">

	<!-- Main navbar -->
	<?php $this->load->view("admin/templates/admin-main-nav");?>
	<!-- /main navbar -->


	<!-- Page header -->
	<?php $this->load->view("admin/templates/admin-header");?>	
	<!-- /page header -->
		

		<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php $this->load->view("admin/templates/admin-side-bar"); ?>
			<!-- /main sidebar -->


		<!-- main content -->
			<!-- Toolbar -->
				<div class="navbar navbar-default navbar-xs navbar-component no-border-radius-top">
					<ul class="nav navbar-nav visible-xs-block">
						<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>

					<div class="navbar-collapse collapse" id="navbar-filter">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#personalinfo" data-toggle="tab">Personal Info</a></li>
							<li><a href="#medicalinfo" data-toggle="tab">Medical Details</a></li>
							
						</ul>

						
					</div>
				</div>
			<!-- /toolbar -->


			<!-- User profile -->
			<div class="row">
				<div class="col-lg-9">
					<div class="tabbable">
		<div class="tab-content">
							<!-- Profile info -->
			<div class="tab-pane fade in active" id="personalinfo">
						
								<?php 
										 foreach ($patientList as $pat) {	?>
									
									<div class="panel panel-white">
										<div class="panel-heading">
											<h6 class="panel-title">Profile information</h6>
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="collapse"></a></li>
							                		
							                	</ul>
						                	</div>
										</div>

										<div class="panel-body">
											<form action="#">
												
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<label>First Name</label>
															<input readonly type="text" class="form-control" value="<?=$pat->patient_first_name;?>">
														</div>
														<div class="col-md-4">
															<label>Middle Name</label>
															<input readonly type="text" class="form-control" value="<?=$pat->patient_middle_name;?>">
														</div>
														<div class="col-md-4">
															<label>Last Name</label>
															<input readonly type="text" class="form-control" value="<?=$pat->patient_last_name;?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Gender</label>
															<input readonly type="text" class="form-control" value="<?=$pat->gender;?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Date Of Birth</label>
															<input readonly type="text" class="form-control" value="<?=$pat->date_of_birth;?>">
															</div>
														</div>
														
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Address:</label>
																<textarea readonly rows="5" cols="5" class="form-control" placeholder="Enter Address here"><?=$pat->address;?></textarea>
															</div>
														</div>
														
													</div>
												</div>
												
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<label>City</label>
															<input readonly type="text" class="form-control" value="<?=$pat->city;?>">
														</div>
														<div class="col-md-4">
															<label>State</label>
															<input readonly type="text" class="form-control" value="<?=$pat->state;?>" read>
														</div>
														<div class="col-md-4">
															<label>Pincode</label>
															<input readonly type="text" class="form-control" value="<?=$pat->pincode;?>" >
														</div>
													</div>
												</div>

												

						                        <div class="form-group">
						                        	<div class="row">
						                        		<div class="col-md-4">
															<label>Phone Number</label>
															<input readonly type="text" class="form-control" value="<?=$pat->mobile_number;?>" >
															
						                        		</div>

														
														<div class="col-md-4">
															<div class="form-group">
																<label>Email ID</label>
															<input readonly type="text" class="form-control" value="<?=$pat->email_id;?>" >
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Marital Status</label>
															<input readonly type="text" class="form-control" value="<?=$pat->marital_status;?>">
															</div>
														</div>
						                        	</div>
						                        </div>

						                   
											</form>
										</div>
									</div>
																		
								
									<!-- /account settings -->




									<!-- Account settings -->
								
					<?php } ?>		
			</div>
			<div class="tab-pane fade" id="medicalinfo">
					
					<div class="panel panel-flat">
						<div class="panel-heading">
								<h6 class="panel-title">Medical Information</h6>
										<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="collapse"></a></li>
							                		
							                	</ul>
						                </div>
						</div>

						<div class="panel-body">
						<form action="#">
							<?php 
										 foreach ($patientMedicalInfo as $medical) {	?>
												
								<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Height</label>
												<input readonly type="text" value="<?=$medical->height;?>" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Weight</label>
												<input readonly type="text" value="<?=$medical->weight;?>" class="form-control">
										</div>

									</div>			
								</div>
								</div>
								<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Blood Group</label>
												<input readonly type="text" value="<?=$medical->bloodgroup;?>" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Allergy</label>
												<input readonly type="text" value="<?=$medical->allergy;?>" class="form-control">
										</div>
										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Genetic Disease</label>
												<input readonly type="text" value="<?=$medical->genetic_disease;?>" class="form-control">
										</div>
										
									</div>				
								</div>
								</div>
							<?php } ?>
						</form>
						</div>
					</div>
						
			</div>

			
		</div>
				</div>
				</div>


				<div class="col-lg-3">
					<!-- User thumbnail -->
				
					<div class="thumbnail">
						<div class="thumb thumb-rounded thumb-slide">
								<img src="<?php echo base_url();?>/patientimg/<?php echo $pat->patientimg;?>" alt="<?=$pat->patientimg;?>">
								
								</div>
							
						
					    	<div class="caption text-center">
					    		<h6 class="text-semibold no-margin"><?=$pat->patient_first_name;?> </h6>

					    	
					    </div>
				    				
				    	<!-- /user thumbnail -->
		    	</div>
		    	   		
			</div>
		<!-- /main content -->
		</div>
			<!-- /page content -->
	</div>
		</div>	
	

	<!-- /page container -->


	<!-- Footer -->
	<?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->



</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
</html>
