<!DOCTYPE html>
<html lang="en" class="no-js">
  
<!-- Mirrored from wahabali.com/work/medicom/meet-team.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:48:27 GMT -->
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
			<script type="text/javascript" src="<?php echo base_url();?>/client_assets/js/search.js"></script>


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
					<h1 class="entry-title">meet team</h1>
					<p>----------------------------------------------------------------</p>
				</div>
				
			</section>
    
    
			
			<!-- Sub Page Content
			============================================= -->

			<div id="sub-page-content" class="clearfix">
			
			
				<div class="container">
					
					<h2 class="light bordered main-title">Meet <span>specialist</span></h2>

					<div class="row">
							<aside class="col-md-4">
							
									<!-- Search Widget
										============================================= -->
								<div class="sidebar-widget">
								<div class="search clearfix">
									<form method="post" >
										<input type="text" id="search_doctor" placeholder="Search...">
										<button type="button" onclick="searchDoctor();"  class="search-icon" ><i class="fa fa-search"></i></button>
									</form>
								</div>
								</div>	
							</aside>
						</div>
					
					<div id="doctordata">
						
					</div>
					
				</div>

				<section class="doctors-list">
					
					<div class="container">
						
						<h2 class="light bordered">our <span>Specialists</span></h2>
						
						<ul class="list-unstyled owl-carousel row" id="our-doctors-list">
													<?php
                      
						 foreach($DoctorList as $list)
						{
							
							?>

							<li>
								
								<div class="doctors-img"><img src="<?php echo base_url();?>/doctorimg/<?php echo $list['doctorimg'];?>" width="234" height="320" alt="" title="">
									
								</div>
								
								<div class="doctors-detail">
									<h4><?php echo $list['doctor_name'];?><span> doctor at <?php echo $list['hospital_name'];?></span></h4>
									<p><label class="heading">Speciality</label><label class="detail"><?php echo $list['doctor_speciality'];?></label></p>
									<p><label class="heading">Degrees</label><label class="detail"><?php echo $list['qualification'];?></label></p>
									<p><label class="heading">Experience</label><label class="detail"><?php echo $list['experience'];?> years of Experience</label></p>
									<p><label class="heading">Contact</label><label class="detail"><?php echo $list['contact_number'];?></label></p>
									<p><label class="heading">Consultancy Fees</label><label class="detail"><?php echo $list['consultancy_fees'];?></label></p>
								</div>
								
							</li>
							<?php
						}
							?>
							
						</ul>
						
					</div>
					
				</section>

			</div>
			
				
						
					
					
					
				
    
    
	
		<!--end sub-page-content-->
    <br><br><br>
    
    
		
	
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
    	$('#doctormenu').addClass("active");
});

</script>

	
  </body>

<!-- Mirrored from wahabali.com/work/medicom/meet-team.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 10:49:08 GMT -->
</html>