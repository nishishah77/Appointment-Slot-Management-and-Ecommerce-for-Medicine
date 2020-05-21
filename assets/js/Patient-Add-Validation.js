$(document).ready(function(){
    getPatient();
    $("#dateofbirth").click(function(){
        var date = new Date();
        var d = date.getDate();
        if(d<10)
         {
          d = "0"+d;
         }

        var m = date.getMonth()+1;
        if(m<10)
         {
          m = "0"+m;
         }

        var y = date.getFullYear();
        alert(y+"-"+m+"-"+d);
        $( "#dateofbirth" ).prop("max",y+"-"+m+"-"+d);
    });
    $("#search_patient").keyup(function(){
    var search_keyword=$("#search_patient").val().toLowerCase();
  $.ajax({

        url:"http://localhost:8080/hugsanddrugs/admin/Patient/search",
        type:"POST",
        dataType: 'json',
        data:{search:search_keyword

            },
        success:function(data){
          var patient_record="";
          var id=0;
          $.each(data.patientList, function  (key, val) {
            id=id+1;
                 patient_record +="<tr id='myTable'>";
                        patient_record +="<td>"+id+"</td>";
                        patient_record +="<td>"+val.patient_first_name+" "+val.patient_middle_name+" "+val.patient_last_name+"</td>";
                        patient_record +="<td>"+val.date_of_birth+"</td>";
                        patient_record +="<td>"+val.mobile_number+"</td>";
                        patient_record +="<td>"+val.gender+"</td>";
                        patient_record +="<td>"+val.city_name+"</td>";
                        patient_record +="<td>"+val.email_id+"</td>";
                        patient_record +="<td><a href='profile?id="+val.patient_information_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.patient_information_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.patient_information_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                        patient_record +="</tr>";
          });       
          
          $("#patient_record").html(patient_record);
   }

  });
});
	 $(".form-validation").formwizard({
        disableUIStyles: true,
        validationEnabled: true,
        inDuration: 150,
        outDuration: 150,
        
        validationOptions: {
            ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
            errorClass: 'errClass',
            successClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);	
            },

            // Different components require proper error label placement
            errorPlacement: function(error, element) {

                // Styled checkboxes, radios, bootstrap switch
                if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                    if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                        error.appendTo( element.parent().parent().parent().parent() );
                    }
                     else {
                        error.appendTo( element.parent().parent().parent().parent().parent() );
                    }
                }

                // Unstyled checkboxes, radios
                else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                    error.appendTo( element.parent().parent().parent() );
                }

                // Input with icons and Select2
                else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                    error.appendTo( element.parent() );
                }

                // Inline checkboxes, radios
                else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent() );
                }

                // Input group, styled file input
                else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                    error.appendTo( element.parent().parent() );
                }

                else {
                    //error.insertAfter(element);
                    element.addClass("errClass");
                }
            },
            rules: {
                email: {
                    email: true
                },
                mobile : {
                    required:true,
                    minlength:10,
                    maxlength:10,
                    number: true
                },
                 password : {
                    minlength : 5
                },
                repassword : {
                    minlength : 5,
                    equalTo : "#password"
                }
            },
            
        },

    });

      $(".form-validation").on("step_shown", function(event, data) {
        $.uniform.update();
    });

});


