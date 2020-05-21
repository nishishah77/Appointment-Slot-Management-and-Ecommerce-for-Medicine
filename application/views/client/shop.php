<!DOCTYPE html>
<html lang="en" class="no-js">
  
<!-- Mirrored from wahabali.com/work/HugsAndDrugs/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:55:29 GMT -->
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
	 
	
	<!-- CSS
    
     ================================================== -->
	 
	 
				<?php $this->load->view("client/templets/header-links"); ?>

<style type="text/css">
	
	.colored
	{
		color:yellow;
	}
</style>
	<script type="text/javascript" src="<?php base_url();?>/client_assets/js/search.js"></script>
	</head>
    <body class="fixed-header">
		
		<!-- Document Wrapper
		============================================= -->
		<div id="wrapper" class="clearfix">
    
    
		<?php $this->load->view("client/templets/client_nav_bar"); ?>

    
    
			<section class="sub-page-banner shop-banner">
				
				<div id="shop-slider" class="owl-carousel">

					<div class="item">
					
						<div class="container">
							<div class="slider-text">
								<h1>genuine <span>medical</span> product</h1>
								<p></p>
								<ul class="HugsAndDrugs-feature-list list-inline text-left">
									<li><i class="fa fa-check HugsAndDrugs-check"></i>HugsAndDrugs Provides 100% Authentic Medicines.</li>
									<li><i class="fa fa-check HugsAndDrugs-check"></i>HugsAndDrugs Provides medicines at rather affordable price.</li>
									<li><i class="fa fa-check HugsAndDrugs-check"></i>HugsAndDrugs assures 2-day Delivery.</li>
								</ul>
								
							</div>
							<div class="slider-image">
								<img src="<?php echo base_url();?>/client_assets/images/shop-banner-img1.png" alt="">
							</div>
						</div>
						
					</div>

				</div> 

						
			</section>
    
			<!-- Sub Page Content
			============================================= -->
			<div id="sub-page-content" class="clearfix">

				<div class="container">
					
					<div class="row">
					
						<div class="col-md-8 clearfix">
							
							
							<!-- Products
							============================================= -->
							<h2 class="bordered light">HugsAndDrugs <span>Products</span></h2>
							
					
							<div class="products" >
								<!-- <ul class="list-unstyled owl-carousel row" id="our-doctors-list"> -->

								<?php 
								if($MedicineByCategoryList!="")
								{
 								foreach($MedicineByCategoryList as $list){
									?>
									<!-- <li> -->
								<div class="product" style="width:200px;height:270px;">
									<div class="product-thumb">
										<a href="shop/shop_detail?page=shop-detail&medicine=<?php echo $list['medicine_id'];?>"><img src="<?php echo base_url();?>/medicineimg/<?php echo $list['medicineimg']; ?>" alt="" width="100" height="100"></a>
									</div>
									<h4><?php echo $list['medicine_name']?></h4>
									
									<div class="price-rating">
										<center>
									<p class="price">&#x20b9;<?php echo $list['price']?></p></center>
									<div class="clearfix"></div>
									</div>
									<span class="sperator"></span>
									<a href="#."  class="ad-to-cart"><i class="fa fa-shopping-cart"></i>add to cart</a>
								</div>
							<!-- </li> -->
								<?php } 



								  }?>
								<!-- </ul> -->
								</div>
								<div id="medicinedata">
								</div>
								<div id="pagiation">
									<ul class="list-unstyled owl-carousel row" id="our-doctors-list">

									 <?php
								  $counter=0;
								  if($MedicineList!=""){
								foreach($MedicineList as $list){
									$counter = $counter+1;

									?>
									<li>
								<div class="product" style="width:300px;height:300px;">
									<div class="product-thumb">
										<a href="shop/shop_detail?page=shop-detail&medicine=<?php echo $list['medicine_id'];?>"><img src="<?php echo base_url();?>/medicineimg/<?php echo $list['medicineimg']; ?>" alt="" width="200" height="100"></a>
									</div>
									<h4><?php echo $list['medicine_name']?></h4>
									
									<div class="price-rating">
										<center>
									<p class="price">&#x20b9;<?php echo $list['price']?></p></center>
									<ul class="rating">
										<li class="fa fa-star-half-full colored"></li>
										<li class="fa fa-star"></li>
										<li class="fa fa-star"></li>
										<li class="fa fa-star"></li>
										<li class="fa fa-star"></li>
									</ul>
									<div class="clearfix"></div>
									</div>
									<span class="sperator"></span>
									<a href="shop/shop_detail?page=shop-detail&medicine=<?php echo $list['medicine_id'];?>"  class="ad-to-cart"><i class="fa fa-shopping-cart"></i>add to cart</a>
								</div>
								</li>
								<?php 
									}
									
									}
								?>
							
							</ul>
						</div>
						</div>
					
						<aside class="col-md-4">
							
							<!-- Search Widget
							============================================= -->
							<div class="sidebar-widget">
								<div class="search clearfix">
									<form method="post">
										<input type="text" placeholder="Search..." id="search_medicine">
										<button type="button" class="search-icon" onclick="searchMedicine();"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>
							
							
							<!-- Categories Widget
							============================================= -->
							<div class="sidebar-widget clearfix">
								<h2 class="bordered light">Categories</h2>
								<ul class="tags">
									<?php foreach ($CategoryList as $list ) 
									{

										?>
										<li><a href="shop?category=<?php echo $list['medicine_category_id'];?>"><?php echo $list['medicine_category_name'];?></a></li>
										<?php
									} 
									?>									
								</ul>
							</div>
							
							
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
									<a href="<?php echo base_url();?>/client/shop/shop_detail?page=shop-detail&medicine=5"><img src="<?php echo base_url();?>/medicineimg/pic5.jpg" alt="Meftal Spas">
									<h4><a>Meftal Spas</a></h4>
									</a>
									<strong>&#x20b9;78.00</strong></p>
									
								</article>
							</div>

							
							<!-- Community poll Widget
							============================================= -->
							
							
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
	
		
		
		
   			<?php $this->load->view("client/templets/footer-links"); ?>
   		<script src="<?php echo base_url();?>/client_assets/js/client_login_model.js"></script>
   		<script src="<?php echo base_url();?>/client_assets/js/add-to-cart.js"></script>
   		
   		<script>
	  	$(document).ready(function(){
	  	
    	$('#homemenu').removeClass("active");
    	$('#shopmenu').addClass("active");

 

});

</script>
	
  </body>

<!-- Mirrored from wahabali.com/work/HugsAndDrugs/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:56:10 GMT -->
</html>