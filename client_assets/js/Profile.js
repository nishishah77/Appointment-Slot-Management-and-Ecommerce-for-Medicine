
  

function getState(id){
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/client/GetData/getState",
        type:"POST",
        dataType: 'json',
        data: {country:id.value},
        beforeSend : function(){

        },
        success:function(data){
             //alert(data);
            //  var json_obj = JSON.parse(data);//parse JSON
             //console.log(data.stateList);
             var states = "<option value=''>Select State</option>";
             if(data.success=="1"){
                 $.each(data.stateList, function  (key, val) {
                    states +="<option value="+val.state_id+">"+val.state_name+"</option>";
                 });
                 $("#state").html(states);
             }else{

             }
        },
        error:function(){

        }
    }); 
}
function getCity(id){
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/client/GetData/getCity",
        type:"POST",
        dataType: 'json',
        data: {state:id.value},
        beforeSend : function(){

        },
        success:function(data){
             //alert(data);
            //  var json_obj = JSON.parse(data);//parse JSON
             //console.log(data.stateList);
             var city = "<option value=''>Select City</option>";
             if(data.success=="1"){
                 $.each(data.cityList, function  (key, val) {
                    city +="<option value="+val.city_id+">"+val.city_name+"</option>";
                 });
                 $("#city").html(city);
             }else{
                
             }
        },
        error:function(){

        }
    }); 
}


function changepassword()
{
    var current_password="";
    var new_password="";
    var confirm_password="";

    current_password = $("#old_pass").val();
    new_password = $("#new_pass").val();
    confirm_password = $("#new_cpass").val();
    alert(new_password);
    alert(current_password);
    if(new_password==confirm_password)
    {
              $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Profile/new_password",
          type: "post",
          data: {

             new_pass : new_password,
            old_pass : current_password

          },
          success:function(){
                swal({ 
                      title: "Password!", 
                      text: "Is Changed Successfully", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Changepassword');
                      });
         },
          error:function(){
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Home?page=Changepassword');
                      });

          }
      });

      }
      else
      {
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Home?page=Changepassword');
                      });

      }
 

}

function profile_medical()
{
  
      var height ="";
      var weight ="";
      var bloodgrp ="";
      var genaticdis ="";
      var allergy ="";
      var patient_information_id="";

      height = $("#height").val();
      weight = $("#weight").val();
      bloodgrp = $("#bloodgrp").val();
      allergy = $("#allergy").val();
      genaticdis = $("#genaticdis").val();
      patient_information_id =$("#patient_information_id").val();

      var fd = new FormData();

      fd.append('height', height);
      fd.append('weight', weight);
      fd.append('allergy', allergy);
      fd.append('bloodgrp', bloodgrp);
      fd.append('genaticdis', genaticdis);
      fd.append('patient_information_id', patient_information_id);

        $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Profile/modify?modify=profile_medical",
          type: "post",
          processData: false,
          contentType: false,                  
          data: fd,
          success:function(){
                swal({ 
                      title: "Profile!", 
                      text: "Modified Successfully!", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile');
                      });
         },
          error:function(){
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile');
                      });

          }
      });  


}

