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
					<?php require('plugin_view_image.php'); ?>	
                	<form class="form-validation" id="patient-edit-form" method="POST" 
                	enctype="multipart/form-data" action="update" onsubmit="update();">
						<fieldset class="step" id="step1">
							<?php 
								foreach ($patientList as $pat) {	?>
										
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Personal info
								<small class="display-block">Column with <span class="text-danger">*</span> are compulsory.</small>
							</h6>
							
									<div class="row">
										<div class="form-group col-md-4">
										 <input type="hidden" name="patient_id" value="<?=$pat->patient_information_id;?>" id="patient_id">
										 <input type="hidden" name="image" value="<?=$pat->patientimg;?>" id="image">										 
										<label>First Name: <span class="text-danger">*</span></label>
										<input name="first_name" id="first_name" type="text" class="form-control required"  placeholder="Enter First Name" 
										value="<?=$pat->patient_first_name;?>">	
										</div>
										<div class="form-group col-md-4">

										<label>Middle Name: <span class="text-danger">*</span></label>
										<input type="text" name="middle_name" id="middle_name" class="form-control required"  placeholder="Enter Middle Name" value="<?=$pat->patient_middle_name;?>">
										</div>
										<div class="form-group col-md-4">
										<label>Last Name: <span class="text-danger">*</span></label>
										<input type="text" name="last_name" id="last_name" class="form-control required"  placeholder="Enter Last Name" value="<?=$pat->patient_last_name;?>">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-4">
										<label>Mobile: <span class="text-danger">*</span></label>
										<input type="text" class="form-control required"
										id="mobile" name="mobile" placeholder="Enter Mobile Number" value="<?=$pat->mobile_number;?>">
										</div>
										<div class="form-group col-md-8">
										<label>Email:</label>
										<input type="email" id="email" name="email" class="form-control" placeholder="Enter Email-id" value="<?=$pat->email_id;?>">
										</div>
									</div>

									
									<div class="row">
										<div class="form-group col-md-6">
										<label>Birth Date:</label>
										<input type="date" class="form-control" name="dateofbirth" id="dateofbirth" placeholder="Enter Birthdate" value="<?=$pat->date_of_birth;?>">
										</div>
										<div class="form-group col-md-6">
										<label class="display-block">Gender: <span class="text-danger">*</span></label>

										<label class="radio-inline">
											<?php 
											if(strtolower($pat->gender)=='male'){
											?>	
												<input type="radio" class="styled" name="gender"  
											  value="<?=$pat->gender;?>" checked="checked" >
										
										<?php	}else{	?>
												<input type="radio" class="styled" name="gender"  
											  value="<?=$pat->gender;?>" >
										<?php }
											?>
											Male
										</label>

										<label class="radio-inline">
											<?php 
											if(strtolower($pat->gender)=='female'){
											?>	
												<input type="radio" class="styled" name="gender"  
											  value="<?=$pat->gender;?>" checked="checked" >
										
										<?php	}else{	?>
												<input type="radio" class="styled" name="gender"  
											  value="<?=$pat->gender;?>" >
										<?php }
											?>

											Female
										</label>
										<label class="radio-inline">
											<?php 
											if(strtolower($pat->gender)=='other'){
											?>	
												<input type="radio" class="styled" name="gender"  
											  value="<?=$pat->gender;?>" checked="checked" >
										
										<?php	}else{	?>
												<input type="radio" class="styled" name="gender"  
											  value="<?=$pat->gender;?>" >
										<?php }
											?>
											Other
										</label>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
										<label>Address:</label>
										<textarea id="address" name="address" rows="5" cols="5" class="form-control" placeholder="Enter Address"><?=$pat->address;?></textarea>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-3">
										<label>Pincode:</label>
										<input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter Pincode" value="<?=$pat->pincode;?>">
										</div>
										<div class="form-group col-md-3">
										<label>Country:</label>
										<select onchange="getState(this)" class="select form-control" id="country" name="country" value="<?=$pat->country;?>">
											<option value="">Select</option>
											<?php
												foreach ($countryList as $country ) {
													if($pat->country==$country->country_id){
													echo "<option selected value=".$country->country_id.">".$country->country_name."</option>";
													}else{
													echo "<option value=".$country->country_id.">".$country->country_name."</option>";
												}
												}
											?>
										</select>
										</div>
										<div class="form-group col-md-3">
										<label>State:</label>
										<select onchange="getCity(this)" class="select form-control" id="state" name="state" value="<?=$pat->state;?>">
											<option value="">Select</option>
											<?php
												foreach ($stateList as $state ) {
													if($pat->state==$state->state_id){
													echo "<option selected value=".$state->state_id.">".$state->state_name."</option>";
													}else{
													echo "<option value=".$state->state_id.">".$state->state_name."</option>";
												}
												}
											?>
										</select>
										</div>
										<div class="form-group col-md-3">
										<label>City:</label>
										<select class="select form-control" id="city" name="city" value="<?=$pat->city;?>">
											<option value="">Select</option>
											<?php
												foreach ($cityList as $city ) {
													if($pat->city==$city->city_id){
													echo "<option selected value=".$city->city_id.">".$city->city_name."</option>";
													}else{
													echo "<option value=".$city->city_id.">".$city->city_name."</option>";
												}
												}
											?>
										</select>
										</div>
									</div>
									
									<div class="row">
										<div class="form-group col-md-6">
										<label class="display-block">Marital Status:</label>

										<label class="radio-inline">
											<?php if($pat->marital_status=='Yes'){
											?>	
											<input type="radio" class="styled" name="marital_status" value="Yes" checked="checked">

										
										<?php	}else{	?>
											<input type="radio" class="styled" name="marital_status" value="Yes">

										<?php }
											?>
											Yes
										</label>

										<label class="radio-inline">
											<?php if($pat->marital_status=='No'){
											?>	
											<input type="radio" class="styled" name="marital_status" value="No" checked="checked">

										
										<?php	}else{	?>
											<input type="radio" class="styled" name="marital_status" value="No">

										<?php }
											?>
											No
										</label>
										
										</div>
										<div class="form-group col-md-6">
										<label class="control-label">Select Image :</label>

										<input type='file' onchange="readURL(this);" name="patientimg" id="patientimg" class="file-styled" />

                           				 <img src="/hugsanddrugs/patientimg/<?=$pat->patientimg;?>" id="blah" width="200px" alt="<?=$pat->patientimg;?>" class="file-styled" />
									</div>
									</div>							
							<?php } ?>
						</fieldset>
								<fieldset class="step" id="step2">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">2</span>
								Medical Info
								<small class="display-block">Let us know about your Medical Info</small>
							</h6><?php 
										 foreach ($patientMedicalInfo as $medical) {	
										 	
										 	$height = $medical->height;
										 	$weight = $medical->weight;
										 	$bloodgroup = $medical->bloodgroup;
										 	$allergy = $medical->allergy;
										 	$genetic_disease = $medical->genetic_disease;
										 }
										 	?>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
										<label>Height:</label>
										<input type="number" name="height" id="height" class="form-control" placeholder="Enter Height" min="0.00" max="1000.00" value="<?=$height;?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
										<label>Weight:</label>
										<input type="number" name="weight" id="weight" class="form-control" placeholder="Enter Weight" min="0.00" max="1000.00" value="<?=$weight;?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
										<label>Blood Group:</label>
										<select class="select form-control" name="bloodgrp" id="bloodgrp" >
											<option value="">----SELECT----</option>
											<option value="A+" <?php if($bloodgroup=="A+") echo "selected"; else echo ""; ?>>A+</option>
											<option value="A-" <?php if($bloodgroup=="A-") echo "selected"; else echo ""; ?>>A-</option>
											<option value="B+" <?php if($bloodgroup=="B+") echo "selected"; else echo ""; ?>>B+</option>
											<option value="B-" <?php if($bloodgroup=="B-") echo "selected"; else echo ""; ?>>B-</option>
											<option value="AB+" <?php if($bloodgroup=="AB+") echo "selected"; else echo ""; ?>>AB+</option>
											<option value="AB-" <?php if($bloodgroup=="AB-") echo "selected"; else echo ""; ?>>AB-</option>
											<option value="O+" <?php if($bloodgroup=="O+") echo "selected"; else echo ""; ?>>O+</option>
											<option value="O-" <?php if($bloodgroup=="O-") echo "selected"; else  echo ""; ?>>O-</option>
										</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
										<div class="form-group">
											<label>Allergy:</label>
											<textarea name="allergy" id="allergy" rows="1" cols="1" class="form-control" placeholder="Enter Allergy"><?=$allergy;?></textarea>
										</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
										<div class="form-group">
										<label>Genetic Disease:</label>
										<textarea name="genaticdis" id="genaticdis" rows="1" cols="1" class="form-control" placeholder="Enter Allergy"><?=$genetic_disease;?></textarea>
										</div>
										</div>
									</div>

								
						</fieldset>
						<div class="form-wizard-actions">
							<button class="btn btn-default" id="back" type="reset">Back</button>
							<button class="btn btn-info" id="next" type="submit" name="next1">Save</button>
																	<!-- <?php //} ?> -->

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
