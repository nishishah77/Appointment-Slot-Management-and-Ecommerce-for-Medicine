$(document).ready(function()
{
	getHospital();
  $("#search_hospital").keyup(function(){

   var search_keyword=$("#search_hospital").val().toLowerCase();
  $.ajax({

        url:"http://localhost:8080/hugsanddrugs/admin/Hospital/search",
        type:"POST",
        dataType: 'json',
        data:{search:search_keyword},
        success:function(data){
          var hospital_record="";
          var id=0;
            $.each(data.hospitalList, function  (key, val) {
              id=id+1;
                hospital_record +="<tr>";
                        hospital_record +="<td>"+id+"</td>";
                        hospital_record +="<td>"+val.hospital_name+"</td>";
                        hospital_record +="<td>"+val.address+"</td>";
                        hospital_record +="<td>"+val.contact_number+"</td>";
                        hospital_record +="<td>"+val.city_name+"</td>";
                        hospital_record +="<td><a href='profile?id="+val.hospital_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.hospital_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.hospital_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                    hospital_record +="</tr>";   
          });
          
          $("#hospital_record").html(hospital_record);
                   

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
                contactnumber : {
                    required:true,
                    minlength:10,
                    maxlength:10,
                    number: true
                },
                 address : {
                    required:true,                
                },               
                 password : {
                    minlength : 5
                },
                repassword : {
                    minlength : 5,
                    equalTo : "#password"
                },
                email : {
                  required:true
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
function getHospital(){
      
     let searchParams = new URLSearchParams(window.location.search);
    searchParams.has('page');
    let param = searchParams.get('page');
   if(param==null)
    {
        param=1;
    }

    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getHospital",
        type:"POST",
        dataType: 'json',
        data:{
          page:param
        },
        beforeSend : function(){

        },
        success:function(data){
             
             var hospital_record = "";
             var id=0;
             if(data.success=="1"){
                 $.each(data.hospitallist, function  (key, val) {
                  id=id+1;
                    hospital_record +="<tr>";
                        hospital_record +="<td>"+id+"</td>";
                        hospital_record +="<td>"+val.hospital_name+"</td>";
                        hospital_record +="<td>"+val.address+"</td>";
                        hospital_record +="<td>"+val.contact_number+"</td>";
                        hospital_record +="<td>"+val.city_name+"</td>";                        
                        hospital_record +="<td><a href='profile?id="+val.hospital_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.hospital_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.hospital_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                    hospital_record +="</tr>";  
                 });
                 $("#hospital_record").html(hospital_record);
            var pagination="";
            var page=1;
           var i=0;
                 pagination+="<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx=1 tabindex='0' href='http://localhost:8080/hugsanddrugs/admin/Hospital/View?page="+page+"'>"+page+"</a>";           
                 for(i=1;i<=data.totalHospitals;i++)
                 {
                     if(i%10==0)
                    {
                        page+=1;
                        
                    pagination+="<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx=1 tabindex='0' href='http://localhost:8080/hugsanddrugs/admin/Hospital/View?page="+page+"'>"+page+"</a>"; 
                   }
                 }
                 if(page==1)
                 {
                  pagination="";
                 }
                 
                 $("#pagination").html(pagination);

             }else{
                
             }
                //var x = JSON.parse(data);          
              // var obj = JSON.parse(data);

             console.log(data);

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
          url: "http://localhost:8080/hugsanddrugs/admin/Hospital/Delete",
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
    $(".form-validation").submit(function(e){
    e.preventDefault();
    //preventDefault();
    var hospitalname = "";
    hospitalname = $("#hospitalname").val();
    var contactnumber = "";
    contactnumber = $("#contactnumber").val();
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
    var email="";
    email = $("#email").val();
    var password ="";
    password = $("#password").val();
    var imagefile ="";
    imagefile = $('#hospitalimg')[0].files[0];
    var open_time = "";
    open_time = $("#open_time").val();
    var fd = new FormData();
    
    fd.append('hospitalname', hospitalname);
    fd.append('contactnumber', contactnumber);
    fd.append('speciality', speciality);
    fd.append('address', address);
    fd.append('country', country);
    fd.append('state', state);
    fd.append('city', city);
    fd.append('hospitalimg', imagefile);
    fd.append('email', email);
    fd.append('password', password);
    fd.append('open_time',open_time);
    
      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/admin/Hospital/insert",
          type: "post",    
          processData: false,
         contentType: false,
          data: fd,
          success:function(){
            swal({ 
              title: "Hospital!", 
              text: "Your data has been Added.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
          },
          error:function(){
           
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


$(document).ready(function(){
    
    
    $("#hospitaledit").submit(function(e){
    e.preventDefault();
    var hospitalname = "";
    hospitalname = $("#hospitalname").val();
    var contactnumber = "";
    contactnumber = $("#contactnumber").val();
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
    var email="";
    email = $("#email").val();
    var password ="";
    password = $("#password").val();
    var imagefile ="";
    imagefile = $('#hospitalimg')[0].files[0];
    
    var open_time="";
    open_time = $("#open_time").val();
    
    var id = "";
    id = $("#hospital_id").val();


    var updateimage="";
    updateimage = $("#image").val();
    var fd = new FormData();
    
    fd.append('hospital_id', id);
    fd.append('hospitalname', hospitalname);
    fd.append('contactnumber', contactnumber);
    fd.append('speciality', speciality);
    fd.append('address', address);
    fd.append('country', country);
    fd.append('state', state);
    fd.append('city', city);
    fd.append('hospitalimg', imagefile);
    fd.append('email', email);
    fd.append('password', password);
    fd.append('image', updateimage);
    fd.append('open_time',open_time);
   
      $.ajax({
          url: "http://localhost:8080/hugsanddrugs/admin/Hospital/update",
          type: "post",
          processData: false,
          contentType: false,
          data: fd,
          success:function(){
            swal({ 
              title: "Hospital!", 
              text: "Your data has been Modified.", 
              type: "success" }, 
              function(){ location.reload(); 
              });
          },
          error:function(){
           
             swal({ 
              title: "Cancelled!", 
              text: "Somthing went wrong", 
              type: "error" }, 
              function(){ location.reload(); 
              });
          }
      });
});
    });