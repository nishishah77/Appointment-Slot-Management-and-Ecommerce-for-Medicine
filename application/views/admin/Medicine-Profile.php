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
     <script type="text/javascript" src="<?php echo base_url();?>/assets/js/Medicine-Add-Validation.js"></script>

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


		<!-- main content -->
			<!-- Toolbar -->
				<div class="navbar navbar-default navbar-xs navbar-component no-border-radius-top">
					<ul class="nav navbar-nav visible-xs-block">
						<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>

					<div class="navbar-collapse collapse" id="navbar-filter">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#activity" data-toggle="tab">Medicine Info</a></li>

						</ul>

						
					</div>
				</div>
			<!-- /toolbar -->


			<!-- User profile -->
			<div class="row">
				<div class="col-lg-9">
					<div class="tabbable">
		<div class="tab-content">
							<!-- Profile info -->
			<div class="tab-pane fade in active" id="activity">
						
								<?php 
										 foreach ($medicineList as $medicine) {	?>
									
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h6 class="panel-title">Medicine Profile information</h6>
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
														<div class="col-md-4">
															<label>Medicine Name</label>
															<input readonly type="text" class="form-control" value="<?=$medicine->medicine_name;?>">
														</div>
														<div class="col-md-4">
															<label>ManufacturingDate</label>
															<input readonly type="date" class="form-control" value="<?=$medicine->manufacturing_date;?>">
														</div>
														<div class="col-md-4">
															<label>ExpiryDate</label>
															<input readonly type="date" class="form-control" value="<?=$medicine->expiry_date;?>">
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
																<label>Description</label>
																<textarea readonly rows="5" cols="5" class="form-control" placeholder="Enter Address here"><?=$medicine->description;?></textarea>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Medicine Category</label>
															<input readonly type="text" class="form-control"value="<?php 
															foreach($categoryList as $category){
																if($medicine->medicine_category_id==$category->medicine_category_id)
																{
																	echo $category->medicine_category_name;
																}
																else
																{
																	echo "";
																}
															}
															 ?>
															">
															</div>
														</div>
													
														<div class="col-md-4">
															<div class="form-group">
																<label>Manufacturer</label>
															<input readonly type="text" class="form-control" value="<?=$medicine->manufacturer;?>">
															</div>
														</div>
														<div class="col-md-4">
															<label>Medicine Usage:</label>	
															<input readonly type="text" class="form-control" value="<?=$medicine->medicine_usage;?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Medicine Dosage:</label>	
															<input readonly type="text" class="form-control" value="<?=$medicine->dosage;?>">
														</div>
														<div class="col-md-6">
															<label>Prescription Required</label>
															<input readonly type="text" class="form-control" value="<?=$medicine->prescription_required;?>">
														</div>
													</div>
												</div>
												<?php } ?>	
												<?php foreach($medicineDetail as $detail){ ?>
										<div class="form-group">
											<div class="row">
											<div class="col-md-6">
												<div class="form-group">
												<label>Unit</label>
												<input readonly type="text" value="<?=$detail->unit;?>" class="form-control">
												</div>
											</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Price</label>
												<input readonly type="text" value="<?=$detail->price;?>" class="form-control">
										</div>
									</div>			
								</div>
								</div>
								<?php } ?>				

											</form>
										</div>
									</div>
									<!--Medicine Info-->
						
			</div>
		</div>
				</div>
				</div>
				<?php
				foreach ($medicineList as $medicine) {	?>
				<div class="col-lg-3">
					<!-- User thumbnail -->
					<div class="thumbnail">
						<div class="thumb thumb-rounded thumb-slide">
								<img src="<?php echo base_url(); ?>/medicineimg/<?php echo $medicine->medicineimg;?>" alt="<?=$medicine->medicineimg;?>">
								
								</div>
							
						
					    	<div class="caption text-center">
					    		<h6 class="text-semibold no-margin"><?=$medicine->medicine_name;?></h6>
				    			
					    	</div>
					    </div>
				    			
				    	<!-- /user thumbnail -->
		    	</div>	
		    	<?php } ?>	    		
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
