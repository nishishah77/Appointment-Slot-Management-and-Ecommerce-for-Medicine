<!DOCTYPE html>
<html lang="en" class="no-js">
  
<!-- Mirrored from wahabali.com/work/medicom/shopping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:56:10 GMT -->
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
	 
	 
	
    
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	
	
	<!-- SCRIPTS
    
     ================================================== -->
	
				<?php $this->load->view("client/templets/header-links"); ?>
	


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
					<h1 class="entry-title">Cart</h1>
					
				</div>
				
			</section>
    
    

    
    
			<!-- Sub Page Content
			============================================= -->
			<div id="sub-page-content" class="clearfix">

				<div class="container">
					
					<div class="row">
						
						<div class="col-md-12 clearfix">
							
							
							<!-- Shopping Cart
							============================================= -->
							<h2 class="bordered light">Shopping <span>Cart</span></h2>
							
							<div class="cart-list clearfix">
								
								<div class="overflow">
									<?php
								if($cartdata!=""){
								?>
									<div class="cart-bar clearfix">
										<div class="cart-product-heading">Product</div>
										<div class="cart-price-heading">Price</div>
										<div class="cart-quantity-heading">Quantity</div>
										<div class="cart-total-heading">Total</div>
										<div class="cart-remove">&nbsp;</div>
									</div>
									<?php
								}
									?>
									<?php 

									 //print_r($cartdata);
									if($cartdata!="")
									{
										$total=0;
									foreach ($cartdata as $med) {
										?>

									<div class="cart-bar-list">
										
										<div class="cart-product">
											<a href="#." class="pull-left"><img src="<?php  echo base_url()."medicineimg/".$med ['img'] ;?>" alt="" width="80"></a>

											<h4><?php echo $med['name'];?></h4>
											
										</div>
										
										<div class="cart-price"><span class="amount"><i class="fa fa-inr"></i> <?php echo $med['price'];?></span></div>
										
										<div class="cart-quantity">
											<div class="item-counter">
												<span class="pull-left" id="less-item">-</span>
												<input type="text" name="qty[]" class="items-total" id="total-items"  value="<?php echo $med['qty']; ?>">
												<span class="pull-right" id='pluss-item'>+</span>
											<div class="clr"></div>
											</div>
										</div>

										
										<div class="cart-total">
											<span class="amount"><i class="fa fa-inr"></i> <?php 
											 $total+=$med['price']*$med['qty']; echo $med['price']*$med['qty'];?></span>
										</div>
										
										<div class="product-remove2">
											<span><a href="deleteone?medicine=<?php echo $med['id'];?>">x</a></span>
										</div>
										
									</div>

									<?php } 
									
								}
								else
								{
									?>
									<center><span style="">No Items!</span></center>
									<?php


								}

									?>
								
								</div>	
								<?php
								if($cartdata!=""){
								?>
								<div class="cart-buttons">
									
									<div class="pull-right">
										<a  class="btn btn-default btn-rounded" onclick="UpdateCart();">Update cart</a>
										<a href="http://localhost:8080/hugsanddrugs/paymentGateway/index.php?name=<?php echo $_SESSION['first_name'];?>&email=<?php echo $_SESSION['username'];?>&mobile=<?php echo $_SESSION['mobile_number'];?>&amount=<?php echo $total;?>"class="btn btn-default btn-rounded">Procede to checkout</a>
									</div>
									
								</div>
								<?php
							}

								?>
							
								
							</div>
							   
							<div class="height40"></div>
							   
							<div class="row">
								
								<div class="col-md-6">
									
									<div class="cart-shipping clearfix">
										
										
										<!-- Calculate Shipping
										============================================= -->
										
								    </div> 
								   
								</div>
								
								<div class="col-md-6">
								
									<div class="cart-shipping clearfix">
										
										
										<!-- Cart Totals
										============================================= -->
										
									
								</div>
								
							</div>
							   
						</div>
						
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

	
  </body>

<!-- Mirrored from wahabali.com/work/medicom/shopping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:56:10 GMT -->
</html>