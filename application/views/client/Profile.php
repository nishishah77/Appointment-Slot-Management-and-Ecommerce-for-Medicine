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
	 
	<script type="text/javascript" src="<?php echo base_url();?>/client_assets/js/Profile.js"></script>
	

    
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	
	
	<!-- SCRIPTS
    
     ================================================== -->
<?php $this->load->view("client/templets/header-links"); ?>

	
<style type="text/css">
	.color {

		color:#9ba4b2;
	}

	select option[selected="selected"] {
  font-style: italic;
  font-weight: bold;
  color:#9ba4b2;
}
</style>

<script type="text/javascript" src="<?php echo base_url();?>client_assets/js/Profile.js"></script>

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
					<h1 class="entry-title">Profile</h1>
					<p>We Know About You</p>
				</div>
				
			</section>
    
    
    
			<!-- Sub Page Content
			============================================= -->
		<div id="sub-page-content" class="clearfix">
				   <?php 



				   ?>
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
											<a href="<?php echo site_url('client/Profile/myappointment?page=myappointment');?>">
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
						
						<h2 class="light bordered">My<span> Profile</span></h2>
					
						<?php
						if(isset($_SESSION['patient_information_id']))
						{
						?>


	<div class="panel-group accordian-style2" id="accordion2">
					  
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							  <i class="fa fa-medkit"></i>Personal Details<i class="fa pull-right fa-angle-down"></i>
							</a>
						  </h4>
						</div>
						
						<div id="collapseOne" class="panel-collapse collapse in">
						  <div class="panel-body">
							<section class="appointment-sec text-center">
					
									<div class="container">
									
						<?php 

						$fname="";
						$mname="";
						$lname="";
						$gender="";
						$dob="";
						$address="";
						$city="";
						$state="";
						$marital_status="";
						$country="";
						$patientimg="";
						$pincode="";
						$newDate="";
						$patient_information_id="";

						foreach ($patientList as $p) {
							$fname = $p->patient_first_name;
							$mname = $p->patient_middle_name;
							$lname = $p->patient_last_name;
							$gender = $p->gender;
							$dob = $p->date_of_birth;
							$address = $p->address;
							$city = $p->city;
							$state = $p->state;
							$country = $p->country;
							$pincode = $p->pincode;
							$marital_status = $p->marital_status;
							$patientimg = $p->patientimg;
							$patient_information_id = $p->patient_information_id;
						}
						$newDate = date("d-m-Y", strtotime($dob));

						$height="";
						$weight="";
						$bloodgrp="";
						$allergy="";
						$genaticdis="";

						foreach($patientMedicalList as $m)
						{
							$height = $m->height;
							$weight = $m->weight;
							$bloodgrp = $m->bloodgroup;
							$allergy = $m->allergy;
							$genaticdis = $m->genetic_disease;
						}
 
                        ?>
						
						   <div class="row">
							

							<div class="col-md-6">
								<center><h1>Personal Details</h1></center>
								<div class="appointment-form clearfix">
								   <div class="success" id="message-app" style="display:none;"></div>
									<form name="profile_form" id="profile_form" method="post"  enctype="multipart/form-data">
										<input type="hidden" name="patient_information_id" id="patient_information_id" value="<?php echo $patient_information_id;?>">
										<input type="hidden" name="image" id="image" value="<?php echo $patientimg;?>">

										<input type="text" name="fname" id="fname" placeholder="First Name" value="<?php echo $fname;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="First Name">
										<input type="text" name="mname" id="mname" placeholder="middle Name" value="<?php echo $mname;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Middle Name">

										<input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php echo $lname;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Last Name">
										
								<input type="text" name="dateofbirth" id="datepicker" placeholder="Birth Date" value="<?php echo $newDate;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Date Of Birth" class="patient_dateofbirth">
										
										
										<select name="gender" id="gender" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Gender">
											<option value="" style="color:#9ba4b2;">Select</option>
											<option 
											<?php
											if($gender=="Male")
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?>
											value="Male">Male</option>
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
											?>

											style="color:#9ba4b2;">Female</option>										
										</select>	
										<textarea id="address" name="address" rows="5" cols="5" class="form-control" placeholder="Enter Address" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Address"><?php echo $address;?></textarea>
										
										<input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter Pincode" value="<?php echo $pincode;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Pincode">
										<select onchange="getState(this)" class="select form-control" id="country" name="country" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Country">

											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($countryList as $c ) {
													
													?>
													<option value="<?php echo $c->country_id;?>"<?php
											if($country==$c->country_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?> style="color:#9ba4b2;" ><?php echo $c->country_name;?></option>
													<?php

													}								?>
										</select>
										
										<select onchange="getCity(this)" class="select form-control" id="state" name="state" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="State">
											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($stateList as $s ) {
													
													?>
											<option value="<?php echo $s->state_id;?>" <?php

											if($state==$s->state_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}

											?>
											style="color:#9ba4b2;"
												>
												<?php echo $s->state_name;?>
													
												</option>
													<?php

													}								?>
										</select>
										<select class="select form-control" id="city" name="city" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="City">
											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($cityList as $c ) {
													
													?>
											<option value="<?php echo $c->city_id;?>" <?php

											if($city==$c->city_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}

											?>
											style="color:#9ba4b2;"
												>
												<?php echo $c->city_name;?>
													
												</option>
													<?php

													}								?>

										</select>
										
										<select name="marital_status" id="marital_status" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Marital Status">
											<option value="" class="color">--Marital Status--</option>
											<option value="Yes"
											<?php
											if($marital_status=="Yes")
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?>
											 style="color:#9ba4b2;"										
											>Yes</option>
											<option value="No"
											<?php
											if($marital_status=="No")
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?>
											 style="color:#9ba4b2;"
											>No</option>
										</select>	

										<input type="file" class="file-styled" name="patientimg" id="patientimg" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Patient Image">

										<img src='<?php echo base_url();?>/patientimg/<?php echo $patientimg;?>' height="100" width="100" data-toggle="tooltip" data-placement="top" title="Patient Image">
										<input type="button" name="submit_personal" onclick="profile_personal();" value="submit" class="btn btn-default btn-rounded">
									</form>
								</div>
							</div>
							
						</div>
						
					
					
							</section>
						  </div>
						</div>
					  </div>
<div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title active">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							  <i class="fa fa-heart"></i>Medical Information<i class="fa fa-angle-down pull-right"></i>
							</a>
						  </h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
						  <div class="panel-body">
						   <section class="appointment-sec text-center">
					
					<div class="container">
						
						
						
						
						<div class="row">
							
								
							
							<div class="col-md-6">

								<div class="appointment-form clearfix">
								   <div class="success" id="message-app" style="display:none;"></div>
									<form name="medical_form" id="medical_form" method="post">
										<input type="hidden" name="patient_information_id" id="patient_information_id" value="<?php echo $patient_information_id;?>">

										<input type="number" name="height" id="height" class="form-control" placeholder="Enter Height" min="0.00" max="1000.00" data-toggle="tooltip" data-placement="top" title="Height" value="<?php echo $height;?>" style="color:#9ba4b2;"> 										
										<input type="number" name="weight" id="weight" class="form-control" placeholder="Enter Weight" min="0.00" max="1000.00" data-toggle="tooltip" data-placement="top" title="Weight" 
										value="<?php echo $weight;?>" style="color:#9ba4b2;">

										<select class="select form-control" name="bloodgrp" id="bloodgrp" data-toggle="tooltip" data-placement="top" title="Blood Group" style="color:#9ba4b2;">
											<option value="" style="color:#9ba4b2;">----SELECT----</option>
											<option value="A+" style="color:#9ba4b2;" <?php if($bloodgrp=="A+"){echo "selected";}else{echo "";}?>>A+</option>
											<option value="A-" style="color:#9ba4b2;"<?php if($bloodgrp=="A-"){echo "selected";}else{echo "";}?>>A-</option>
											<option value="B+" style="color:#9ba4b2;" <?php if($bloodgrp=="B+"){echo "selected";}else{echo "";}?>>B+</option>
											<option value="B-" style="color:#9ba4b2;" <?php if($bloodgrp=="B-"){echo "selected";}else{echo "";}?>>B-</option>
											<option value="AB+" style="color:#9ba4b2;" <?php if($bloodgrp=="AB+"){echo "selected";}else{echo "";}?>>AB+</option>
											<option value="AB-" style="color:#9ba4b2;" <?php if($bloodgrp=="AB-"){echo "selected";}else{echo "";}?>>AB-</option>
											<option value="O+" style="color:#9ba4b2;"<?php if($bloodgrp=="O+"){echo "selected";}else{echo "";}?>>O+</option>
											<option value="O-" style="color:#9ba4b2;" <?php if($bloodgrp=="O-"){echo "selected";}else{echo "";}?>>O-</option>
										</select>										
										<textarea name="allergy" id="allergy" rows="1" cols="1" class="form-control" placeholder="Enter Allergy" data-toggle="tooltip" data-placement="top" title="Allergy" style="color:#9ba4b2;"><?php echo $allergy;?></textarea>

										
										<textarea name="genaticdis" id="genaticdis" rows="1" cols="1" class="form-control" placeholder="Enter Genatic Disease" data-toggle="tooltip" data-placement="top" title="Genatic Disease" style="color:#9ba4b2;"><?php echo $genaticdis;?></textarea>
	
										
										<input type="button" name="submit_medical" onclick="profile_medical();" value="submit" class="btn btn-default btn-rounded">
									</form>
								</div>
							</div>
							
						</div>
						
					
					
				</section>
						  </div>
					 
					  						</div>

				<?php
				}
				if(isset($_SESSION['doctor_id']))
				{
					?>
<div class="panel-group accordian-style2" id="accordion2">
					  
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							  <i class="fa fa-medkit"></i>Doctor Details<i class="fa pull-right fa-angle-down"></i>
							</a>
						  </h4>
						</div>
						
						<div id="collapseOne" class="panel-collapse collapse in">
						  <div class="panel-body">
							<section class="appointment-sec text-center">
					
									<div class="container">
									
						<?php 

						$name="Doctor Name";
						$address="Address";
						$city="";
						$state="";
						$country="";
						$contactno="Contact Number";
						$speciality="";
						$doctorimg="";
						$consultancy_fees="Consultancy Fees";
						$experience="Experience";
						$pincode="Pincode";
						$gender="Gender";
						$dateofbirth="Date Of Birth";
						$qualification="Qualification";

						foreach ($doctorList as $d) {
							$name = $d->doctor_name;
							$gender = $d->gender;
							$dob = $d->date_of_birth;
							$address = $d->address;
							$city = $d->city;
							$state = $d->state;
							$country = $d->country;
							$pincode = $d->pincode;
							$contactno = $d->contact_number;
							$doctorimg = $d->doctorimg;
							$doctor_id = $d->doctor_id;
							$speciality = $d->specialty;
							$consultancy_fees=$d->consultancy_fees;
							$qualification = $d->qualification;
							$experience = $d->experience;
							$doctorimg = $d->doctorimg;
						}

						$newDate = date("m/d/Y", strtotime($dob));


						
						                    

                        ?>
						
						   <div class="row">
							

							<div class="col-md-6">
                            <center><h1>Doctor Details</h1></center>								
								<div class="appointment-form clearfix">
								   <div class="success" id="message-app" style="display:none;"></div>
									<form name="profile_form" id="profile_form" method="post"  enctype="multipart/form-data">
										<input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $_SESSION['doctor_id'];?>">
										<input type="hidden" name="image" id="image" value="<?php echo $doctorimg; ?>">
										<input type="text" name="name" id="name" placeholder="Doctor Name" value="<?php echo $name;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Doctor Name">
										
										
										<textarea id="address" name="address" rows="5" cols="5" class="form-control" placeholder="Enter Address" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Address"><?php echo $address;?></textarea>

										<input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter Pincode" value="<?php echo $pincode;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Pincode">
										
										<input type="text" id="contactno" name="contactno" class="form-control" placeholder="Enter Contact Number" value="<?php echo $contactno;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Contact Number">

										<select onchange="getState(this)" class="select form-control" id="country" name="country" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Country">

											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($countryList as $c ) {
													
													?>
													<option value="<?php echo $c->country_id;?>"<?php
											if($country==$c->country_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?> style="color:#9ba4b2;" ><?php echo $c->country_name;?></option>
													<?php

													}								?>
										</select>
										
										<select onchange="getCity(this)" class="select form-control" id="state" name="state" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="State">
											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($stateList as $s ) {
													
													?>
											<option value="<?php echo $s->state_id;?>" <?php

											if($state==$s->state_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}

											?>
											style="color:#9ba4b2;"
												>
												<?php echo $s->state_name;?>
													
												</option>
													<?php

													}								?>
										</select>
										<select class="select form-control" id="city" name="city" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="City">
											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($cityList as $c ) {
													
													?>
											<option value="<?php echo $c->city_id;?>" <?php

											if($city==$c->city_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}

											?>
											style="color:#9ba4b2;"
												>
												<?php echo $c->city_name;?>
													
												</option>
													<?php

													}								?>

										</select>
										<select class="select form-control" id="speciality" name="speciality" style="color:#9ba4b2;"data-toggle="tooltip" data-placement="top" title="Speciality">
											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($DoctorSpecialityList as $s ) {
													
													?>
											<option value="<?php echo $s['speciality_id'];?>" <?php

											if($speciality==$s['speciality_id'])
											{
												echo "selected";
											}
											else
											{
												echo "";
											}

											?>
											style="color:#9ba4b2;"
												>
												<?php echo $s['doctor_speciality'];?>
													
												</option>
													<?php

													}								?>

										</select>
								<input type="text" name="dateofbirth" id="datepicker" placeholder="Birth Date" value="<?php echo $newDate;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Date Of Birth">
										
										
										<select name="gender" id="gender" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Gender">
											<option value="" style="color:#9ba4b2;">Select</option>
											<option 
											<?php
											if($gender=="Male")
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?>
											value="Male">Male</option>
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
											?>

											style="color:#9ba4b2;">Female</option>										
										</select>	
										<input type="text" id="qualification" name="qualification" class="form-control" placeholder="Enter Qualification" value="<?php echo $qualification;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Qualification">

										<input type="text" id="consultancy_fees" name="consultancy_fees" class="form-control" placeholder="Enter Consultancy Fees" value="<?php echo $consultancy_fees;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Consultancy Fees">
										
										<input type="text" id="experience" name="experience" class="form-control" placeholder="Enter Experience" value="<?php echo $experience;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Experience">


										<input type="file" class="file-styled" name="doctorimg" id="doctorimg" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Doctor Image">
										<img src='<?php echo base_url();?>/doctorimg/<?php echo $doctorimg;?>' height="100" width="100" data-toggle="tooltip" data-placement="top" title="Doctor Image">
										<input type="button" onclick="profile_doctor();" value="submit" class="btn btn-default btn-rounded">
									</form>
								</div>
							</div>
							
						</div>
						
					
					
							</section>
						  </div>
						</div>
					  </div>

					<?php
				}

				if(isset($_SESSION['hospital_id']))
				{
					?>
<div class="panel-group accordian-style2" id="accordion2">
					  
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							  <i class="fa fa-medkit"></i>Hospital Details<i class="fa pull-right fa-angle-down"></i>
							</a>
						  </h4>
						</div>
						
						<div id="collapseOne" class="panel-collapse collapse in">
						  <div class="panel-body">
							<section class="appointment-sec text-center">
					
									<div class="container">
									
						<?php 

						$name="Hospital Name";
						$address="Address";
						$city="";
						$state="";
						$country="";
						$contactno="Contact Number";
						$speciality="";
						$hospitalimg="";
						
						foreach($hospitalList as $h)
						{
							$name = $h->hospital_name;
							$address = $h->address;
							$city=$h->city;
							$state = $h->state;
							$country = $h->country;
							$contactno = $h->contact_number;
							$speciality = $h->speciality_id;
							$hospitalimg = $h->hospitalimg;
						}
						                                                            
 
                        ?>
						
						   <div class="row">
							

							<div class="col-md-6">
                            <center><h1>Hospital Details</h1></center>								
								<div class="appointment-form clearfix">
								   <div class="success" id="message-app" style="display:none;"></div>
									<form name="profile_form" id="profile_form" method="post"  enctype="multipart/form-data">
										<input type="hidden" name="hospital_id" id="hospital_id" value="<?php echo $_SESSION['hospital_id'];?>">

										<input type="hidden" name="image" id="image" value="<?php echo $_SESSION['hospitalimg'];?>">

										<input type="text" name="name" id="name" placeholder="Hospital Name" value="<?php echo $name;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Hospital Name">
										
										
										<textarea id="address" name="address" rows="5" cols="5" class="form-control" placeholder="Enter Address" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Address"><?php echo $address;?></textarea>
										
										<input type="text" id="contactno" name="contactno" class="form-control" placeholder="Enter Contact Number" value="<?php echo $contactno;?>" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Contact Number">

										<select onchange="getState(this)" class="select form-control" id="country" name="country" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Country">

											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($countryList as $c ) {
													
													?>
													<option value="<?php echo $c->country_id;?>"<?php
											if($country==$c->country_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}
											?> style="color:#9ba4b2;" ><?php echo $c->country_name;?></option>
													<?php

													}								?>
										</select>
										
										<select onchange="getCity(this)" class="select form-control" id="state" name="state" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="State">
											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($stateList as $s ) {
													
													?>
											<option value="<?php echo $s->state_id;?>" <?php

											if($state==$s->state_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}

											?>
											style="color:#9ba4b2;"
												>
												<?php echo $s->state_name;?>
													
												</option>
													<?php

													}								?>
										</select>
										<select class="select form-control" id="city" name="city" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="City">
											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($cityList as $c ) {
													
													?>
											<option value="<?php echo $c->city_id;?>" <?php

											if($city==$c->city_id)
											{
												echo "selected";
											}
											else
											{
												echo "";
											}

											?>
											style="color:#9ba4b2;"
												>
												<?php echo $c->city_name;?>
													
												</option>
													<?php

													}								?>

										</select>
										<select class="select form-control" id="speciality" name="speciality" style="color:#9ba4b2;"data-toggle="tooltip" data-placement="top" title="Speciality">
											<option value="" style="color:#9ba4b2;">Select</option>
											<?php
											//print_r($countryList);
												foreach ($HospitalSpecialityList as $s ) {
													
													?>
											<option value="<?php echo $s['speciality_id'];?>" <?php

											if($speciality==$s['speciality_id'])
											{
												echo "selected";
											}
											else
											{
												echo "";
											}

											?>
											style="color:#9ba4b2;"
												>
												<?php echo $s['hospital_speciality'];?>
													
												</option>
													<?php

													}								?>

										</select>
										
										<input type="file" class="file-styled" name="hospitalimg" id="hospitalimg" style="color:#9ba4b2;" data-toggle="tooltip" data-placement="top" title="Hospital Image">
										<img src='<?php echo base_url();?>/hospitalimg/<?php echo $hospitalimg;?>' height="100" width="100" data-toggle="tooltip" data-placement="top" title="Hospital Image">
										<input type="button" value="submit" onclick="profile_hospital();" class="btn btn-default btn-rounded">
									</form>
								</div>
							</div>
							
						</div>
						
					
					
							</section>
						  </div>
						</div>
					  </div>
	
				<?php
					}
				?>


					  		</div>
						</div>
	
					</div>
					
				</div>
				
			</div>
		   
  		</div>			
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