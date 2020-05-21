<!-- Login Modal
============================================= -->
	<!-- Login -->
	<div class="modal fade" id="myModal" role="dialog">
      	<div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

              <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="na na-tab md-tabs tabs-2 light-blue darken-3" role="tablist">
                	<li class="nav-item waves-effect waves-light">
                		<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab" aria-selected="false">
                      	<b>Login</b></a>
                	</li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                  <!--Panel 7-->
                	<div class="tab-pane fade in active show" id="panel1" role="tabpanel">

                    <!--Body-->

	                    <div class="modal-body">

	                    	<?php 
								$page="";
								if(isset($_REQUEST['page']))
								{
									$page = $_REQUEST['page'];
								}
								$medicine ="";
							if(isset($_REQUEST['medicine']))
								{
									$medicine = $_REQUEST['medicine'];
								}

							?>

	                    	<form action="<?php echo base_url();?>/client/login/login_session?page=<?php echo $page;if($medicine!=""){ echo "&medicine=".$medicine;} ?>" class="loginmodal-forrm" method="post" id="login">
	                    	<div class="row">
		                      	<div class="col-md-6" style="margin-left:10%;width:75%;">
		                      		
			                        <input name="username" placeholder="Enter Your Email Address" type="email" id="username">
			                    </div>
			                </div>
			                <div class="row">
		                      	<div class="col-md-6">
			                    </div>
			                </div>
			                <div class="row">
		                    	<div class="col-md-6" style="margin-top:3%; margin-left:10%;width:75%;">
			                        <input placeholder="Enter Your Password" name="password" id="password" type="password">
		                    	</div>
	                    	</div>

	                    	<div class="row">
		                    	<div class="col-md-6" style="margin-top:3%; margin-left:10%;">
			                        <input type="checkbox" value="show password" onclick="myFunction()">  &nbsp;Show password
		                    	</div>
	                    	</div>

	                    	<div class="row">
			                    <div class="col-md-12" style="margin-top:3%;margin-left:33% ">
			                    	<button  type="submit" class="btn btn-default btn-rounded">Login</button>
			                    </div>
			                </div>
			                <div class="row">
		                    	<div class="col-md-6" style="margin-top:3%; margin-left:10%;">
			                        <a href="#" id="myBtn2">Forgot Password?</a>
		                    	</div>
	                    	</div>
	                    	<div class="row">
		                    	<div class="col-md-6" style="margin-top:3%; margin-left:10%;">
			                        <a href="#" id="myBtn4">Doesn't have an account?</a>
		                    	</div>
	                    	</div>
			                </form>

	                    </div>

                    <!--Footer-->

	                    <div class="modal-footer">

	                    	<div class="row">
	                    		<div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	<button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Close</button>
			                    </div>
			                </div>

	                    </div>

                	</div>
                  <!--/.Panel 7-->
                </div>

            </div>
            </div>
            <!--/.Content-->
          </div>
 	</div>

 	<!-- Password Recovery -->
 	<div class="modal fade" id="myModal2" role="dialog">
      	<div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

              <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="na na-tab md-tabs tabs-2 light-blue darken-3" role="tablist">
                	<li class="nav-item waves-effect waves-light">
                		<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab" aria-selected="false">
                      	<b>Password Recovery</b></a>
                	</li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                  <!--Panel 7-->
                	<div class="tab-pane fade in active show" id="panel1" role="tabpanel">

                    <!--Body-->

	                    <div class="modal-body">
	                    	<form method="post" class="loginmodal-forrm">
	                    	<div class="row">
		                      	<div class="col-md-6" style="margin-left:10%;width:75%;">
		                      		
			                        <input name="email" id="email" placeholder="Enter Your Email Address" type="email">
			                    </div>
			                </div>			      

	                    	<div class="row">
			                    <div class="col-md-12" style="margin-top:3%;margin-left:33% ">
			                    	<button type="button"  onclick="passwordReset()" id="myBtn3" class="btn btn-default btn-rounded">Submit</button>
			                    </div>
			                </div>
			                </form>

	                    </div>

                    <!--Footer-->

	                    <div class="modal-footer">

	                    	<div class="row">
	                    		<div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	<button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Close</button>
			                    </div>
			                </div>

	                    </div>

                	</div>
                  <!--/.Panel 7-->

                  
                </div>

            </div>
            </div>
            <!--/.Content-->
          </div>
 	</div>

 	<!-- OTP -->
 	<div class="modal fade" id="myModal5" role="dialog">
      	<div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

              <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="na na-tab md-tabs tabs-2 light-blue darken-3" role="tablist">
                	<li class="nav-item waves-effect waves-light">
                		<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab" aria-selected="false">
                      	<b>Verifiy Code</b></a>
                	</li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                  <!--Panel 7-->
                	<div class="tab-pane fade in active show" id="panel1" role="tabpanel">

                    <!--Body-->

	                    <div class="modal-body">
	                    	<form method="post" class="loginmodal-forrm">
	                    	<div class="row">
		                      	<div class="col-md-6" style="margin-left:10%;width:75%;">
		                      		
			                        <input name="otp" id="otp" placeholder="Enter Your Verification Code" type="text">
			                    </div>
			                </div>			      

	                    	<div class="row">
			                    <div class="col-md-12" style="margin-top:3%;margin-left:33% ">
			                    	<button type="button" onclick="otpVerify()" id="myBtn3" class="btn btn-default btn-rounded">Verify</button>
			                    </div>
			                </div>
			                </form>

	                    </div>

                    <!--Footer-->

	                    <div class="modal-footer">

	                    	<div class="row">
	                    		<div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	<button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Close</button>
			                    </div>
			                </div>

	                    </div>

                	</div>
                  <!--/.Panel 7-->

                  
                </div>

            </div>
            </div>
            <!--/.Content-->
          </div>
 	</div>
 	<!-- Reset Password -->
 	<div class="modal fade" id="myModal3" role="dialog">
      	<div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

              <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="na na-tab md-tabs tabs-2 light-blue darken-3" role="tablist">
                	<li class="nav-item waves-effect waves-light">
                		<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab" aria-selected="false">
                      	<b>Reset Password</b></a>
                	</li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                  <!--Panel 7-->
                	<div class="tab-pane fade in active show" id="panel1" role="tabpanel">

                    <!--Body-->

	                    <div class="modal-body">
	                    	<form method="post" class="loginmodal-forrm">
	                    	<div class="row">
		                      	<div class="col-md-6" style="margin-left:10%;width:75%;">
		                      		
			                        <input  name="pass" id="pass" placeholder="Enter Your New Password" type="password">
			                    </div>
			                </div>

			                <div class="row">
		                    	<div class="col-md-6" style="margin-top:3%; margin-left:10%;width:75%;">
			                        <input name="cpass" id="cpass" placeholder="Confirm Your Password" type="password">
		                    	</div>
	                    	</div>


	                    	<div class="row">
			                    <div class="col-md-12" style="margin-top:3%;margin-left:33% ">
			                    	<button  type="button" onclick="ResetPassword()" class="btn btn-default btn-rounded">Reset</button>
			                    </div>
			                </div>
			                </form>

	                    </div>

                    <!--Footer-->

	                    <div class="modal-footer">

	                    	<div class="row">
	                    		<div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	<button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Close</button>
			                    </div>
			                </div>

	                    </div>

                	</div>
                  <!--/.Panel 7-->

                  
                </div>

            </div>
            </div>
            <!--/.Content-->
          </div>
 	</div>

 	<!-- Register -->
 	<div class="modal fade" id="myModal4" role="dialog">
      	<div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

              <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="na na-tab md-tabs tabs-2 light-blue darken-3" role="tablist">
                	<li class="nav-item waves-effect waves-light">
                		<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab" aria-selected="false">
                      	<b>Register</b></a>
                	</li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                  <!--Panel 7-->
                	<div class="tab-pane fade in active show" id="panel1" role="tabpanel">

                    <!--Body-->

	                    <div class="modal-body">
	                    	<form method="post" id="registration_form"  class="loginmodal-forrm">
	                    	<div class="row">
		                      	<div class="col-md-6">
			                        <input name="first_name" id="first_name" placeholder="Enter Your First Name" type="text">
			                    </div>
			                    <div class="col-md-6">
			                        <input name="last_name" id="last_name" placeholder="Enter Your Last Name" type="text">
			                    </div>
			                </div>
			                <div class="row">
		                      	<div class="col-md-6">
			                        <input name="email"  id="emailid" placeholder="Enter Your Email Address" type="email">
			                    </div>
			                    <div class="col-md-6">
			                        <input name="mobile" id="mobile" placeholder="Enter Your Mobile Number" type="text">
			                    </div>
			                </div>
			                <div class="row">
		                      	<div class="col-md-6">
			                        <input name="password" id="password1" placeholder="Enter Your Password" type="password">
			                    </div>
			                    <div class="col-md-6">
			                        <input name="cpassword" id="cpassword" placeholder="Confirm Your Password" type="password">
			                    </div>
			                </div>
			                <div class="row">
		                      	<div class="col-md-6">
			                    <select style="width: 100%" name="gender" id="gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
			                    </div>
			                    <div class="col-md-6">
		                      	<input type="text" name="dateofbirth" id="datepicker" placeholder="Birth Date">
			                    </div>
			                </div>
			                <div class="row">
		                      	<div class="col-md-6">
		                      		<textarea style="width: 100%;height:50%;"  placeholder="Address" name="app_msg" id="app_msg"></textarea>
			                    </div>
			                    <div class="col-md-6">

			                    </div>
			                </div>

	                    	<div class="row">
			                    <div class="col-md-12" style="margin-top:3%;margin-left:33% ">
			                    	<button  type="button" onclick="register()" class="btn btn-default btn-rounded">Register</button>
			                    </div>
			                </div>
			                <div class="row">
		                    	<div class="col-md-6" style="margin-top:3%;">
			                        <a href="#" id="myBtn5">Already have an account?</a>
		                    	</div>
	                    	</div>
			                </form>

	                    </div>

                    <!--Footer-->

	                    <div class="modal-footer">

	                    	<div class="row">
	                    		<div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	
			                    </div>
			                    <div class="col-md-4">
			                    	<button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Close</button>
			                    </div>
			                </div>

	                    </div>

                	</div>
                  <!--/.Panel 7-->
                </div>

            </div>
            </div>
            <!--/.Content-->
          </div>
 	</div>