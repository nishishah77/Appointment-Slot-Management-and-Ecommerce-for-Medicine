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
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/State-Add-Validation.js"></script>
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
						<h6 class="panel-title">Country Information</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		
		                	</ul>
	                	</div>
					</div>

                	<form class="form-validation" method="POST" >
						<fieldset class="step" id="step1">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								State Information
								<small class="display-block">Tell us a bit about yourself</small>
							</h6>
							<div class="row">
								<div class="form-group col-md-6">
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
								<div class="form-group col-md-6">
									<label>State Name:</label>
									<input type="text" name="state_name" id="state_name" class="form-control required" placeholder="Enter State Name" >
								</div>	

							</div>
						
						</fieldset>

						<div class="form-wizard-actions">
							<button class="btn btn-info" id="basic-next" type="button" name="adminadd" onclick="insert();">Submit</button>
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
