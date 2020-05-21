function getAppointment(value)
{
    
       var appointment_date = $("#date").find('option:selected').val();
  
        $.ajax({
        url:"http://localhost:8080/hugsanddrugs/client/GetData/getAppointments",
        type:"POST",
        dataType: 'json',
        data:{appointment_date:appointment_date},
        success:function(data){
             var table1 = "",table2="",counter=0;
             if(data.success=="1"){
                 $.each(data.AppointmentList, function  (key, val) {
                  counter=counter+1;
                        table1 +="<li>";
                        table1 +="<span>"+counter+"</span>";
                        table1 +="<span>"+val.first_name+" "+val.last_name+"</span>";
                        if(value=="hospital")
                        {
                        table1 +="<span>"+val.doctor_name+"</span>";
                        table1 +="<span>"+val.appointment_date+"</span>";
                        }
                        if(value=="doctor")
                        {
                        table1 +="<span>"+val.hospital_name+"</span>";
                        table1 +="<span>"+val.appointment_date+"</span>";
                        }

                        table1 +="</li>";  
                        table2 +="<li>";                        
                        
                        table2 +="<span>"+val.appointment_time+"</span>"
                        if(value=="doctor")
                        {
                          table2 +="<span>";
                        table2 +="<form name='prescription_form' id='prescription_form' enctype='multipart/form-data'>";
                        table2 +="<input type='file' name='prescription' id='prescription' style='width:180px; '>";
                        table2 +="<button type='button' onclick='Prescription("+val.appointment_id+")'>Prescribe</button>";
                        table2 +="</form>";
                        table2 +="</span>";

                        }
                        table2 +="</li>";  


                 });
                 $("#firsttable").html(table1);
                 $("#secondtable").html(table2);
             }else{
                  table1="<li><span>No Result </span></li>";
                  table2="<li><span>Found!</span></li>";
                $("#firsttable").html(table1);
                $("#secondtable").html(table2);
             }
             console.log(data);

        },
        error:function(){

        }
    }); 

     

}

function Appointment()
{
  var appointment_date=$("#datepicker").val();
  var doctor_id= $("#doctor").find('option:selected').val();
   
       $.ajax({
        url:"http://localhost:8080/hugsanddrugs/client/GetData/getAppointmentslots",
        type:"POST",
        //dataType: 'json',
        data:{appointment_date:appointment_date,
          doctor:doctor_id
        },
        success:function(Result){
             var table1 = "",table2="",counter=0;
             if(Result!="")
             {
                if(Result.indexOf("o1") != -1)
                {
                  $("#o1").hide();
                }
                else
                {
                  $("#o1").show();
                }
                if(Result.indexOf("o2") != -1)
                {
                  $("#o2").hide();
                }
                else
                {
                  $("#o2").show();
                }
                if(Result.indexOf("o3") != -1)
                {
                  $("#o3").hide();
                }
                else
                {
                  $("#o3").show();
                }
                if(Result.indexOf("o4") != -1)
                {
                  $("#o4").hide();
                }
                else
                {
                  $("#o4").show();
                }
             }
             else
             {
              $("#o1").show();
              $("#o2").show();
              $("#o3").show();
              $("#o4").show();
             }
        },
        error:function(){

        }
    }); 

}

function cancel(id)
{
      $.ajax({

      url:"http://localhost:8080/hugsanddrugs/client/Profile/deleteappointment",
      type:"POST",
      data:{
        id:id
      },
      success:function(data)
      {
                       swal({ 
                      title: "Appointment!", 
                      text: "Your Appointment is canceled .", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile/myappointment?page=myappointments');
                      });
 
      },
    error:function(){

        }
      });
}

function Prescription(id)
{
    
      var Prescription = "";
      Prescription = $('#prescription')[0].files[0];
      var fd = new FormData();
      fd.append('id',id);
      fd.append('prescription',Prescription);
      

      $.ajax({

      url:"http://localhost:8080/hugsanddrugs/client/Profile/uploadPrescription",
      type:"POST",
      processData: false,
      contentType: false,
       data: fd,
        success:function(data)
      {
                       swal({ 
                      title: "Prescription!", 
                      text: "Uploaded Successfully.", 
                      icon: "success" }).then(function() {
                      window.location.replace('http://localhost:8080/hugsanddrugs/client/Profile/myappointment?page=myappointments');
                      });
 
      },
    error:function(){

        }
      });
  
}

function View_prescription(prescription)
{
      
      window.open("http://localhost:8080/hugsanddrugs/prescription/"+prescription,'_blank');
  
}

function rate(rating,doctor_id,appointment_id)
{
  if(rating==1)
  {
    $("#i1"+appointment_id).css("color","orange");
    $("#i2"+appointment_id).css("color","");
    $("#i3"+appointment_id).css("color","");
    $("#i4"+appointment_id).css("color","");
    $("#i5"+appointment_id).css("color","");

  }
  if(rating==2)
  {
    $("#i1"+appointment_id).css("color","orange");
    $("#i2"+appointment_id).css("color","orange");
    $("#i3"+appointment_id).css("color","");
    $("#i4"+appointment_id).css("color","");
    $("#i5"+appointment_id).css("color","");
    
  }
  if(rating==3)
  {
    $("#i1"+appointment_id).css("color","orange");
    $("#i2"+appointment_id).css("color","orange");
    $("#i3"+appointment_id).css("color","orange");
    $("#i4"+appointment_id).css("color","");
    $("#i5"+appointment_id).css("color","");
    
  }
  if(rating==4)
  {
    $("#i1"+appointment_id).css("color","orange");
    $("#i2"+appointment_id).css("color","orange");
    $("#i3"+appointment_id).css("color","orange");
    $("#i4"+appointment_id).css("color","orange");
    $("#i5"+appointment_id).css("color","");

  }
  if(rating==5)
  {
    $("#i1"+appointment_id).css("color","orange");
    $("#i2"+appointment_id).css("color","orange");
    $("#i3"+appointment_id).css("color","orange");
    $("#i4"+appointment_id).css("color","orange");
    $("#i5"+appointment_id).css("color","orange");
    
  }

       $.ajax({
        url:"http://localhost:8080/hugsanddrugs/client/Profile/UpdateRate",
        type:"POST",
        data: {
          rating:rating,
          doctor_id:doctor_id
        },
        success:function(){
               
        },
        error:function(){

        }
    }); 

}