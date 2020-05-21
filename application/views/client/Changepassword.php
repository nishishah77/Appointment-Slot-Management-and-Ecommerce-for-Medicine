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
	 
	
	

    
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	
	
	<!-- SCRIPTS
    
     ================================================== -->
					<?php $this->load->view("client/templets/header-links"); ?>

	
					<script type="text/javascript" src="<?php echo base_url();?>/client_assets/js/Profile.js"></script>

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
					<h1 class="entry-title">Change Password</h1>
					<p>-------------------------------------------------------------</p>
				</div>
				
			</section>
    
    
    
			<!-- Sub Page Content
			============================================= -->
			<div id="sub-page-content" class="clearfix">
   
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
											<a href="<?php echo site_url('client/Profile/myappointment?page=myappointments');?>">
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
						
						<h2 class="light bordered">Change<span> Password</span></h2>
					
						<div class="height20"></div>
						<form method="post">
						<div class="panel panel-body">
						<div class="text-center">
							<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
							<h5 class="content-group">Change Password</h5>
						</div>

						<div class="form-group">

						<label>Current Password:</label>
						<input type="password" name="old_pass" class="form-control" placeholder="Enter Current Password" id="old_pass">

						</div>

						<div class="form-group">

						<label>New Password:</label>
						<input type="password" class="form-control" name="new_pass" placeholder="Enter New Password" id="new_pass">

						</div>

						<div class="form-group">

						<label>Confirm New Password:</label>
						<input type="password" class="form-control" name="new_cpass" placeholder="Confirm New Password" id="new_cpass">							
						</div>

						<div class="form-group">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<button type="button" name="btn_change" class="btn btn-default btn-rounded" onclick="changepassword();">Change password</button>

						</div>

						
						</div>
					</div>
				</form>
	
					</div>
					
				</div>
				
			</div>
		   
  
		</div>			<!--end sub-page-content-->
    ><!--end sub-page-content-->
    
    
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