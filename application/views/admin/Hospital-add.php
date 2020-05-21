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
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/Hospital-Add-Validation.js"></script>
     <style >
     	.errClass{
 			border-color:transparent transparent #D84315;
 			-webkit-box-shadow:none;
 			box-shadow:none
     	}
		.errClass:focus {
		 border-color:transparent transparent #D84315;
 		-webkit-box-shadow:0 1px 0 #D84315;
 		box-shadow:0 1px 0 #D84315
		}

     </style>
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
			<?php $this->load->view("admin/templates/admin-side-bar");?>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				 	<div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">Hospital Information</h6>
							<div class="heading-elements">
								<ul class="icons-list">
		                			<li><a data-action="collapse"></a></li>
		                			
		                		</ul>
	                		</div>
						</div>
						<!-- Basic layout-->
						<form class="form-validation" method="POST" action="insert" enctype="multipart/form-data" onsubmit="insert();">
							<fieldset class="step" id="step1">
								<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Hospital info
								<small class="display-block">Column with <span class="text-danger">*</span> are compulsory.</small>
								</h6>

								<div class="row">
									<div class="form-group col-md-12">
										<label>Hospital Name: <span class="text-danger">*</span></label>
										<input name="hospitalname" id="hospitalname" type="text" class="form-control required"  placeholder="Enter Hospital Name">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label>Contact Number: <span class="text-danger">*</span></label>
										<input type="text" name="contactnumber" id="contactnumber" class="form-control required" placeholder="Enter Contact Number">
									</div>
									<div class="form-group col-md-4">
										<label>Speciality:</label>
										<select class="select form-control" id="speciality" name="speciality">
											<option value="">--Select Speciality--</option>
											<?php
											foreach ($HospitalSpecialityList as $speciality) {
												?>
											<option value="<?php echo $speciality->speciality_id;?>"
												><?php echo $speciality->hospital_speciality;?></option>
												<?php
												}	
												?>

										</select>
									</div>
									<div class="form-group col-md-4">
										<label class="control-label">Upload Your Image :</label>

										<input type="file" class="file-styled" name="hospitalimg" id="hospitalimg">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-12">
										<label>Address:</label>
										<textarea rows="3" cols="3" name="address" id="address" class="form-control" placeholder="Enter Address here"></textarea>
									</div>
									
								</div>
								<div class="row">
									
							    <div class="form-group col-md-12">
							    	<label>Email Id:</label>
										<input name="email" id="email" type="email" class="form-control required"  placeholder="Enter Email Id">

								</div>
							</div>								
								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Password:</label>
										<input type="Password" name="password" id="password" class="form-control required" placeholder="Enter Password">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Re-type Password:</label>
										<input type="Password" name="repassword" id="repassword" class="form-control required" placeholder="Enter Password">
									</div>
								</div>
							</div>
								<div class="row">
									
									
									<div class="col-md-4">
									<div class="form-group">
										<label>Country:</label>
										<select onchange="getState(this)" class="select form-control" id="country" name="country">
											<option value="">Select</option>
											<?php
												foreach ($countryList as $country ) {
													echo "<option value=".$country->country_id.">".$country->country_name."</option>";
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>State:</label>
										<select onchange="getCity(this)" class="select form-control" id="state" name="state">
											
										</select>
									</div>
								</div>
								
								<div class="form-group col-md-4">
											<label>City:</label>
											<select class="select form-control" id="city" name="city">
											
											</select>
										</div>
								</div>
								<div class="row">
									<div class="form-group col-md-12">
										<label>Open Time</label>
										<input type="text" name="open_time" id="open_time" class="form-control">
									</div>
								</div>
							<div class="form-wizard-actions">
								<button class="btn btn-info" id="next" type="submit">Save</button>
							</div>
								
							
						</form>
						<!-- /basic layout -->
					</div>
			</div>

		</div>
			<!-- /main content -->

	</div> 
		<!-- /page content -->

	<!-- /page container -->


	<!-- Footer -->
	<?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/pages/dashboard.js"></script>
</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
</html>
