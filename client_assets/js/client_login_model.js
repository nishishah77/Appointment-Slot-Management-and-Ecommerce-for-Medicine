
  $("#myBtn").click(function(){

    $("#myModal").modal();

    });

  $("#myBtn2").click(function(){

	$("#myModal").modal("hide");

	$("#myModal2").modal();
  

	});



    $("#myBtn4").click(function(){

	$("#myModal").modal("hide");

	$("#myModal4").modal();


});
       $("#myBtn5").click(function(){

	$("#myModal4").modal("hide");

	$("#myModal").modal();


});

    function myFunction() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} 
		else {
			x.type = "password";
		}
}


function register()
  {
    var isValid=0;
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var mobile = $("#mobile").val();
    var email_id = $("#emailid").val();
    var pass = $("#password1").val();    
    var date = $("#datepicker").val();
    var gender = $("#gender").val();
    var ads = $("#app_msg").val();
    var confirm_password = $("#cpassword").val();
    
    var namereg=/^[a-zA-Z ]+$/;
     if(first_name=="")
        {
            isValid=isValid+1;
            $("#first_name").attr("placeholder", "Please Enter your first name");
            $('#first_name').css('border', '1px solid red');

        }
        else if(!namereg.test(first_name))
        {
            isValid=isValid+1;
            $('#first_name').val('');
            $("#first_name").attr("placeholder","Please Enter only character...");
            $('#first_name').css('border', '1px solid red');
        }
      else
    {
      $("#first_name").css("border","1px solid #4286f4"); 
    }

        if(last_name=="")
        {
            isValid=isValid+1;
            $("#last_name").attr("placeholder","Please Enter lastname...");
            $('#last_name').css('border', '1px solid red');
        }
        else if(!namereg.test(last_name))
        {
            isValid=isValid+1;
            $('#last_name').val('');
            $("#last_name").attr("placeholder","Please Enter only character...");
            $('#last_name').css('border', '1px solid red');
        }
        else
        {
            
            $("#lastname").css("border","1px solid #4286f4"); 
        }
        var emailreg=/^.+\@.+\...+$/;
        if(email_id=="")
        {
            isValid=isValid+1;
            $("#emailid").attr("placeholder","Please Enter email...");
            $('#emailid').css('border', '1px solid red');
        }
        else if(!emailreg.test(email_id))
        {
            isValid=isValid+1;
            $('#emailid').val('');
            $("#emailid").attr("placeholder","Please Enter valid email address...");
            $('#emailid').css('border', '1px solid red');

        }
        else
        {
          $("#emailid").css("border","1px solid #4286f4"); 
        }

       var mobilereg=/^[789]{1}[0-9]{9}$/;
        if(mobile=="")
        {
            isValid=isValid+1;
            $("#mobile").attr("placeholder","Please enter mobile number...");
            $('#mobile').css('border', '1px solid red');
        }
        else if(!mobilereg.test(mobile))
        {
            isValid=isValid+1;
            $('#mobile').val('');
            $("#mobile").attr("placeholder","Please Enter valid mobile number...");
            $('#mobile').css('border', '1px solid red');
        }
        else
        {
          $("#mobile").css("border","1px solid #4286f4"); 
        }
 
       var passwordreg =/^[A-Za-z0-9\@\$]{5,10}$/;
        if(pass=="")
        {
            isValid=isValid+1;
            $("#password1").attr("placeholder","Please Enter Password...");
            $('#password1').css('border', '1px solid red');
        }
        else if(!passwordreg.test(pass))
        {
            isValid=isValid+1;
            $('#password1').val('');
            $("#password1").attr("placeholder","Please Enter minimum 5 character valid Password...");
            $('#password1').css('border', '1px solid red');

        }
        else
        {
          $("#password1").css("border","1px solid #4286f4"); 
        }
         
        if(confirm_password=="")
        {
            isValid=isValid+1;
            $("#cpassword").attr("placeholder","Please Enter Confirm Password...");
            $('#cpassword').css('border', '1px solid red');

        }
        else if(pass!=confirm_password)
        {
            isValid=isValid+1;
            $('#cpassword').val('');
            $("#cpassword").attr("placeholder","Password Not Match");
            $('#cpassword').css('border', '1px solid red');

        }
        else
        {
          $("#cpassword").css("border","1px solid #4286f4"); 
        }
        var today = new Date();
        var selected_date = new Date(date);
        if(date=="")
        {
              isValid=isValid+1;
            $("#datepicker").css("border","1px solid red");

        }
        else if(selected_date>today)
        {
             isValid=isValid+1;
            $("#datepicker").css("border","1px solid red");
         }
         else
         {
          $("#datepicker").css("border","1px solid #4286f4"); 
         }

        if(gender=="")
        {
            isValid=isValid+1;
            $('#gender').css('border', '1px solid red');
            
        }
        else
        {
          $("#gender").css("border","1px solid #4286f4"); 
        }
      
        
      if(isValid==0){
    

      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Login/register",
          type: "post",
          data: {
                first_name:first_name,
                last_name:last_name,
                mobile:mobile,
                email:email_id,
                dateofbirth:date,
                password:pass,
                gender:gender,
                address:ads        

          },
          success:function(){
            swal({ 
              title: "Register!", 
              text: "Your Account has been Created.", 
              icon: "success" }).then(function() {
    			$("#myModal4").modal("hide");
				$("#myModal").modal();
			});
            	

          },
          error:function(){
           
             swal({ 
              title: "Register!", 
              text: "Something went wrong", 
              icon: "error" }); 

          }
      });
    }
    else
    {
             swal({ 
              title: "Cancel!", 
              text: "Something went wrong", 
              icon: "error" }); 

    }

}

