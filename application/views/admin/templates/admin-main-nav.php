<div class="navbar navbar-inverse bg-indigo" style="background: black;">
		<div class="navbar-header" >
			<a class="navbar-brand" href="<?php site_url("admin/Dashboard"); ?>"><img src="<?php echo base_url();?>/assets/images/logo.png" style="width: 150px;height: 40px;"></a>

		
		</div>
<br>
		<div class="navbar-collapse collapse" id="navbar-mobile">
	
			<ul class="nav navbar-nav navbar-right">
		
				

			
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user fa-lg position-left"> </i>
						<span>Admin</span>
						<i class="caret"></i>
					</a>
					
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo site_url("admin/Admin/Profile"); ?>"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
						<li><a href="<?php echo site_url("admin/ChangePassword/Change"); ?>"><i class="icon-cog5"></i> <span>Change Password</span></a></li>
						<li><a href="<?php echo site_url("admin/Login/logout"); ?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>