<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 08:00:36 GMT -->
<!--Added by HTTrack-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/client_assets/images/title.png">
		<style type="text/css">

		.loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #ffffffcf;
        }
        .loader img{
            position: relative;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
        }

	</style>

	<title>Admin - HugsAndDrugs</title>
	<!-- Global stylesheets -->
	<?php $this->load->view("admin/templates/admin-header-links");?>
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/dashboard.js"></script>

	<!-- /theme JS files -->
</head>

<body class="navbar-bottom">

		<div class="loader" >
			<img src="<?php echo base_url();?>/assets/images/preloader2.gif">
		</div>
		
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
			<?php $this->load->view("admin/templates/admin-side-bar");?>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

	


				<!-- Dashboard content -->
				<div class="row">
					<div class="col-lg-12">

					


						<!-- Quick stats boxes -->
						<div class="row">
							<div class="col-lg-4">

								<!-- Members online -->
								<div class="panel bg-teal-400">
									<div class="panel-body">
										<div class="col-lg-8">
										<h1 class="no-margin"><?=$total_patients;?></h1>
										<h4 class="no-margin">Patients</h4>
										</div>
										<div class="col-lg-4">
										<i class="fa fa-wheelchair fa-4x"></i>
										</div>
										
										
										
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>

									</div>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-4">

								<!-- Current server load -->
								<div class="panel bg-pink-400">
									<div class="panel-body">
										<div class="col-lg-8">
										<h1 class="no-margin"><?=$total_doctors;?></h1>
										<h4 class="no-margin">Doctors</h4>
										</div>
										<div class="col-lg-4">
										<span><i class="fa fa-stethoscope fa-4x"></i></span>
										</div>
										

										
									</div>

									<div id="server-load"></div>
								</div>
								<!-- /current server load -->

							</div>

							<div class="col-lg-4">

								<!-- Today's revenue -->
								<div class="panel bg-blue-400">
									<div class="panel-body">
										<div class="col-lg-8">
										<h1 class="no-margin"><?=$total_hospitals;?></h1>
										<h4 class="no-margin">Hospitals</h4>
										</div>
										<div class="col-lg-4">
										<span><i class="fa fa-h-square fa-4x"></i></span>
										</div>
										
										
										
										
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>
						</div>
						<!-- /quick stats boxes -->




					</div>

					
				</div>
				<div class="row">
					<div class="col-lg-6">
						<!-- My messages -->
						<div class="panel panel-flat">

							<!-- Tabs -->
		                	<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
								<li class="active" style="background: black;"> 
									<a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab">
										Contact Us
									</a>
								</li>
							</ul>
							<!-- /tabs -->


							<!-- Tabs content -->
							<div class="tab-content">
								<div class="tab-pane active has-padding">
									<ul class="media-list" id="contact_record">
										
									</ul>
								</div>
							</div>
							<!-- /tabs content -->

						</div>
						<!-- /my messages -->


						<!-- Daily financials -->
						
						<!-- /daily financials -->

					</div>
					<div class="col-lg-6">
						<div class="panel panel-flat">

							<!-- Tabs -->
		                	<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
								<li class="active" style="background: black;">
									<a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab">
										Feedbacks
									</a>
								</li>
							</ul>
							<!-- /tabs -->


							<!-- Tabs content -->
							<div class="tab-content">
								<div class="tab-pane active has-padding">
									<ul class="media-list" id="feedback_record">
										
									</ul>
								</div>
							</div>
							<!-- /tabs content -->

						</div>
					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
	<?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->
	<script type="text/javascript">
		$(document).ready(function(){
	var i= '<?=$active;?>' ;
	$("#activeli li").eq(i).addClass('active');
});


    setTimeout(function() {$('.loader').fadeOut();},5000);
	</script>

</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 08:00:36 GMT -->
</html>