function passwordReset(){


    var email = $("#email").val();


      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Login/passwordReset",
          type: "post",
          data: {

                email:email,         

          },
          success:function(){

            // if(data!="Wrong Email!")
            // {
            swal({ 
              title: "Email!", 
              text: "Your OTP has been sent to your Email address.", 
              icon: "success" }).then(function() {
    			$("#myModal2").modal("hide");
				$("#myModal5").modal();
			});
            	// }
             //  else
             //  {
             //    swal({ 
             //  title: "Email!", 
             //  text: "is wrong", 
             //  icon: "error" }); 


             //  }

          },
          error:function(){
           
             swal({ 
              title: "Email!", 
              text: "Somthing went wrong", 
              icon: "error" }); 

          }
      });


}

function otpVerify(){

	var otp = $("#otp").val();


      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Login/otpVerify",
          type: "post",
          data: {

                otp:otp,         

          },
          success:function(data){
            if(data=="Verified")
            {
            swal({ 
              title: "OTP!", 
              text: "Your OTP has been Verified.", 
              icon: "success" }).then(function() {
    			$("#myModal5").modal("hide");
				$("#myModal3").modal();


			});
            	}
              else
              {
              swal({ 
              title: "OTP!", 
              text: "Your OTP has not been Verified.", 
              icon: "error" }).then(function() {
          $("#myModal5").modal("hide");
        $("#myModal2").modal();
      });
 
              }

          },
          error:function(){
           
             swal({ 
              title: "Email!", 
              text: "Somthing went wrong", 
              icon: "error" }); 

          }
      });

}

function ResetPassword()
  {

    var password = $("#pass").val();
    var cpassword = $("#cpass").val();  
    
    ///alert(password);
    $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Login/ResetPassword",
          type: "post",
          data: {

                password:password         

          },
          success:function(){
            swal({ 
              title: "Password!", 
              text: "Changed Successfully!", 
              icon: "success" }).then(function() {
          $("#myModal3").modal("hide");
        $("#myModal").modal();
      });
   //    $.ajax({

   //        url: "http://localhost:8080/hugsanddrugs/client/Login/ResetPassword",
   //        type: "post",
   //        data: {

   //              password:password,
                    

   //        },
   //        success:function(data){
   //          swal({ 
   //            title: "Changed!", 
   //            text: "Your Password has been Changed.", 
   //            icon: "success" }).then(function() {
   //  			$("#myModal3").modal("hide");
			// 	$("#myModal").modal();
			// });
            	

          },
          error:function(){
           
             swal({ 
              title: "Change!", 
              text: "Somthing went wrong", 
              icon: "error" }); 

          }
      });
    }
//     else
//     {
//                    swal({ 
//               title: "Change!", 
//               text: "Somthing went wrong", 
//               icon: "error" }); 

//     }
// }

