
	<!-- Main navigation -->

<div class="sidebar sidebar-main sidebar-default">
	<div class="sidebar-fixed">
				<div class="sidebar-content">
					<div class="sidebar-category sidebar-category-visible">
						<div class="sidebar-user-material">
							<div class="category-content">
								<div class="sidebar-user-material-content">
									<a href="#"><img src="<?php echo base_url();?>/adminimg/<?=$adminimg;?>" class="img-circle" alt=""></a>
									<h6><?=$admin_name;?></h6>
									
									<span class="text-size-small">Surat  ,India</span>
								</div>
															
								<div class="sidebar-user-material-menu">
									<a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
								</div>
							</div>
							
							<div class="navigation-wrapper collapse" id="user-nav" style="height:40px">
								<ul class="navigation">
									<li><a href="<?php echo site_url('admin/Admin/Profile');?>"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
									<li><a href="<?php echo site_url('admin/ChangePassword/Change');?>"><i class="icon-cog5"></i> <span>Change Password</span></a></li>
									<li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
								</ul>
							</div>
						</div>

						<div class="category-content no-padding" >
							<ul class="navigation navigation-main navigation-accordion" id="activeli">

								<!-- Main -->
								<li>
									<a href="<?php echo site_url("admin/Dashboard");?>"><i class="icon-home2"></i> <span>Dashboard</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-wheelchair fa-lg"></i><span>Patient</span></a>
									<ul>
										<li>
											<a href="<?php echo site_url('admin/Patient/Add');?>">Add Patient
											</a>
										</li>
										<li>
											<a href="<?php echo site_url('admin/Patient/View');?>">View Patient</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="fa fa-stethoscope fa-lg"></i>  <span>Doctors</span></a>
									<ul>
										<li><a href="<?php echo site_url('admin/Doctor/Add');?>" id="layout1">Add Doctor</a></li>
										<li><a href="<?php echo site_url('admin/Doctor/View');?>" id="layout5">View Doctor</a></li>
									</ul>
								</li>
							
								<li>
									<a href="#"><i class="fa fa-h-square fa-lg"> </i>  <span>Hospital</span></a>
									<ul>
										<li><a href="<?php echo site_url('admin/Hospital/Add');?>">Add Hospital</a></li>
										<li><a href="<?php echo site_url('admin/Hospital/View');?>">View Hospital</a></li>
									
									</ul>
								</li>
								<li>
									<a href="#"><i class="fas fa-pills fa-lg"> </i>  <span>Medicine</span></a>
									<ul>
											<li><a href="<?php echo site_url('admin/Medicine/Add');?>">Add Medicine</a></li>
											<li><a href="<?php echo site_url('admin/Medicine/View');?>">View Medicine</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="fa fa-user-plus fa-lg"> </i>  <span>Admin</span></a>
									<ul>
										<li><a href="<?php echo site_url('admin/Admin/Add');?>">Add Admin</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="fa fa-user-plus fa-lg"> </i>  <span>Country</span></a>
									<ul>
										<li><a href="<?php echo site_url('admin/Country/Add');?>">Add Country</a></li>
									</ul>
									<ul>
										<li><a href="<?php echo site_url('admin/Country/Edit');?>">Edit Country</a></li>
									</ul>
									<ul>
										<li><a href="<?php echo site_url('admin/Country/View');?>">View Country</a></li>
									</ul>

								</li>
									<li>
									<a href="#"><i class="fa fa-user-plus fa-lg"> </i>  <span>City</span></a>
									<ul>
										<li><a href="<?php echo site_url('admin/City/Add');?>">Add City</a></li>
									</ul>
									<ul>
										<li><a href="<?php echo site_url('admin/City/Edit');?>">Edit City</a></li>
									</ul>
									<ul>
										<li><a href="<?php echo site_url('admin/City/View');?>">View City</a></li>
									</ul>

								</li>
								<li>
									<a href="#"><i class="fa fa-user-plus fa-lg"> </i>  <span>State</span></a>
									<ul>
										<li><a href="<?php echo site_url('admin/State/Add');?>">Add State</a></li>
									</ul>
									<ul>
										<li><a href="<?php echo site_url('admin/State/Edit');?>">Edit State</a></li>
									</ul>
									<ul>
										<li><a href="<?php echo site_url('admin/State/View');?>">View State</a></li>
									</ul>

								</li>


							</ul>
						</div>
					</div>
				</div>
	</div>
</div>
			<!-- /main navigation -->