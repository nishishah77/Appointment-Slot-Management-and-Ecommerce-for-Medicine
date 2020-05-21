<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/client_assets/images/title.png">

	<title> Admin - HugsAndDrugs</title>

	<!-- Global stylesheets -->
	<?php $this->load->view("admin/templates/admin-header-links");?>
	<!-- /theme JS files -->

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


			
	<!-- Toolbar -->
				<div class="navbar navbar-default navbar-xs navbar-component no-border-radius-top">
					<ul class="nav navbar-nav visible-xs-block">
						<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>

					<div class="navbar-collapse collapse" id="navbar-filter">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#activity" data-toggle="tab">Personal Info</a></li>
							<li><a href="#schedule" data-toggle="tab">Doctor Hospital Info</a></li>

						</ul>

						
					</div>
				</div>
	<!-- /toolbar -->


			<!-- User profile -->
			
				<div class="col-lg-9">
					<div class="tabbable">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="activity">
								<?php 
										 foreach ($doctorList as $doc) {	?>
								<div class="row">
									<!-- Profile info -->
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
														<div class="col-md-6">
															<label>Name</label>
															<input readonly type="text" value="<?=$doc['doctor_name'];?>" class="form-control">
														</div>
														<div class="col-md-6">
															<label>Qualification</label>
															<input readonly type="text" value="<?=$doc['qualification'];?>" class="form-control">
														</div>
													
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Speciality</label>
															<input readonly type="text" value="<?=$doc['doctor_speciality'];?>" class="form-control">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Date Of Birth</label>
															<input readonly type="text" value="<?=$doc['date_of_birth'];?>" class="form-control">
															</div>
														</div>
														
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Address:</label>
																<textarea readonly rows="5" cols="5" class="form-control" placeholder="Enter Address here"><?=$doc['address'];?></textarea>
															</div>
														</div>
														
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<label>Experience</label>
															<input readonly type="text" value="<?=$doc['experience'];?>" class="form-control">
														</div>
														<div class="col-md-4">
															<label>Rating</label>
															<input readonly type="text" value="<?=$doc['rate'];?>" class="form-control">
														</div>
														<div class="col-md-4">
															<label>Fees</label>
															<input readonly type="text" value="<?=$doc['consultancy_fees'];?>" class="form-control">
														</div>
													</div>
												</div>

												
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<label>City</label>
															<input readonly type="text" value="<?=$doc['city'];?>" class="form-control">
														</div>
														<div class="col-md-4">
															<label>State</label>
															<input readonly type="text" value="<?=$doc['state'];?>" class="form-control">
														</div>
														<div class="col-md-4">
															<label>Pincode</label>
															<input readonly type="text" value="<?=$doc['pincode'];?>" class="form-control">
														</div>
													</div>
												</div>

												

						                        <div class="form-group">
						                        	<div class="row">
						                        		<div class="col-md-4">
															<label>Phone Number</label>
															<input readonly type="text" value="<?=$doc['contact_number'];?>" class="form-control">
						                        		</div>

														
														<div class="col-md-4">
															<div class="form-group">
																<label>Email ID</label>
															<input readonly type="text" value="<?=$doc['email_id'];?>" class="form-control">
															</div>
														</div>
														<div class="col-md-4">
															
														</div>
						                        	</div>
						                        </div>

						                    <?php } ?>
											</form>
										</div>
									</div>
									<!-- /profile info -->
									
									 <!--/account settings--> 
								</div>
							</div>

		<div class="tab-pane fade" id="schedule">
			<div class="row">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">Doctor Hospital Info</h6>
							<div class="heading-elements">
								<ul class="icons-list">
				            		<li><a data-action="collapse"></a></li>
						       	</ul>
					        </div>
					</div>

						<div class="panel-body">
							<form action="#">
								<?php 
										 foreach ($hospital_name_of_doctor as $hospital) {
						
												$hospital_name = $hospital['hospital_name'];
							 } ?>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Visitng Hospital Name</label>
												<input readonly type="text" value="<?=$hospital_name;?>" class="form-control">
										</div>
									</div>
												
								</div>
							</div>
						
						</form>
					</div>
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
								<img src="<?php echo base_url();?>/doctorimg/<?=$doc['doctorimg'];?>" alt="">
								
								</div>
							
						
					    	<div class="caption text-center">
					    		<h6 class="text-semibold no-margin"><?=$doc['doctor_name'];?></h6>
					    		
				    			
					    	
					    </div>
				    				
				    	 <!--/user thumbnail-->
		    </div>	    		
		</div>
			
	</div>
	</div>
								

						

					
				
				<!-- /user profile -->
			<!-- /main content -->
		
			<!-- /page content -->
	

	<!-- /page container -->


	<!-- Footer -->
	<?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->



</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
</html>