function getState(id){
    //alert(id.value);
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getState",
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
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getCity",
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
    function getPatient(){
    
    let searchParams = new URLSearchParams(window.location.search);
    searchParams.has('page');
    let param = searchParams.get('page');
    if(param==null)
    {
        param=1;
    }
    
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getPatient",
        type:"POST",
        dataType: 'json',
        data:{
            keyword:'',
            page:param
        },
        beforeSend : function(){

        },
        success:function(data){
             var pateint_record = "";
             var srno=0;
             var pagination="";
            var page=1;
            

             if(data.success=="1"){
                 $.each(data.patientList, function  (key, val) {
                  srno = srno+1;
                    pateint_record +="<tr id='myTable'>";
                        pateint_record +="<td>"+ srno +"</td>";
                        pateint_record +="<td>"+val.patient_first_name+" "+val.patient_middle_name+" "+val.patient_last_name+"</td>";
                        pateint_record +="<td>"+val.date_of_birth+"</td>";
                        pateint_record +="<td>"+val.mobile_number+"</td>";
                        pateint_record +="<td>"+val.gender+"</td>";
                        pateint_record +="<td>"+val.city_name+"</td>";
                        pateint_record +="<td>"+val.email_id+"</td>";
                        pateint_record +="<td><a href='profile?id="+val.patient_information_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.patient_information_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.patient_information_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                    pateint_record +="</tr>";  
                     
                 });
                 $("#patient_record").html(pateint_record);
                 
                 var i=0;
                 pagination+="<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx=1 tabindex='0' href='http://localhost:8080/hugsanddrugs/admin/Patient/View?page="+page+"'>"+page+"</a>";           
                 for(i=1;i<=data.totalPatients;i++)
                 {
                     if(i%10==0)
                    {
                        page+=1;
                    pagination+="<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx=1 tabindex='0' href='http://localhost:8080/hugsanddrugs/admin/Patient/View?page="+page+"'>"+page+"</a>"; 
                   }
                 }
                 if(page==1)
                 {
                  pagination="";
                 }

                 $("#pagination").html(pagination);
             }else{
                
             }
            

        },
        error:function(){

        }
    }); 

   
   
}
function d(id)
  {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this Data!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#EF5350",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel pls!",
      closeOnConfirm: false,
      closeOnCancel: true
    },
    function(){
      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/admin/Patient/Delete",
          type: "post",
          data: {id:id},
          success:function(){
            swal({ 
              title: "Deleted!", 
              text: "Your data has been deleted.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
          },
          error:function(){
            swal('Cancelled', 'Your imaginary file is safe :)' , 'error');
          }
      });
      
    });
  }

  function insert()
  {
    $("#patientadd").submit(function(e){
    e.preventDefault();
    var first_name ="";
    var middle_name ="";
    var last_name ="";
    var mobile ="";
    var email ="";
    var password ="";
    var dateofbirth ="";
    var gender ="";
    var address ="";
    var pincode ="";
    var country ="";  
    var state ="";  
    var city ="";  
    var marital_status ="";
    var height ="";
    var weight ="";
    var bloodgroup ="";
    var genaticdis ="";
    var imagefile="";
    
    
  
    first_name = $("#first_name").val();
    middle_name = $("#middle_name").val();
    last_name = $("#last_name").val();
    mobile = $("#mobile").val();
    email = $("#email").val();
     password = $("#password").val();    
     dateofbirth = $("#dateofbirth").val();
     gender = $("input[name='gender']:checked").val();
     address = $("#address").val();
     pincode = $("#pincode").val();
     country = $("#country").val();
     state = $("#state").val();
     city = $("#city").val();
     marital_status = $("input[name='marital_status']:checked").val();
     height = $("#height").val();
     weight = $("#weight").val();
     bloodgroup = $("#bloodgroup").val();
     allergy = $("#allergy").val();
     genaticdis = $("#genaticdis").val();
     symptoms = $("#symptoms").val();
     bloodpressure = $("#bloodpressure").val();
     diabeties = $("#diabeties").val();
     heartbeats = $("#heartbeats").val();
     operation = $("#operation").val();
     doctor = $("#doctor").val();
     description = $("#description").val();
    imagefile = $('#patientimg')[0].files[0];
    
    

var fd = new FormData();
fd.append('patientimg', imagefile);
fd.append('first_name', first_name);
fd.append('middle_name', middle_name);
fd.append('last_name', last_name);
fd.append('mobile', mobile);
fd.append('email', email);
fd.append('dateofbirth', dateofbirth);
fd.append('password', password);
fd.append('gender', gender);
fd.append('address', address);
fd.append('pincode', pincode);
fd.append('state', state);
fd.append('city', city);
fd.append('country', country);
fd.append('marital_status', marital_status);
fd.append('height', height);
fd.append('weight', weight);
fd.append('allergy', allergy);
fd.append('bloodgroup', bloodgroup);
fd.append('genaticdis', genaticdis);


$.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/Patient/insert',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function () {
        swal({ 
              title: "Patient!", 
              text: "Your data has been Added.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
    },
    error: function () {
                     swal({ 
              title: "Cancelled!", 
              text: "Something went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });

    }
});
});


}

 function update()
  {

    $("#patient-edit-form").submit(function(e){
    e.preventDefault();
    var first_name ="";
    var middle_name ="";
    var last_name ="";
    var mobile ="";
    var email ="";
    var dateofbirth ="";
    var gender ="";
    var address ="";
    var pincode ="";
    var country ="";  
    var state ="";  
    var city ="";  
    var marital_status ="";
    var height ="";
    var weight ="";
    var bloodgroup ="";
    var genaticdis ="";
    var imagefile="";
    var patient_id="";
    var updateimage="";
    
    patient_id=$("#patient_id").val();
    updateimage=$("#image").val();
    first_name = $("#first_name").val();
    middle_name = $("#middle_name").val();
    last_name = $("#last_name").val();
    mobile = $("#mobile").val();
    email = $("#email").val(); 
     dateofbirth = $("#dateofbirth").val();
     gender = $("input[name='gender']:checked").val();
     address = $("#address").val();
     pincode = $("#pincode").val();
     country = $("#country").val();
     state = $("#state").val();
     city = $("#city").val();
     marital_status = $("input[name='marital_status']:checked").val();
     height = $("#height").val();
     weight = $("#weight").val();
     bloodgroup = $("#bloodgrp").val();
     allergy = $("#allergy").val();
     genaticdis = $("#genaticdis").val();
     imagefile = $('#patientimg')[0].files[0];


var fd = new FormData();
fd.append('patientimg', imagefile);
fd.append('patient_id', patient_id);
fd.append('first_name', first_name);
fd.append('middle_name', middle_name);
fd.append('last_name', last_name);
fd.append('mobile', mobile);
fd.append('email', email);
fd.append('dateofbirth', dateofbirth);
fd.append('gender', gender);
fd.append('address', address);
fd.append('pincode', pincode);
fd.append('state', state);
fd.append('city', city);
fd.append('country', country);
fd.append('marital_status', marital_status);
fd.append('height', height);
fd.append('weight', weight);
fd.append('allergy', allergy);
fd.append('bloodgroup', bloodgroup);
fd.append('genaticdis', genaticdis);
fd.append('image', updateimage);


$.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/Patient/update',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
        swal({ 
              title: "Patient!", 
              text: "Your data has been Modified.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
    },
    error: function () {
                     swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });

    }
});
});


}

