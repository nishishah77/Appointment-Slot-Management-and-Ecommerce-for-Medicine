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
<?php $this->load->view("admin/templates/admin-header-links"); ?>

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<!-- /theme JS files -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/Doctor-Add-Validation.js"></script>
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
	<?php $this->load->view("admin/templates/admin-main-nav"); ?>
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


			<!-- Main content -->
			 <div class="panel panel-white">
					<div class="panel-heading">
						<h6 class="panel-title">Doctor Information</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		
		                	</ul>
	                	</div>
					</div>

                	<form class="form-validation" method="POST" action="insert" enctype="multipart/form-data" onsubmit="insert();">
						<fieldset class="step" id="step1">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Personal info
								<small class="display-block">Tell us a bit about yourself</small>
							</h6>
							<div class="row">								
								<div class="form-group col-md-12">
										<label>Doctor Name:</label>
										<input type="text" name="doctorname" id="doctorname" class="form-control required" placeholder="Enter Name">
								</div>
							</div>
							<div class="row">
									<div class="form-group col-md-3">
										<label>Qualification:</label>
										<input type="text" name="qualification" id="qualification" class="form-control required" placeholder="Enter Qualification">
									</div>
									
									<div class="form-group col-md-3">
										<label>Speciality:</label>
										<select  class="bootstrap-select required" name="speciality" id="speciality">
											<option value="">Select</option>

											<?php
												foreach ($DoctorSpecialityList as $speciality ) {
													echo "<option value=".$speciality->speciality_id.">".$speciality->doctor_speciality."</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group col-md-3">
										<label>Birth Date:</label>
										<input type="date" name="birthdate" id="birthdate" class="form-control required" placeholder="Enter Date Of Birth" max="1996-01-01" min="1958-01-01">
									</div>
									<div class="form-group col-md-3">
										<label class="display-block">Gender:</label>

										<label class="radio-inline">	
											<input type="radio" class="styled" name="gender" id="gender" value="Male" checked="checked">
											Male
										</label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="gender" id="gender" value="Female">
											Female
										</label>

									</div>

							</div>
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label>Address:</label>
										<textarea placeholder="Enter Address" class="form-control required" name="address" id="address"></textarea>
										</div>
									</div>
									
							</div>
							<div class="row">
								<div class="col-md-12">			
									 							
											<div class="form-group">
											<label>Email Id:</label>
											<input type="text" name="email" id="email" class="form-control required" placeholder="Enter Email Id">
											</div>
									
 									
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Pincode:</label>
										<input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter PinCode">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Country:</label>
										<select onchange="getState(this)" class="bootstrap-select" id="country" name="country">
											<option value="">Select</option>
											<?php
												foreach ($countryList as $country ) {
													echo "<option value=".$country->country_id.">".$country->country_name."</option>";
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>State:</label>
										<select onchange="getCity(this)" class="bootstrap-select" id="state" name="state">
											
										</select>
									</div>
								</div>
								
								<div class="form-group col-md-3">
											<label>City:</label>
											<select class="bootstrap-select" id="city" name="city">
											
											</select>
										</div>
								</div>	
							

							<div class="row">
								<div class="form-group col-md-3">
										<label>Contact Number:</label>
										<input type="text" name="contactnumber" id="contactnumber" class="form-control required" placeholder="Enter Contact Number">
									</div>
								<div class="col-md-3">	
									<div class="form-group">
										<label>Consultancy Fees:</label>
										<input type="text" name="consultancyfee" id="consultancyfee" class="form-control required" placeholder="Enter Consultancy Fees">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Rate:</label>
										<input type="text" name="rate" id="rate" class="form-control" placeholder="Enter Rate">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Experience:</label>
										<input type="text" name="experience" id="experience" class="form-control required" placeholder="Enter your Experience">
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Password:</label>
										<input type="Password" name="password" id="password" class="form-control required" placeholder="Enter Password">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Re-type Password:</label>
										<input type="Password" name="repassword" id="repassword" class="form-control required" placeholder="Enter Password">
									</div>
								</div>
								<div class="form-group col-md-4">
										<label class="control-label">Upload Your Image :</label>

										<input type="file" class="file-styled" name="doctorimg" id="doctorimg">
									</div>
							</div>
						</fieldset>
						<!-- /personal info-->

						<!-- Medical info-->
						<fieldset class="step" id="step2">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">2</span>
								Visiting Hospital Info
								<small class="display-block">Let us know about your Visiting Info</small>
							</h6>
						<div class="row" id="selectdiv">
							<div class="row">
								<div class="col-md-11">
									
										<div class="form-group col-md-12">
											<label>Hospital</label>
											<select class="bootstrap-select" data-width="100%"  id="hospital" name="hospital">
											<option value="">Select</option>
											<?php
												foreach ($hospitalList as $hospital_information ) {
													echo "<option value=".$hospital_information->hospital_id.">".$hospital_information->hospital_name."</option>";
												}
											?>
											</select>
										</div>								
								
								</div>
							</div>
						</div>
					
						</fieldset>
						

						<div class="form-wizard-actions">
							<button class="btn btn-default" id="basic-back" type="reset">Back</button>
							<button class="btn btn-info" id="basic-next" type="submit">Next</button>
						</div>
					</form>
	            </div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
	<?php $this->load->view("admin/templates/admin-footer"); ?>
	<!-- /footer -->
</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
</html>
