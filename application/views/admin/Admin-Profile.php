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
	<?php $this->load->view("admin/templates/admin-header-links");?>
	<!-- /theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/Admin-Add-Validation.js"></script>

</head>

<body class="navbar-bottom">

	<!-- Main navbar -->
	<?php $this->load->view("admin/templates/admin-main-nav");?>
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
			<div class="content-wrapper">
				<div class="row">
					<div class="col-lg-9">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h6 class="panel-title">Profile information</h6>
								<div class="heading-elements">
									<ul class="icons-list">
							        	<li><a data-action="collapse"></a></li>
							    	</ul>
						        </div>
							</div>
							<div class="panel-body">
								<form action="#">
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Username</label>
													<input type="text" value="<?=$admin_username;?>" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<label>Name</label>
												<input type="text" value="<?=$admin_name;?>" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Email Id</label>
													<input type="text" value="<?=$admin_email;?>" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						
						<div class="thumbnail">
							<div class="thumb thumb-rounded thumb-slide">
								<img src="<?php echo base_url();?>/adminimg/<?=$adminimg;?>" alt="<?=$adminimg;?>">
							</div>
						
					    	<div class="caption text-center">
					    		<h6 class="text-semibold no-margin"><?=$admin_name;?> <small class="display-block">- Admin -</small></h6>
					    	</div>
					    </div>
					    <div class="text-center">
							<button class="btn btn-info" id="btn-del">Delete Account</button>
						</div>
				    </div>	    		
				</div>

	            <!-- Unlock form -->
				<div id="modal-validation" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content login-form">

							<!-- Form -->
							<form class="modal-body form-validate" method="POST" action="" id="delaccount">
								<div class="thumb thumb-rounded no-margin-top content-group">
									<img src="<?php echo base_url();?>/assets/images/demo/users/face11.jpg" alt="">
									<div class="caption-overflow">
										<span>
											<a href="#" class="btn border-white text-white btn-flat btn-icon btn-rounded btn-xs"><i class="icon-collaboration"></i></a>
											<a href="#" class="btn border-white text-white btn-flat btn-icon btn-rounded btn-xs ml-5"><i class="icon-question7"></i></a>
										</span>
									</div>
								</div>

								<h6 class="content-group text-center text-semibold no-margin-top"><?=$admin_name;?> <small class="display-block">Delete your account</small></h6>

								<div class="form-group">
									<input type="hidden" name="id" id="id" value="<?=$admin_id;?>">
								</div>
								<div class="form-group has-feedback">
									<input type="password" name="password" id="password" class="form-control" placeholder="Your password" required="required">
									<div class="form-control-feedback">
										<i class="icon-user-lock text-muted"></i>
									</div>
								</div>
								<div class="form-group has-feedback">
									<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Your password" required="required">
									<div class="form-control-feedback">
										<i class="icon-user-lock text-muted"></i>
									</div>
								</div>

								<button type="button" class="btn bg-slate btn-block" onclick="delaccount()">Delete <i class="icon-circle-right2 position-right"></i></button>
								<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
							</form>
							<!-- /form -->

						</div>
					</div>
				</div>
				<!-- /unlock form -->	

			</div>	
		</div>
	</div>
	<!-- /page container -->


	<!-- Footer -->
	<?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->
	<script>
		$(document).ready(function(){
  			$("#btn-del").click(function(){
   				$("#modal-validation").modal();
  			});
		});

	</script>


</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
</html>
