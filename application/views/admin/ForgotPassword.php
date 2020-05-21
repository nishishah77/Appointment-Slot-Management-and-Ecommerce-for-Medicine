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
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/Reset-Password.js"></script>
</head>

<body class="navbar-bottom login-container">

	<!-- Main navbar -->
	<!-- /main navbar -->
	<!-- Main Header-->
	<!--/Main Header-->
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Password recovery -->
				<form  method="post">
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
							<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
						</div>

						<div class="form-group has-feedback">
							<input type="password" name="password" id="password" class="form-control" placeholder="Your New Password" autofocus="">
							<div class="form-control-feedback">
								<i class="icon-mail5 text-muted"></i>
							</div>
						</div>
						<div class="form-group has-feedback">
							<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Your Confirm New Password">
							<div class="form-control-feedback">
								<i class="icon-mail5 text-muted"></i>
							</div>
						</div>

 						<button type="button" onclick="reset_password();" name="btn_reset" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
				<!-- /password recovery -->

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
