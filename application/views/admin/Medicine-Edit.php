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
			 <div class="panel panel-white">
					<div class="panel-heading">
						<h6 class="panel-title">Medicine Information</h6>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		
		                	</ul>
	                	</div>
					</div>

                	<form class="form-validation" method="POST" id="medicine-update-form" action="Medicine/update" enctype="multipart/form-data">
						<fieldset class="step" id="step1">
							<?php 
							foreach ($medicineList as $medicine) {	?>
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Medicine info
								<small class="display-block">Column with <span class="text-danger">*</span> are compulsory.</small>
							</h6>

							<div class="row">
								<div class="form-group col-md-4">
									<input type="hidden" name="medicine_id" id="medicine_id" value="<?=$medicine->medicine_id;?>">
									<input type="hidden" name="image" id="image" value="<?=$medicine->medicineimg;?>">

									<label>Medicine Name:  <span class="text-danger">*</span></label>
									<input name="medicinename" id="medicinename" type="text" class="form-control required"  placeholder="Enter Medicine Name" value="<?=$medicine->medicine_name;?>">
								</div>
								<div class="form-group col-md-4">
									<label>Manufacturing Date:  <span class="text-danger">*</span></label>
									<input type="date" name="manufacturingdate" id="manufacturingdate" class="form-control required"  placeholder="Enter Manufacturing Date" value="<?=$medicine->manufacturing_date;?>">	
								</div>
								<div class="form-group col-md-4">
									<label>Expiry Date:  <span class="text-danger">*</span></label>
									<input type="date" class="form-control required" name="expirydate" id="expirydate" placeholder="Enter Expiry Date" value="<?=$medicine->expiry_date;?>">	
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
		                        	<label>Medicine Category</label>
		                        		<select class="select form-control required" name="category" id="category" value="<?=$medicine->medicine_category_name;?>">
			                                	<option value="">Select</option>
											<?php
												foreach ($categoryList as $category ) {
													if($medicine->medicine_category_id==$category->medicine_category_id){
													echo "<option selected value=".$category->medicine_category_id.">".$category->medicine_category_name."</option>";
													}else{
													echo "<option value=".$category->medicine_category_id.">".$category->medicine_category_name."</option>";
												}
												}
											?>

			                             </select>
			                	</div> 
			                	<div class="form-group col-md-6">
										<label>Manufacturer</label>
										<input type="text" name="manufacturer" id="manufacturer" class="form-control" placeholder="Enter Name of Ingredients" value="<?=$medicine->manufacturer;?>">
								</div>	
							</div>
							<div class="row">
								<div class="form-group col-md-4">
										<label>Medicine Usage</label>
										<input type="text" name="medicineusage" id="medicineusage" class="form-control" placeholder="Enter Name of Ingredients" value="<?=$medicine->medicine_usage;?>">
								</div>
								<div class="form-group col-md-4">
										<label>Dosage</label>
										<input type="text" name="dosage" id="dosage" class="form-control" placeholder="Enter Name of Ingredients" value="<?=$medicine->dosage;?>">
								</div>
								<div class="form-group col-md-4">
										<label class="checkbox-inline">
											<input type="checkbox" name="prescriptionrequired" id="prescriptionrequired" value="Yes"<?php if($medicine->prescription_required=="Yes"){echo "checked";}else{echo "";} ?>> Prescription Required</label>
									
										
									
								</div>
								
		                    </div>

							<div class="row">
								<div class="form-group col-md-12">
									<label>Description</label>
									<input type="text" name="description" class="form-control" placeholder="Enter the Description" id="description" value="<?=$medicine->description?>">
								</div>

							</div>
							<div class="row">
								<div class="form-group col-md-6">
								<label class="control-label">Select File :</label>
								<input type="file" onchange="readURL(this);" class="file-styled" name="medicineimg" id="medicineimg">
								 <img src="/hugsanddrugs/medicineimg/<?=$medicine->medicineimg;?>" id="blah" width="200px" alt="<?=$medicine->medicineimg;?>" class="file-styled" />
								</div>
							</div>
						<?php } ?>
						</fieldset>
						<!-- Medical info-->
						<!-- Medicine Detail Info -->
						<fieldset class="step" id="step2">
							<?php
							foreach($medicineDetail as $detail){
							?>
							
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Medicine Details Info
								<small class="display-block">Column with <span class="text-danger">*</span> are compulsory.</small>
							</h6>

							<div class="row">
								<div class="form-group col-md-6">
									<label>Unit</label>
										<input type="text" name="unit" class="form-control" placeholder="Enter Medicine Usage" id="unit" value="<?=$detail->unit;?>">
								</div>
								<div class="form-group col-md-6">
									<label>Price:  <span class="text-danger">*</span></label>
									<input class="form-control required" type="number" name="price" value="<?=$detail->price;?>" id="price" >
								</div>
		                    </div>
		                <?php } ?>
		                			<?php require('plugin_view_image.php'); ?>

						</fieldset>
						
						<div class="form-wizard-actions">
							<button class="btn btn-default" id="back" type="reset">Back</button>
							<button class="btn btn-info" type="submit" name="next1" id="next">Save</button>
																		
						</div>
					</form>
	            </div>
			<!-- /main content -->

		</div> 
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
	<?php $this->load->view("admin/templates/admin-footer");?>
	<!-- /footer -->
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/pages/dashboard.js"></script>
</body>

<!-- Mirrored from demo.interface.club/limitless/layout_3/LTR/material/form_layout_vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 May 2016 07:53:19 GMT -->
</html>