function profile_personal()
{
  
    var fname ="";
    var mname ="";
    var lname =""; 
    var dateofbirth ="";
    var gender ="";
    var address ="";
    var country ="";  
    var state ="";  
    var city ="";  
    var marital_status ="";
    var imagefile="";
    var patient_information_id="";
    var pincode="";
    var updateimage="";

    fname = $("#fname").val();
    mname = $("#mname").val();
    lname = $("#lname").val();    
     dateofbirth = $("input[name='dateofbirth']").val();
     gender = $("#gender").val();
     address = $("#address").val();
     pincode = $("#pincode").val();
     country = $("#country").val();
     state = $("#state").val();
     city = $("#city").val();
     marital_status = $("#marital_status").val();
    imagefile = $('#patientimg')[0].files[0];
    patient_information_id =$("#patient_information_id").val();
    updateimage = $("#image").val();

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
      $("#fname").attr("placeholder","Please Enter Minimum 3 Character First Name");
      $("#fname").css("border","1px solid red");
      
 
    }
    else
    {
      $("#fname").css("border","1px solid #4286f4"); 
    }

    var Reg_mname = /^[A-Za-z]{3,25}$/;    
    if(mname=="")
    {
      isValid=isValid+1;
      $("#mname").attr("placeholder","Please Enter Middle Name");
      $("#mname").css("border","1px solid red");
      
    }
    else if(!Reg_fname.test(mname))
    {
      isValid=isValid+1;
      $('#mname').val('');
      $("#mname").attr("placeholder","Please Enter Minimum 3 Character Middle Name");
      $("#mname").css("border","1px solid red");
      
 
    }
    else
    {
      $("#mname").css("border","1px solid #4286f4"); 
    }
   
    var Reg_lname = /^[A-Za-z]{3,25}$/;    
    if(lname=="")
    {
      isValid=isValid+1;
      $("#lname").attr("placeholder","Please Enter Last Name");
      $("#lname").css("border","1px solid red");
      
    }
    else if(!Reg_fname.test(lname))
    {
      isValid=isValid+1;
      $('#lname').val('');
      $("#lname").attr("placeholder","Please Enter Minimum 3 Character Last Name");
      $("#lname").css("border","1px solid red");
      
 
    }
    else
    {
      $("#lname").css("border","1px solid #4286f4"); 
    }


   
    var Reg_pincode = /^[0-9]{6}$/;    
    if(pincode=="")
    {
      isValid=isValid+1;
      $("#pincode").attr("placeholder","Please Enter Pincode");
      $("#pincode").css("border","1px solid red");
      
    }
    else if(!Reg_pincode.test(pincode))
    {
      isValid=isValid+1;
      $('#pincode').val('');
      $("#pincode").attr("placeholder","Please Enter 6 Digit Pincode");
      $("#pincode").css("border","1px solid red");
    }
    else
    {
      $("#pincode").css("border","1px solid #4286f4"); 
    }

    var Reg_address = /^[a-zA-Z0-9\s,'-]*$/;    
    if(address=="")
    {
      isValid=isValid+1;
      $("#address").attr("placeholder","Please Enter Address");
      $("#address").css("border","1px solid red");
      
    }
    else
    {
      $("#address").css("border","1px solid #4286f4"); 
    }
        
    if(gender=="")
    {
      isValid=isValid+1;
      
      $("#div_gender").css("border","1px solid red");
      
    }
    else
    {}

    if(city=="")
    {
      isValid=isValid+1;
      
      $("#city").css("border","1px solid red");
      
    }
    else
    {}

    if(state=="")
    {
      isValid=isValid+1;
      
      $("#state").css("border","1px solid red");
      
    }
    else
    {}

    if(country=="")
    {
      isValid=isValid+1;
      
      $("#country").css("border","1px solid red");
      
    }
    else
    {}
    
    if(marital_status=="")
    {
      isValid=isValid+1;
      
      $("#marital_status").css("border","1px solid red");
      
    }
    else
    {}

        var today = new Date();
        var selected_date = new Date(dateofbirth);
        if(dateofbirth=="")
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
   
    if(imagefile==undefined)
    {
        isValid=isValid+1;
        $("#patientimg").css("border","1px solid red");

    }
    else
    {
      $("#patientimg").css("border","1px solid #4286f4"); 
    }

if(isValid==0)
{
    var fd = new FormData();

    fd.append('patientimg', imagefile);
    fd.append('fname', fname);
    fd.append('mname', mname);
    fd.append('lname', lname);    
    fd.append('pincode', pincode);
    fd.append('dateofbirth', dateofbirth);
    fd.append('gender', gender);
    fd.append('address', address);
    fd.append('state', state);
    fd.append('city', city);
    fd.append('country', country);
    fd.append('marital_status', marital_status);
    fd.append('patient_information_id', patient_information_id);
    fd.append('image', updateimage);

        

        $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Profile/modify?modify=profile_personal",
          type: "post",
          processData: false,
          contentType: false,        
          data: fd,
          success:function(){
                swal({ 
                      title: "Profile!", 
                      text: "Modified Successfully!", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile');
                      });
         },
          error:function(){
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile');
                      });

          }
      });  
    }
    else
    {
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" });
                      

    }        
}

