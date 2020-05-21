<!DOCTYPE html>
<html lang="en" class="no-js">
  
<!-- Mirrored from wahabali.com/work/medicom/shop-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:56:10 GMT -->
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
	<?php $this->load->view("client/templets/header-links"); ?>

	</head>
    <body class="fixed-header">
		
		
    
		<!-- Document Wrapper
		============================================= -->
		<div id="wrapper" class="clearfix">
    
    
					<?php $this->load->view("client/templets/client_nav_bar"); ?>

					<?php $this->load->view("client/templets/client_login") ?>

			
			
			<!-- Sub Page Banner
			============================================= -->
			<section class="sub-page-banner text-center" data-stellar-background-ratio="0.3">
				
				<div class="overlay"></div>
				
				<div class="container">
					<h1 class="entry-title">Shop Detail</h1>
					<p>----------------------------------------------------------------------</p>
				</div>
				
			</section>
    
    

    
    
			<!-- Sub Page Content
			============================================= -->
			<div id="sub-page-content" class="clearfix">

				<div class="container">
					
					<div class="row">
						
						<div class="col-md-8 clearfix">
							
							<h2 class="bordered light">Medicom <span>Product</span></h2>
								
							<div class="row">
								<?php  

								foreach ($MedicineList as $list) 
								{
									?>

								<div class="col-md-6 col-sm-6"><img src="<?php echo base_url();?>/medicineimg/<?php echo $list['medicineimg'];?>" alt="" class="img-rounded"></div>
								
								<?php
								}
									?>

								
								
								<div class="col-md-6 col-sm-6">
									<?php  

								foreach ($MedicineList as $list) 
								{
									?>
									<div class="product-single-content">
										<h4><?php echo $list['medicine_name'];?> - &#x20b9;<?php echo $list['price'];?></h4>
										<p><?php echo $list['description'];?></p>

									</div>
									
									<div class="cart-items-detail clearfix">
										<div class="item-counter clearfix">
											<span id="less-item" class="pull-left">-</span>
											<input type="text" value="1"  id="total-items" class="items-total">
											<span id="pluss-item" class="pull-right">+</span>
										</div>
										<a class="btn btn-default pull-left ad-to-cart" onclick="AddToCart(<?php echo $list['medicine_id'];?>,<?php echo $list["price"];?>)" >Add To Cart</a>
									</div>
									<?php
								}
									?>
								</div>
								
							</div>
							
							<div class="height30"></div>
								
							<h2 class="light bordered">Product <span>Info</span></h2>
								
						<div id="horizontalTab" class="tab-horizontal1">
									<?php
                                    foreach ($MedicineList as $list) {
                                      
									?>

								<ul class="resp-tabs-list">
									<li>Description</li>
									<li>Additional Information</li>
									
								</ul>
								<div class="resp-tabs-container">
									<div>
										<p>
											<?php

												echo $list['description'];
											?>
										</p>
									</div>
									
									<div>
										<p>	
										<ul class="medicom-feature-list text-left">
											<p>
											<label><strong>Usage:</strong></label>
											<label><?php echo $list['medicine_usage'];?></label>
										</p><p>
											<label><strong>Dosage:</strong></label>
											<label><?php echo $list['dosage'];?></label>
										</p><p>
											<label><strong>Unit:</strong></label>
											<label><?php echo $list['unit'];?></label>
										</p><p>
											<label><strong>Manufacturer:</strong></label>
											<label><?php echo $list['manufacturer'];?></label>
										</p><p>
											<label><strong>Manufacturing Date:</strong></label>
											<label><?php echo $list['manufacturing_date'];?></label>
											</p><p>
											<label><strong>Expiry Date:</strong></label><label><?php echo $list['expiry_date'];?></label>
											</p>

										</ul>

											</p>
										</div>
									</div>
									<?php

								}
									?>
								</div>
							
							
						</div>
					
						<aside class="col-md-4">
								

							
							
							<!-- Best Sellers Widget
							============================================= -->
							<div class="sidebar-widget light">
								<h2 class="bordered light">Best <span>Sellers</span></h2>
								<article class="best-seller">
									<a href="<?php echo base_url();?>/client/shop/shop_detail?page=shop-detail&medicine=1"><img src="<?php echo base_url();?>/medicineimg/pic1.jpg" alt="Crocin">
									<h4><a>Crocin</a></h4>
								</a>
									<strong>&#x20b9;88.00</strong></p>
									
								</article>
								<article class="best-seller">
									<a href="<?php echo base_url();?>/client/shop/shop_detail?page=shop-detail&medicine=8"><img src="<?php echo base_url();?>/medicineimg/pic4.jpg" alt="Benadryl">
									<h4><a>Benadryl</a></h4>
								</a>
									<strong>&#x20b9;16.00</strong></p>
									
								</article>
								<article class="best-seller">
									<a href="<?php echo base_url();?>/client/shop/shop_detail?page=shop-detail&medicine=5">
									<img src="<?php echo base_url();?>/medicineimg/pic5.jpg" alt="Meftal Spas">
									<h4><a>Meftal Spas</a></h4>
									</a>
									<strong>&#x20b9;78.00</strong></p>
									
								</article>
							</div>
					</aside>
					
					</div>
					
				</div>

		
		</div><!--end sub-page-content-->
    

		
		<div class="colourfull-row"></div>
	
	
	
		<!-- Footer
		============================================= -->
			<?php $this->load->view("client/templets/client-footer"); ?>
		<!-- back to top -->
		<a href="#." class="back-to-top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
	
    </div><!--end #wrapper-->
	
		
		
		
    <!-- All Javascript 
	============================================= -->


<?php $this->load->view("client/templets/footer-links"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="<?php echo base_url();?>/client_assets/js/add-to-cart.js"></script>

   		<script src="<?php echo base_url();?>/client_assets/js/client_login_model.js"></script>
   		<?php

if(!isset($_SESSION['username']))
{
   		?>

<script>
	
	  	$(document).ready(function(){
	  	//	alert("hh");
    	$('#homemenu').removeClass("active");
    	$('#shopmenu').addClass("active");
});
<?php 

	}

?>
</script>
  </body>

<!-- Mirrored from wahabali.com/work/medicom/shop-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:56:10 GMT -->
</html>