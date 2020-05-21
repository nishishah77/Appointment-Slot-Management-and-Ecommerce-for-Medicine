<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/client_assets/images/title.png">
	
	<title>Admin-HugsAndDrugs</title>
<?php $this->load->view("admin/templates/admin-header-links");?>
</head>

<body class="navbar-bottom login-container">

	<!-- Main navbar -->
	<?php $this->load->view("admin/templates/admin-main-nav");?>
	<!-- /main navbar -->
	<!-- Main Header-->
	<?php $this->load->view("admin/templates/admin-header");?>
	<!--/Main Header-->
	<!-- Page container -->
<div class="page-container">

		<!-- Page content -->
	<div class="page-content">

      <!-- Sidebar -->
      <?php $this->load->view("admin/templates/admin-side-bar");?>
      <script type="text/javascript" src="<?php echo base_url();?>/assets/js/Change-Password.js"></script>
      
      <!-- /Sidebar -->


			<!-- Main content -->
		<div class="content-wrapper">

				<!-- Tabbed form -->

				<div class="row"> 

					<div class="col-md-3">
						
					</div>
				
					<div class="col-md-6">
				<!-- Password recovery -->
				<form id="changePassword-form" class="form-validation" method="post">
					<div class="panel panel-body">
						<div class="text-center">
							<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
							<h5 class="content-group">Change Password</h5>
						</div>

						<div class="form-group">

						<label>Current Password:</label>
						<input type="password" name="old_pass" id="old_pass" class="form-control" placeholder="Enter Current Password">

						</div>

						<div class="form-group">

						<label>New Password:</label>
						<input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="Enter New Password">

						</div>

						<div class="form-group">

						<label>Confirm New Password:</label>
						<input type="password" class="form-control" name="new_cpass" id="new_cpass" placeholder="Confirm New Password">							
						</div>

						<div class="form-group">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<button type="button" onclick="changePassword();" name="btn_change" class="btn bg-blue btn-block">Change password</button>

						</div>

						
						</div>
					</div>
				</form>
				<!-- /password recovery -->
					</div>
				</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
</div>

	<!-- Footer -->
		<?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->

</body>
</html>