function profile_doctor()
{
    var isValid=0;
    var name ="";
    var qualification ="";
    var speciality ="";
    var contactno ="";
    var dateofbirth ="";
    var address ="";
    var gender ="";
    var consultancy_fees ="";
    var pincode ="";
    var country ="";  
    var state ="";  
    var city ="";  
    var experience ="";
    var imagefile="";
    var doctor_id="";
    var updateimage="";
    
      doctor_id=$("#doctor_id").val();
      name = $("#name").val();
      qualification = $("#qualification").val();
      speciality = $("#speciality").val();
      contactno = $("#contactno").val();
      dateofbirth = $("#datepicker").val(); 
      address = $("#address").val();
      gender = $("#gender").val();
      consultancy_fees = $("#consultancy_fees").val();
      pincode = $("#pincode").val();
      country = $("#country").val();
      state = $("#state").val();
      city = $("#city").val();
      rate = $("#rate").val();
      experience = $("#experience").val();
      updateimage = $("#image").val();
      imagefile = $('#doctorimg')[0].files[0];

    var Reg_name = /^[\s.A-Za-z]{3,40}$/;  

    if(name=="")
    {
      isValid=isValid+1;
      $("#name").attr("placeholder","Please Enter Doctor Name");
      $("#name").css("border","1px solid red");
      
    }
    else if(!Reg_name.test(name))
    {
      isValid=isValid+1;
      $('#name').val('');
      $("#name").attr("placeholder","Please Enter Minimum 3 Character Doctor Name");
      $("#name").css("border","1px solid red");
      
 
    }
    else
    {
      $("#name").css("border","1px solid #4286f4"); 
    }

    if(qualification=="")
    {
      isValid=isValid+1;
      $("#qualification").attr("placeholder","Please Enter Doctor Qualification");
      $("#qualification").css("border","1px solid red");
      
    }
    else
    {
      $("#qualification").css("border","1px solid #4286f4");       
    }

  if(speciality=="")
    {
      isValid=isValid+1;
      
      $("#speciality").css("border","1px solid red");
      
    }
    else
    {}

  if(gender=="")
    {
      isValid=isValid+1;
      
      $("#gender").css("border","1px solid red");
      
    }
    else
    {}
  if(country=="")
    {
      isValid=isValid+1;
      
      $("#country").css("border","1px solid red");
      
    }
    else
    {}
  if(state=="")
    {
      isValid=isValid+1;
      
      $("#state").css("border","1px solid red");
      
    }
    else
    {}

  if(city=="")
    {
      isValid=isValid+1;
      
      $("#city").css("border","1px solid red");
      
    }
    else
    {}
    
    if(imagefile==undefined)
    {
        isValid=isValid+1;
        $("#doctorimg").css("border","1px solid red");

    }
    else
    {
      $("#doctorimg").css("border","1px solid #4286f4"); 
    }

    
    var ValidDate = new Date("01/01/1995");
    var selected_date = new Date(dateofbirth);
   if(dateofbirth=="")
    {
          isValid=isValid+1;
        $("#datepicker").css("border","1px solid red");

    }
    else if(selected_date>ValidDate)
    {
         isValid=isValid+1;
         $('#datepicker').val('');
        $("#datepicker").css("border","1px solid red");
     }
     else
     {
      $("#datepicker").css("border","1px solid #4286f4"); 
     }

    if(consultancy_fees=="")
    {
      isValid=isValid+1;
      $("#consultancy_fees").attr("placeholder","Please Enter Consultancy Fees");
      $("#consultancy_fees").css("border","1px solid red");
      
    }
    else
    {
      $("#consultancy_fees").css("border","1px solid #4286f4"); 
    }

    if(experience=="")
    {
      isValid=isValid+1;
      $("#experience").attr("placeholder","Please Enter experience");
      $("#experience").css("border","1px solid red");
      
    }
    else
    {
      $("#experience").css("border","1px solid #4286f4"); 
    }

    var Reg_pincode = /^[0-9]{6}$/;    
    if(pincode=="")
    {
      isValid=isValid+1;
      $("#pincode").attr("placeholder","Please Enter Pincode");
      $("#pincode").css("border","1px solid red");
      
    }
    else if(!Reg_pincode.test(pincode))
    {
      isValid=isValid+1;
      $('#pincode').val('');
      $("#pincode").attr("placeholder","Please Enter 6 Digit Pincode");
      $("#pincode").css("border","1px solid red");
    }
    else
    {
      $("#pincode").css("border","1px solid #4286f4"); 
    }

    var Reg_address = /^[a-zA-Z0-9\s,'-]*$/;    
    if(address=="")
    {
      isValid=isValid+1;
      $("#address").attr("placeholder","Please Enter Address");
      $("#address").css("border","1px solid red");
      
    }
    else
    {
      $("#address").css("border","1px solid #4286f4"); 
    }

    var Reg_contactno = /^[789]{1}[0-9]{9}$/;    
    if(contactno=="")
    {
      isValid=isValid+1;
      $("#contactno").attr("placeholder","Please Enter Contact Number");
      $("#contactno").css("border","1px solid red");
      
    }
    else if(!Reg_contactno.test(contactno))
    {
      isValid=isValid+1;
      $('#contactno').val('');
      $("#contactno").attr("placeholder","Please Enter 10 Digit Contact Number Starts with 7 or 8 or 9");
      $("#contactno").css("border","1px solid red");
    }
    else
    {
      $("#contactno").css("border","1px solid #4286f4"); 
    }

   if(isValid==0)
   {
    var fd = new FormData();
    fd.append('doctorimg', imagefile);
    fd.append('doctor_id', doctor_id);
    fd.append('name', name);
    fd.append('qualification', qualification);
    fd.append('speciality', speciality);
    fd.append('dateofbirth', dateofbirth);
    fd.append('gender', gender);
    fd.append('address', address);
    fd.append('pincode', pincode);
    fd.append('state', state);
    fd.append('city', city);
    fd.append('country', country);
    fd.append('contactno', contactno);
    fd.append('consultancy_fees', consultancy_fees);
    fd.append('experience', experience);
    fd.append('image', updateimage);

        $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Profile/modify?modify=profile_doctor",
          type: "post",
          processData: false,
          contentType: false,        
          data: fd,
          success:function(){
                swal({ 
                      title: "Profile!", 
                      text: "Modified Successfully!", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile');
                      });
         },
          error:function(){
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile');
                      });

          }
      });  
      }
      else
      {
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" });
                      

      }
  
}

