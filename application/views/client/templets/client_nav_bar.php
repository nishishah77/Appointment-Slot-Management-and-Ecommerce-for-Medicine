<!-- Header
============================================= -->
			<header id="header" class="medicom-header">
			
				<!-- Top Row
				============================================= -->
				<div class="colourfull-row"></div>
			
				<div class="container">
					
					
					<!-- Primary Navigation
					============================================= -->
					<nav class="navbar navbar-default" role="navigation">
					
						<!-- Brand and toggle get grouped for better mobile display
						============================================= -->
						
						<div class="navbar-header">
							
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-nav">
							  <span class="sr-only">Toggle navigation</span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							</button>
							
							<a class="navbar-brand" href="<?php echo base_url();?>/client/Home?page=index&medicine="><img src="<?php echo base_url();?>/client_assets/images/logo.png" alt="" title=""></a>
						
						</div>
					
						
						<div class="collapse navbar-collapse navbar-right" id="primary-nav">
							
							<ul class="nav navbar-nav" id="activeli">
								
								<li class="dropdown" id="Homemenu">
										<a href="<?php echo site_url('client/Home?page=index');?>" class="dropdown-toggle">Home</a>						
										
									</li>
								
								<li class="dropdown" id="about_usmenu" >
									<a href="<?php echo site_url('client/about_us?page=about-us');?>" class="dropdown-toggle">About Us</a>
									
								</li>
								<li class="dropdown" id="doctormenu">
									<a href="<?php echo site_url('client/Doctor?page=Doctor');?>" class="dropdown-toggle">Doctor</a>

									<ul class="dropdown-menu" style="columns:2;     
											      width: 500px ;
   												  height: 500px;">
												<li><a style="color:#2b96cc !important;"><strong>SPECIALITY</strong>
														</a></li>

											    
											    <?php

													foreach($DoctorSpecialityList as $specialist)
													{
													?>
													<li><a href="<?php echo "doctor"."?doctor=".$specialist['speciality_id'];?>">
														<?php echo $specialist['doctor_speciality'];?></a></li>
													<?php
												
												  
												}
												?>

											</ul>
									
								</li>
							  
							  
								<li class="dropdown" id="hospitalmenu">
									<a href="<?php echo site_url('client/Hospital?page=Hospital');?>" class="dropdown-toggle">Hospital</a>
									
										<ul class="dropdown-menu" style="columns:2;     
											      width: 500px ;
   												  height: 500px;">
												<li><a style="color:#2b96cc !important;"><strong>SPECIALITY</strong>
														</a></li>

												<?php

													foreach($HospitalSpecialityList as $specialist)
													{
													?>
													<li><a href="<?php echo "hospital"."?hospital=".$specialist['speciality_id'];?>">
														<?php echo $specialist['hospital_speciality'];?></a></li>
													<?php
												
												  
												}
												?>
											</ul>
									
								</li>
							  
									<?php
								?>
									<?php if(isset($_SESSION['doctor_id']) || isset($_SESSION['hospital_id']))
									{
								    }
								    else
								    {

								    	?>
								  
									<li class="dropdown last">
										<a href="<?php echo site_url('client/shop?page=shop');?>" class="dropdown-toggle">Shop</a>
										
									</li>
								    	<?php
								    }
									?>
							  
								<li class="dropdown last" id="contactmenu">
									<a href="<?php echo site_url('client/contact_us?page=contact-us');?>" class="dropdown-toggle">Contact Us</a>
									
								</li>
								<?php
										

												if(isset($_SESSION['username']))
												{

										        $name = $_SESSION['username'];
										        ?><li class="dropdown "><a   class="dropdown-toggle" ><?php
													echo "Hello ".$name;
												?>

										</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url();?>/client/Profile?page=Profile">View Profile</a></li>
											<li><a href="<?php echo site_url('client/shop/shopping_cart?page=shopping_cart');?>">View Cart</a></li>
											<?php 
											$page="";
												if(isset($_REQUEST['page']))
												{
													$page = $_REQUEST['page'];
												}
												$medicine="";
												if(isset($_REQUEST['medicine']))
												{
													$medicine = $_REQUEST['medicine'];
												}
											?>
											<li><a href="<?php echo base_url();?>/client/login/logout?page=<?php if($page!="") {echo $page;} if($medicine!=""){ echo "&medicine=".$medicine;}?>">Logout</a></li>
										</ul>
									</li>

											<?php
											}
											else
											{
												?><li class="dropdown"><a id="myBtn" class="dropdown-toggle" >
													<?php
												echo "Login / Register";
												?>
												
												<?php
											}
											?>
											
										</a>
									</li>
							  
							</ul>
							
						</div>
						
					</nav>

				</div>
				
				<div class="header-bottom-line"></div>

			</header>


			
		
			

