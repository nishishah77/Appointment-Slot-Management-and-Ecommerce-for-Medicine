<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/login_tabbed.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:59:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/client_assets/images/title.png">	
	<title>Admin-HugsAndDrgs</title>

	<!-- Global stylesheets -->
	<?php $this->load->view("admin/templates/login_header_links");?>
	<!-- /theme JS files -->

<script type="text/javascript" src="<?php echo base_url();?>/assets/js/Login.js"></script>
</head>

<body class="login-container login-cover">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Tabbed form -->
				<div class="row">

					<div class="col-md-12">
					<div class="tabbable panel login-form width-400">
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a href="#basic-tab1" data-toggle="tab"><h6>Sign in</h6></a></li>
					</ul>

					<div class="tab-content panel-body">
						<div class="tab-pane fade in active" id="basic-tab1">
							<form  method="post">
								<div class="text-center">
									<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
									<h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
								</div>
								<?php
								$this->load->helper('cookie');
						$username=get_cookie('admin_username')!=""? get_cookie('admin_username'):"";
								?>
								
								<div class="form-group has-feedback has-feedback-left">
									<input type="text" autofocus="" class="form-control" placeholder="Username" name="username" id="username" required="required" value="<?php echo $username;?>">
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">
									<input type="password" id="password" class="form-control" placeholder="Password" name="password" required="required">
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>

								<div class="form-group login-options">
									<div class="row">
										<div class="col-sm-6">
											<label class="checkbox-inline">
												<input type="checkbox" name="rememberme" class="styled" checked="checked" id="rememberme">
												Remember
											</label>
										</div>

										<div class="col-sm-6 text-right">
											<a href="<?php echo site_url('admin/ResetPassword/Reset')?>">Forgot password?</a>
										</div>
									</div>
								</div>

								<div class="form-group">
									<button type="button" onclick="login();" class="btn bg-blue btn-block" name="btn_login">Login <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>

							<div class="content-divider text-muted form-group"><span>*</span></div>
							

							<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
						</div>

						<div class="tab-pane fade" id="basic-tab2">
							<form action="login/register" method="post">
								<div class="text-center">
									<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
									<h5 class="content-group">Create new account <small class="display-block">All fields are required</small></h5>
								</div>

								<div class="form-group has-feedback has-feedback-left">
									<input type="text" class="form-control" placeholder="Your username" name="username">
									<div class="form-control-feedback">
										<i class="icon-user-check text-muted"></i>
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">
									<input type="password" name="password" class="form-control" placeholder="Create password" maxlength="15">
									<div class="form-control-feedback">
										<i class="icon-user-lock text-muted"></i>
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">
									<input type="password" maxlength="15" class="form-control" name="cpassword" placeholder="Confirm Password">
									<div class="form-control-feedback">
										<i class="icon-user-lock text-muted"></i>
									</div>
								</div>
								<div class="form-group has-feedback has-feedback-left">
									<input type="text" class="form-control" name="name" placeholder="Your Name">
									<div class="form-control-feedback">
										<i class="icon-user-check text-muted"></i>
									</div>
								</div>
								<div class="form-group has-feedback has-feedback-left">
									<input type="phone" class="form-control" name="mobile" placeholder="Your Mobile Number">
									<div class="form-control-feedback">
										<i class="icon-phone2 text-muted"></i>
									</div>
								</div>

								
									<div class="checkbox">
										<label>
											<input type="checkbox" class="styled">
											Accept <a href="#">terms of service</a>
										</label>
									</div>
									<button type="submit" name="btn_register" class="btn bg-indigo-400 btn-block">Register <i class="icon-circle-right2 position-right"></i></button>
								</div>

								
							</form>
						</div>	
					</div>
					</div>
					</div>
				</div>
				<!-- /tabbed form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
<script type="text/javascript">
$(document).ready(function(){
 var msg = "<?php echo $_REQUEST['msg'];?>";
 if (msg == "LoginFailed") {
 	swal({ 
              title: "Login!", 
              text: "You Must Login First.", 
              type: "error" }, 
              function(){ window.location.replace('http://localhost:8080/hugsanddrugs/admin/login/');
 
              });
 }
 
});

</script>

</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/login_tabbed.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:59:02 GMT -->
</html>