function profile_hospital() 
{
    var isValid=0;
   var hospital_id = $("#hospital_id").val();
    var name = "";
    name = $("#name").val();

    var contactno = "";
    contactno = $("#contactno").val();

    var speciality = "";
    speciality = $("#speciality").val();

    var address = "";
    address = $("#address").val();

    var country = "";
    country = $("#country").val();

    var state = "";
    state = $("#state").val();

    var city = "";
    city = $("#city").val(); 

    var imagefile ="";
    imagefile = $('#hospitalimg')[0].files[0];

    var updateimage="";
    updateimage = $("#image").val();

    var Reg_name = /^[A-Za-z\s]{5,40}$/;  

    if(name=="")
    {
      isValid=isValid+1;
      $("#name").attr("placeholder","Please Enter Hospital Name");
      $("#name").css("border","1px solid red");
      
    }
    else if(!Reg_name.test(name))
    {
      isValid=isValid+1;
      $('#name').val('');
      $("#name").attr("placeholder","Please Enter Minimum 5 Character Hospital Name");
      $("#name").css("border","1px solid red");
      
 
    }
    else
    {
      $("#name").css("border","1px solid #4286f4"); 
    }
     
    if(address=="")
    {
      isValid=isValid+1;
      $("#address").attr("placeholder","Please Enter Address");
      $("#address").css("border","1px solid red");
      
    }
    else
    {
      $("#address").css("border","1px solid #4286f4"); 
    }

    var Reg_contactno = /^[789]{1}[0-9]{9}$/;    
    if(contactno=="")
    {
      isValid=isValid+1;
      $("#contactno").attr("placeholder","Please Enter Contact Number");
      $("#contactno").css("border","1px solid red");
      
    }
    else if(!Reg_contactno.test(contactno))
    {
      isValid=isValid+1;
      $('#contactno').val('');
      $("#contactno").attr("placeholder","Please Enter 10 Digit Contact Number Starts with 7 or 8 or 9");
      $("#contactno").css("border","1px solid red");
    }
    else
    {
     $("#contactno").css("border","1px solid #4286f4"); 
    }
  if(country=="")
    {
      isValid=isValid+1;
      
      $("#country").css("border","1px solid red");
      
    }
    else
    {}
  if(state=="")
    {
      isValid=isValid+1;
      
      $("#state").css("border","1px solid red");
      
    }
    else
    {}

  if(city=="")
    {
      isValid=isValid+1;
      
      $("#city").css("border","1px solid red");
      
    }
    else
    {}
    
    if(imagefile==undefined)
    {
        isValid=isValid+1;
        $("#hospitalimg").css("border","1px solid red");

    }
    else
    {
      $("#hospitalimg").css("border","1px solid #4286f4"); 
    }

  if(speciality=="")
    {
      isValid=isValid+1;
      
      $("#speciality").css("border","1px solid red");
      
    }
    else
    {}


    if(isValid==0)
    {
    var fd = new FormData();
    
    fd.append('hospital_id', hospital_id);
    fd.append('name', name);
    fd.append('contactno', contactno);
    fd.append('speciality', speciality);
    fd.append('address', address);
    fd.append('country', country);
    fd.append('state', state);
    fd.append('city', city);
    fd.append('hospitalimg', imagefile);
    fd.append('image', updateimage);

            $.ajax({
          url: "http://localhost:8080/hugsanddrugs/client/Profile/modify?modify=profile_hospital",
          type: "post",
          processData: false,
          contentType: false,        
          data: fd,
          success:function(){
                swal({ 
                      title: "Profile!", 
                      text: "Modified Successfully!", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile');
                      });
         },
          error:function(){
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile?page=Profile');
                      });

          }
      });  

      }
      else
      {
                 swal({ 
                      title: "Cancel", 
                      text: "Something Went Wrong!", 
                      icon: "error" });
                      

      }
            

  
}