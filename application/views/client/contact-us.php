<!DOCTYPE html>
<html lang="en" class="no-js">
  
<!-- Mirrored from wahabali.com/work/medicom/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:56:10 GMT -->
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



	</head>
    <body class="fixed-header">
		
		
    
		<!-- Document Wrapper
		============================================= -->
		<div id="wrapper" class="clearfix">
    
    
			<?php $this->load->view("client/templets/client_nav_bar") ?>

			<?php $this->load->view("client/templets/client_login") ?>
			
			
			
			<!-- Sub Page Banner
			============================================= -->
			<section class="sub-page-banner text-center" data-stellar-background-ratio="0.3">
				
				<div class="overlay"></div>
				
				<div class="container">
					<h1 class="entry-title">Contact Us</h1>
					<p>-------------------------------------</p>
				</div>
				
			</section>
    
    
  
    
			<!-- Sub Page Content
			============================================= -->
			<div id="sub-page-content" class="clearfix">
				
				<div class="container">
					<div class="row">
						
						<div class="col-md-8">
							
							<h2 class="light bordered">Give us a <span>Message</span></h2>
							
							
							<!-- Contact Form
							============================================= -->
							<div class="contact-form clearfix">
								<form name="contact_form" id="contact_form"  method="post" >
									<input type="text" name="fname" id="fname" placeholder="First Name" >
									<input type="text" name="email_address" id="email_address" placeholder="Email Address">
									<textarea placeholder="Message" name="msg" id="msg"></textarea>
									<input type="button" onclick="ContactUs()" class="btn btn-default" value="Submit">
								</form>
							</div>
							
						</div>
						
						<div class="col-md-4">
							
							<h2 class="light bordered">get in <span>touch</span></h2>
							
							
							<!-- Get in Touch Widget
							============================================= -->
							<div class="get-in-touch-widget">
								
								<ul class="list-unstyled">
									<li><i class="fa fa-phone"></i>(+09) 0323 750 4561</li>
									<li><i class="fa fa-envelope"></i><a href="#.">quickhelp@medicom.com</a></li>
									<li><i class="fa fa-globe"></i><a href="#.">www.medicom.com</a></li>
								</ul>
								
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
	
		
		
		
    			<?php $this->load->view("client/templets/footer-links"); ?>
    			   		<script src="<?php echo base_url();?>/client_assets/js/client_login_model.js"></script>

 <script>
	
	  	$(document).ready(function(){
	  	//	alert("hh");
    	$('#homemenu').removeClass("active");
    	$('#contactmenu').addClass("active");
});

</script>
	
  </body>

<!-- Mirrored from wahabali.com/work/medicom/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:56:11 GMT -->
</html>