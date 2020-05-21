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
 
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/Admin-Add-Validation.js"></script>
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
						<h6 class="panel-title">Admin Information</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		
		                	</ul>
	                	</div>
					</div>

                	<form class="form-validation" method="POST"  enctype="multipart/form-data" onsubmit="insert()" id="adminadd">
						<fieldset class="step" id="step1">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Admin Information
								<small class="display-block">Tell us a bit about yourself</small>
							</h6>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Username:</label>
									<input type="text" name="username" id="username" class="form-control required" placeholder="Enter Username">
								</div>								
								<div class="form-group col-md-6">
									<label>Admin Name:</label>
									<input type="text" name="adminname" id="adminname" class="form-control required" placeholder="Enter Name">
								</div>
							</div>
							<div class="row">
									<div class="form-group col-md-6">
									<label>Password:</label>
									<input type="password" class="form-control required" name="password" id="password" placeholder="Enter Password">																			
									</div>
									<div class="form-group col-md-6">
										<label>Confirm Password:</label>
										<input type="password" name="confirmpassword" id="confirmpassword" class="form-control required" placeholder="Re-Enter Password">
									</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label class="display-block">Email:</label>
									<input type="email" name="email" id="email" class="form-control required" placeholder="Enter Email Id">
								</div>
								<div class="form-group col-md-6">
										<label class="control-label">Upload Your Image :</label>

										<input type="file" class="file-styled" name="adminimg" id="adminimg">
									</div>
							</div>
							
									
					
						</fieldset>

						<div class="form-wizard-actions">
							<button class="btn btn-info" id="basic-next" type="submit" name="adminadd">Submit</button>
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
