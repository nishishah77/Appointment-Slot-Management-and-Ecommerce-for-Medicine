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
						

									<!-- Profile info -->
									<div class="panel panel-white">
										<div class="panel-heading">
											<h6 class="panel-title">Profile information</h6>
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="collapse"></a></li>
							                		
							                	</ul>
						                	</div>
										</div>
										<?php 
										 foreach ($hospitalList as $hospital) {	?>
										<div class="panel-body">
											<form action="#">
												
												
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label>Name</label>
															<input readonly type="text" value="<?=$hospital['hospital_name'];?>" class="form-control">
														</div>
													
													
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Contact Number</label>
															<input readonly type="text" value="<?=$hospital['contact_number'];?>" class="form-control">
															</div>
														</div>
												
														
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Address:</label>
																<textarea rows="5" cols="5" class="form-control" placeholder="Enter Address here"><?=$hospital['address'];?></textarea>
															</div>
														</div>
														
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label>City</label>
															<input readonly type="text" value="<?=$hospital['city_name'];?>" class="form-control">
														</div>
													
													
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label>State</label>
															<input readonly type="text" value="<?=$hospital['state_name'];?>" class="form-control">
														</div>
													
													
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label>Email Id</label>
															<input readonly type="text" value="<?=$hospital['email_id'];?>" class="form-control">
														</div>
													
													
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label>Open Time</label>
															<input readonly type="text" value="<?=$hospital['open_time'];?>" class="form-control">
														</div>
													
													
													</div>
												</div>
												
											</form>
										</div>
									<?php } ?>
									</div>
									<!-- /profile info -->


									<!-- Account settings -->
								
									<!-- /account settings -->

									<!-- Account settings -->
								
									<!-- /account settings -->
			</div>
			<div class="col-lg-3">
				
					<!-- User thumbnail -->
					<div class="thumbnail">
						<div class="thumb thumb-rounded thumb-slide">
								<img src="<?php echo base_url();?>/hospitalimg/<?=$hospital['hospitalimg'];?>" alt="">
								
								</div>
							
						
					    	<div class="caption text-center">
					    		<h6 class="text-semibold no-margin"><?=$hospital['hospital_name'];?>
				    			
					    	</div>
					    </div>
				    				
				    	<!-- /user thumbnail -->
		    </div>	    		
		</div>
			
	</div>
			<!-- /main content -->
		</div>
			<!-- /page content -->
	
</div>
	<!-- /page container -->


	<!-- Footer -->
	<?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->



</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
</html>
