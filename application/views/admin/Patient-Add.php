<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/wizard_form.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:52:48 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/client_assets/images/title.png">
	<title>Admin - HugsAndDrugs</title>

	<!-- Global stylesheets -->
     <?php
       $this->load->view("admin/templates/admin-header-links");

     ?>
     <script type="text/javascript" src="<?php echo base_url();?>/assets/js/Patient-Add-Validation.js"></script>
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
	<!-- Header -->
	<?php $this->load->view("admin/templates/admin-header");?>
	<!-- /Header -->




	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php $this->load->view("admin/templates/admin-side-bar"); ?>
			<!-- /main sidebar -->



			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Basic setup -->
	            <div class="panel panel-white">
					<div class="panel-heading">
						<h6 class="panel-title">Patient Information</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					
                	<form class="form-validation" method="POST" id="patientadd"  enctype="multipart/form-data" onsubmit="insert();">
						<fieldset class="step" id="step1">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Personal info
								<small class="display-block">Column with <span class="text-danger">*</span> are compulsory.</small>
							</h6>
							
									<div class="row">
										<div class="form-group col-md-4">
										
										<label>First Name: <span class="text-danger">*</span></label>
										<input name="first_name" id="first_name" type="text" class="form-control required"  placeholder="Enter First Name">	
										</div>
										<div class="form-group col-md-4">

										<label>Middle Name: <span class="text-danger">*</span></label>
										<input type="text" name="middle_name" id="middle_name" class="form-control required"  placeholder="Enter Middle Name">
										</div>
										<div class="form-group col-md-4">
										<label>Last Name: <span class="text-danger">*</span></label>
										<input type="text" name="last_name" id="last_name" class="form-control required"  placeholder="Enter Last Name">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-4">
										<label>Mobile: <span class="text-danger">*</span></label>
										<input type="text" class="form-control required"
										id="mobile" name="mobile" placeholder="Enter Mobile Number">
										</div>
										<div class="form-group col-md-8">
										<label>Email:</label>
										<input type="email" id="email" name="email" class="form-control" placeholder="Enter Email-id">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
										<label>Password: <span class="text-danger">*</span></label>
										<input type="password" name="password" class="form-control required" id="password" placeholder="Your strong password">
										</div>
										<div class="form-group col-md-6">
										<label>Re-type Password: <span class="text-danger">*</span></label>
										<input type="password" name="repassword" class="form-control required" id="repassword" placeholder="Your strong password">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
										<label>Birth Date:</label>
										<input type="date" class="form-control" name="dateofbirth" id="dateofbirth" placeholder="Enter Birthdate">
										</div>
										<div class="form-group col-md-6">
										<label class="display-block">Gender: <span class="text-danger">*</span></label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="gender"  value="Male" checked="checked">
											Male
										</label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="gender" value="Female">
											Female
										</label>
										<label class="radio-inline">
											<input type="radio" class="styled" name="gender" value="Other">
											Other
										</label>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
										<label>Address:</label>
										<textarea id="address" name="address" rows="5" cols="5" class="form-control" placeholder="Enter Address"></textarea>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-3">
										<label>Pincode:</label>
										<input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter Pincode">
										</div>
										<div class="form-group col-md-3">
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
										<div class="form-group col-md-3">
										<label>State:</label>
										<select onchange="getCity(this)" class="select form-control" id="state" name="state">
											<option value="">Select</option>
										</select>
										</div>
										<div class="form-group col-md-3">
										<label>City:</label>
										<select class="select form-control" id="city" name="city">
											<option value="">Select</option>
										</select>
										</div>
									</div>
									
									<div class="row">
										<div class="form-group col-md-6">
										<label class="display-block">Marital Status:</label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="marital_status"  value="Yes">
											Yes
										</label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="marital_status"  value="No" checked="checked">
											No
										</label>
										
										</div>
										<div class="form-group col-md-6">
										<label class="control-label">Upload Your Image :</label>

										<input type="file" class="file-styled" name="patientimg" id="patientimg">
										<?php require('plugin_view_image.php'); ?>	

									</div>
									</div>							
						</fieldset>
						<!-- /personal info-->

						<!-- Medical info-->
						<fieldset class="step" id="step2">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">2</span>
								Medical Info
								<small class="display-block">Let us know about your Medical Info</small>
							</h6>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
										<label>Height:</label>
										<input type="number" name="height" id="height" class="form-control" placeholder="Enter Height" min="0.00" max="1000.00">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
										<label>Weight:</label>
										<input type="number" name="weight" id="weight" class="form-control" placeholder="Enter Weight" min="0.00" max="1000.00">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
										<label>Blood Group:</label>
										<select class="select form-control" name="bloodgroup" id="bloodgroup">
											<option value="">----SELECT----</option>
											<option value="A+">A+</option>
											<option value="A-">A-</option>
											<option value="B+">B+</option>
											<option value="B-">B-</option>
											<option value="AB+">AB+</option>
											<option value="AB-">AB-</option>
											<option value="O+">O+</option>
											<option value="O-">O-</option>
										</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
										<div class="form-group">
											<label>Allergy:</label>
											<textarea name="allergy" id="allergy" rows="1" cols="1" class="form-control" placeholder="Enter Allergy"></textarea>
										</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
										<div class="form-group">
										<label>Genetic Disease:</label>
										<textarea name="genaticdis" id="genaticdis" rows="1" cols="1" class="form-control" placeholder="Enter Allergy"></textarea>
										</div>
										</div>
									</div>

									
						</fieldset>

						<div class="form-wizard-actions">
							<button class="btn btn-default" id="back" type="reset">Back</button>
							<button class="btn btn-info" id="next" type="submit">Save</button>
						</div>
					</form>
	            </div>
	            <!-- /basic setup -->

	        </div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
    <?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->
	
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/pages/dashboard.js"></script>
    
</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/wizard_form.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:52:50 GMT -->
</html>