function ContactUs()
  {
    var fname = $("#fname").val();
    var email_address = $("#email_address").val();
    var msg = $("#msg").val();
    var isValid=0;
    var Reg_fname = /^[A-Za-z]{3,25}$/;   
    if(fname=="")
    {
      isValid=isValid+1;
      $("#fname").attr("placeholder","Please Enter First Name");
      $("#fname").css("border","1px solid red");
      
    }
    else if(!Reg_fname.test(fname))
    {
      isValid=isValid+1;
      $('#fname').val('');
      $("#fname").attr("placeholder","Please Enter Minimum 3 Character Name");
      $("#fname").css("border","1px solid red");
      
 
    }
    else
    {
      $("#fname").css("border","1px solid #4286f4"); 
    }

    var Reg_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;    
    if(email_address=="")
    {
      isValid=isValid+1;
      $("#email_address").attr("placeholder","Please Enter Email");
      $("#email_address").css("border","1px solid red");
      
    }
    else if(!Reg_email.test(email_address))
    {
      isValid=isValid+1;
      $('#email_address').val('');
      $("#email_address").attr("placeholder","Please Enter Valid Email");
      $("#email_address").css("border","1px solid red");
    }
    else
    {
      $("#email_address").css("border","1px solid #4286f4"); 
    }
    
    
    if(msg=="")
    {
      isValid=isValid+1;
      $("#msg").attr("placeholder","Please Enter Feedback Message");
      $("#msg").css("border","1px solid red");
      
    }
    else
    {
      $("#msg").css("border","1px solid #4286f4"); 
    }



    if(isValid==0)
    {
    

      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Contact_us/insert",
          type: "post",
          data: {
                fname:fname,
                email_address:email_address,
                msg:msg        

          },
          success:function(){
            swal({ 
              title: "Success!", 
              text: "Your message has been sent.", 
              icon: "success" }).then(function() {
                location.reload();
      });
              

          },
          error:function(){
           
             swal({ 
              title: "Error!", 
              text: "Somthing went wrong", 
              icon: "error" }); 

          }
      });

    }
    else
    {
                   swal({ 
              title: "Error!", 
              text: "Somthing went wrong", 
              icon: "error" }); 

    }

}

function feedBack()
   {

    var fname = $("#fname").val();
    var email_address = $("#email_address").val();
    var msg = $("#msg").val();
    var isValid=0;

    var Reg_fname = /^[A-Za-z]{3,25}$/;   
    if(fname=="")
    {
      isValid=isValid+1;
      $("#fname").attr("placeholder","Please Enter First Name");
      $("#fname").css("border","1px solid red");
      
    }
    else if(!Reg_fname.test(fname))
    {
      isValid=isValid+1;
      $('#fname').val('');
      $("#fname").attr("placeholder","Please Enter Minimum 3 Character Name");
      $("#fname").css("border","1px solid red");
      
 
    }
    else
    {
      $("#fname").css("border","1px solid #4286f4"); 
    }

    var Reg_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;    
    if(email_address=="")
    {
      isValid=isValid+1;
      $('#email_address').val('');
      $("#email_address").attr("placeholder","Please Enter Email");
      $("#email_address").css("border","1px solid red");
      
    }
    else if(!Reg_email.test(email_address))
    {
      isValid=isValid+1;
      $("#email_address").attr("placeholder","Please Enter Valid Email");
      $("#email_address").css("border","1px solid red");
    }
    else
    {
      $("#email_address").css("border","1px solid #4286f4"); 
    }
    
 
    if(msg=="")
    {
      isValid=isValid+1;
      $("#msg").attr("placeholder","Please Enter Feedback Message");
      $("#msg").css("border","1px solid red");
      
    }
    else
    {
      $("#msg").css("border","1px solid #4286f4"); 
    }



    if(isValid==0)
    {
      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Contact_us/feedback_insert",
          type: "post",
          data: {
                fname:fname,
                email_address:email_address,
                msg:msg        

          },
          success:function(){
            swal({ 
              title: "Success!", 
              text: "Your message has been sent.", 
              icon: "success" }).then(function() {
                location.reload();
      });
              

          },
          error:function(){
           
             swal({ 
              title: "Error!", 
              text: "Somthing went wrong", 
              icon: "error" }); 

          }
      });
    }
    else
    {
              swal({ 
              title: "Error!", 
              text: "Somthing went wrong", 
              icon: "error" }); 

    }

}
