$(document).ready(function () {
  
  $("#appoint_form").submit(function(e){

     e.preventDefault();
  var app_fname = $("#app_fname").val();
  var app_lname = $("#app_lname").val();
  var app_email_address = $("#app_email_address").val();
  var app_phone = $("#app_phone").val();
  var appointment_date = $("#appointment_date").val();
  var gender = $("#app_gender").val();
  var hospital = $("#hospital").find('option:selected').val();
  var doctor = $("#doctor").find('option:selected').val();
  var hospital_name = $("#hospital").find('option:selected').text();
  var doctor = $("#doctor").find('option:selected').val();
  var doctor_name = $("#doctor").find('option:selected').text();
  var appointment_time=$("#time").find('option:selected').val()
   var patient_id = 0;

    var isValid=0;

    var Reg_fname = /^[A-Za-z]{3,25}$/;    
    if(app_fname=="")
    {
      isValid=isValid+1;
      $("#app_fname").attr("placeholder","Please Enter First Name");
      $("#app_fname").css("border","1px solid red");
      
    }
    else if(!Reg_fname.test(app_fname))
    {
      isValid=isValid+1;
      $('#app_fname').val('');
      $("#app_fname").attr("placeholder","Please Enter Minimum 3 Character First Name");
      $("#app_fname").css("border","1px solid red");
      
 
    }
    else
    {
      $("#app_fname").css("border","1px solid #4286f4"); 
    }

    var Reg_lname = /^[A-Za-z]{3,25}$/;    
    if(app_lname=="")
    {
      isValid=isValid+1;
      $("#app_lname").attr("placeholder","Please Enter Last Name");
      $("#app_lname").css("border","1px solid red");
      
    }
    else if(!Reg_fname.test(app_lname))
    {
      isValid=isValid+1;
      $('#app_lname').val('');
      $("#app_lname").attr("placeholder","Please Enter Minimum 3 Character Last Name");
      $("#app_lname").css("border","1px solid red");
      
 
    }
    else
    {
      $("#lname").css("border","1px solid #4286f4"); 
    }

    var Reg_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;    
    if(app_email_address=="")
    {
      isValid=isValid+1;
      $("#app_email_address").attr("placeholder","Please Enter Email");
      $("#app_email_address").css("border","1px solid red");
      
    }
    else if(!Reg_email.test(app_email_address))
    {
      isValid=isValid+1;
      $('#app_email_address').val('');
      $("#app_email_address").attr("placeholder","Please Enter Valid Email");
      $("#app_email_address").css("border","1px solid red");
    }
    else
    {
      $("#app_email_address").css("border","1px solid #4286f4"); 
    }

    var Reg_phone = /^[789]{1}[0-9]{9}$/;    
    if(app_phone=="")
    {
      isValid=isValid+1;

      $("#app_phone").attr("placeholder","Please Enter Contact Number");
      $("#app_phone").css("border","1px solid red");
      
    }
    else if(!Reg_phone.test(app_phone))
    {
      isValid=isValid+1;
      $('#app_phone').val('');
      $("#app_phone").attr("placeholder","Please Enter 10 Digit Contact Number Starts with 7 or 8 or 9");
      $("#app_phone").css("border","1px solid red");
    }
    else
    {
      $("#app_phone").css("border","1px solid #4286f4"); 
    }

  if(doctor=="")
    {
      isValid=isValid+1;
      
      $("#doctor").css("border","1px solid red");
      
    }
    else
    {}

  if(hospital=="")
    {
      isValid=isValid+1;
      
      $("#hospital").css("border","1px solid red");
      
    }
    else
    {}

  var today = new Date();
  var selected_date = new Date(appointment_date);

  if(appointment_date=="")
  {
      isValid=isValid+1;
      $("#appointment_date").css("border","1px solid red");
 
  }
  else if(selected_date < today)
  {
       isValid=isValid+1;
      $("#appointment_date").css("border","1px solid red");
      //alert("hi");
   }
   else
   {
    $("#appointment_date").css("border","1px solid #4286f4"); 
   }
  if(gender=="")
    {
      isValid=isValid+1;
      
      $("#app_gender").css("border","1px solid red");
      
    }
    else
    {}

  if(appointment_time=="")
    {
      isValid=isValid+1;
      
      $("#time").css("border","1px solid red");
      
    }
    else
    {}


    if(isValid==0)
    {
     $.ajax({

      url:"http://localhost:8080/hugsanddrugs/client/home/check_session?fname="+app_fname+"&lname="+app_lname+"&email="+app_email_address+"&phone="+app_phone+"&appointment_date="+appointment_date+"&gender="+gender+"&hospital="+hospital+"&hospital_name="+hospital_name+"&doctor_name="+doctor_name+"&appointment_time="+appointment_time+"&doctor="+doctor,
      type:"POST",
      data:{},
      success:function(data)
      {
        if(data=="session not started!")
        {
         
        
          
          $("#myModal").modal();

          $("#login").submit(function(e){

             
            var username = $("#username").val();
            var password = $("#password").val();

        $.ajax({

                url:"http://localhost:8080/hugsanddrugs/client/home/login_check",
                type:"POST",
                data:{
                  username:username,
                  password:password,

                },
                success:function(data)
                {                
                   if(data=="not login!")
                   {
                    //window.reload();
                  }
                else
                 {
                    
                     patient_id = data;
                  
              $.ajax({

                url:"http://localhost:8080/hugsanddrugs/client/home/insert",
                type:"POST",
                data:{
                  patient_information_id:patient_id,
                  app_fname : app_fname,
                  app_lname: app_lname,
                  app_email_address: app_email_address,
                  app_phone:app_phone,
                  datepicker:appointment_date,
                  gender:gender,
                  hospital:hospital,
                  doctor:doctor,
                  doctor_name:doctor_name,
                  hospital_name:hospital_name,
                  appointment_time:appointment_time,
                  msg:'Booking confirmation: Hello '+app_fname+' '+app_lname +'. '+ doctor_name+' from '+ hospital_name +' is expecting you on '+ appointment_date+'. Thank you for your booking!'

                },
                success:function(data)
                {

                  
                  swal({ 
                      title: "Appointment!", 
                      text: "Your Appointment is booked .", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Home?page=index');
                      });
                  
                  
                }
              });                  
                 }
                },error:function(data)
                {
                  
                }

              });

          });

        }
        else
        {
              $.ajax({

                url:"http://localhost:8080/hugsanddrugs/client/home/insert",
                type:"POST",
                data:{                  
                  app_fname : app_fname,
                  app_lname: app_lname,
                  app_email_address: app_email_address,
                  app_phone:app_phone,
                  datepicker:appointment_date,
                  gender:gender,
                  hospital:hospital,
                 doctor_name:doctor_name,
                  hospital_name:hospital_name,
                  doctor:doctor,
                  appointment_time:appointment_time,
                  
              msg:'Booking confirmation: Hello '+app_fname+' '+app_lname +'. '+ doctor_name+' from '+ hospital_name +' is expecting you on '+ appointment_date+' at '+ appointment_time +'. Thank you for your booking!'

                },
                success:function(data)
                {
                  
                swal({ 
                      title: "Appointment!", 
                      text: "Your Appointment is booked .", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Home?page=index');
                      });
                }
              });          

        }
      }

    });
}
else
{
                    swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong", 
                      icon: "error" });

}

});

});