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

                	<form class="form-validation" id="doctor-edit-form" method="POST"  enctype="multipart/form-data" onsubmit="update();">
						<fieldset class="step" id="step1">

							<?php 
										 foreach ($doctorList as $doc) {	?>
							
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Personal info
								<small class="display-block">Tell us a bit about yourself</small>
							</h6>
							<div class="row">								
								<div class="form-group col-md-12">
									<input type="hidden" name="doctor_id" id="doctor_id" value="<?=$doc->doctor_id;?>">
									<input type="hidden" name="image" id="image" value="<?=$doc->doctorimg;?>">									
										<label>Doctor Name:</label>
										<input type="text" name="doctorname" id="doctorname" value="<?=$doc->doctor_name;?>" class="form-control required" placeholder="Enter Name">
								</div>
							</div>
							<div class="row">
									<div class="form-group col-md-3">
										<label>Qualification:</label>
										<input type="text" name="qualification" value="<?=$doc->qualification;?>" id="qualification" class="form-control required" placeholder="Enter Qualification">
									</div>
									
									<div class="form-group col-md-3">
										<label>Speciality:</label>
										<select class="bootstrap-select" value="<?=$doc->specialty;?>" name="speciality" id="speciality">
										
											<?php
												foreach ($DoctorSpecialityList as $speciality ) {
													if($speciality->doctor_speciality==$doctor_information->doctor_id){
														echo "<option selected value=".$speciality->speciality_id.">".$speciality->doctor_speciality."</option>";
													}else{
													echo "<option value=".$speciality->speciality_id.">".$speciality->doctor_speciality."</option>";
													}
												}
											?>

										</select>
									</div>
									<div class="form-group col-md-3">
										<label>Birth Date:</label>
										<?php
										
										?>
										<input type="date" name="birthdate"  value="<?=$doc->date_of_birth;?>" id="birthdate" class="form-control" placeholder="Enter Date Of Birth" max="1996-01-01" min="1958-01-01">
									</div>
									<script type="text/javascript">
										$(document).ready(function(){
											$("#birthdate").datepicker("setDate","<?php echo $BirthDate;?>");
										});
									</script>
									
									<div class="form-group col-md-3">
										<label class="display-block">Gender: <span class="text-danger">*</span></label>

										<label class="radio-inline">
											<?php 
											if(strtolower($doc->gender)=='male'){
											?>	
												<input type="radio" class="styled" name="gender"  
											  value="<?=$doc->gender;?>" checked="checked" >
										
										<?php	}else{	?>
												<input type="radio" class="styled" name="gender"  
											  value="<?=$doc->gender;?>" >
										<?php }
											?>
											Male
										</label>

										<label class="radio-inline">
											<?php 
											if(strtolower($doc->gender)=='female'){
											?>	
												<input type="radio" class="styled" name="gender"  
											  value="<?=$doc->gender;?>" checked="checked" >
										
										<?php	}else{	?>
												<input type="radio" class="styled" name="gender"  
											  value="<?=$doc->gender;?>" >
										<?php }
											?>

											Female
										</label>
										
										</div>

							</div>
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label>Address:</label>
										<textarea placeholder="Enter Address"  class="form-control" name="address" id="address"><?=$doc->address;?></textarea>
										</div>
									</div>
									
							</div>
							
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Pincode:</label>
										<input type="text" name="pincode" value="<?=$doc->pincode;?>" id="pincode" class="form-control" placeholder="Enter PinCode">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Country:</label>
										<select onchange="getState(this)" class="bootstrap-select" id="country" name="country" value="<?=$doc->country;?>">
											<option value="">Select</option>
											<?php
												foreach ($countryList as $country ) {
													if($doc->country==$country->country_id){
													echo "<option selected value=".$country->country_id.">".$country->country_name."</option>";
													}else{
													echo "<option value=".$country->country_id.">".$country->country_name."</option>";
												}
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>State:</label>
										<select onchange="getCity(this)" class="bootstrap-select" id="state" name="state" value="<?=$doc->state;?>">
											<?php
												foreach ($stateList as $state ) {
													if($doc->state==$state->state_id){
													echo "<option selected value=".$state->state_id.">".$state->state_name."</option>";
													}else{
													echo "<option value=".$state->state_id.">".$state->state_name."</option>";
												}
												}
											?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-md-3">
											<label>City:</label>
											<select class="bootstrap-select" id="city" name="city" value="<?=$doc->city;?>">
											<?php
												foreach ($cityList as $city ) {
													if($doc->city==$city->city_id){
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
								<div class="form-group col-md-3">
										<label>Contact Number:</label>
										<input type="text" name="contactnumber" id="contactnumber" class="form-control required" placeholder="Enter Contact Number" value="<?=$doc->contact_number;?>">
									</div>
								<div class="col-md-3">	
									<div class="form-group">
										<label>Consultancy Fees:</label>
										<input type="text" name="consultancyfee" id="consultancyfee" class="form-control" value="<?=$doc->consultancy_fees;?>" placeholder="Enter Consultancy Fees">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Rate:</label>
										<input type="text" name="rate" id="rate" value="<?=$doc->rate;?>" class="form-control" placeholder="Enter Rate">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Experience:</label>
										<input type="text" name="experience" id="experience" class="form-control" value="<?=$doc->experience;?>" placeholder="Enter your Experience">
									</div>
								</div>
							</div>	
							<div class="row">
								
								<div class="form-group col-md-6">
										<label class="control-label">Select File :</label>

										<input type='file' onchange="readURL(this);" name="doctorimg" id="doctorimg" class="file-styled" />

                           				 <img src="/hugsanddrugs/doctorimg/<?=$doc->doctorimg;?>" id="blah" width="200px" alt="<?=$doc->doctorimg;?>" class="file-styled" />
									</div>
								
							</div>
										<?php require('plugin_view_image.php'); ?>

						<?php } ?>
						</fieldset>
						<!-- /personal info-->

						<!-- Medical info-->
						<fieldset class="step" id="step2">
							<?php 
							$id=0;
							foreach ($hospital_id_of_doctor as $get_id) {
								$id=$get_id['hospital_id'];
							}
										 foreach ($drvisitinghosinfo as $visiting) {	?>
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">2</span>
								Visiting Hospital Info
								<small class="display-block">Let us know about your Visiting Info</small>
							</h6>
							<div class="row">
								<div class="col-md-11" id="selectdiv" >
									<div class="row">
										<div class="form-group col-md-12">
											<label>Hospital</label>
											<select class="bootstrap-select" data-width="100%"   id="hospital">
												<option value="">--Select Hospital--</option>
											<?php
												foreach ($hospitalList as $hospital_information ) {
													?>
													<option value="<?php echo $hospital_information->hospital_id;?>" <?php
												if($hospital_information->hospital_id==$id){ echo "selected"; }else{ echo ""; }

														?>

														><?php echo $hospital_information->hospital_name?></option>
													<?php
												}

																			
											?>
											</select>
										</div>								
								
								    </div>
								</div>
								
							</div>
						
						<?php } 
						?>
						</fieldset>

						

						<div class="form-wizard-actions">
							<button class="btn btn-default" id="basic-back" type="reset">Back</button>
							<button class="btn btn-info" id="basic-next" type="submit" name="next1">Next</button>
						</div>
					</form>
	            </div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->

	<!-- /footer -->
</body>
</html>
