$(document).ready(function(){
    addSelect();
    getDoctor();
   
   $("#search_doctor").keyup(function(){

   var search_keyword=$("#search_doctor").val().toLowerCase();
   var id=0;
  $.ajax({

        url:"http://localhost:8080/hugsanddrugs/admin/Doctor/search",
        type:"POST",
        dataType: 'json',
        data:{search:search_keyword},
        success:function(data){
          var doctor_record="";         
          $.each(data.doctorList, function  (key, val) {
            id=id+1;
                doctor_record +="<tr>";
                        doctor_record +="<td>"+id+"</td>";
                        doctor_record +="<td>"+val.doctor_name+"</td>";
                        doctor_record +="<td>"+val.qualification+"</td>";
                        doctor_record +="<td>"+val.doctor_speciality+"</td>";
                        doctor_record +="<td>"+val.city_name+"</td>";
                        doctor_record +="<td>"+val.consultancy_fees+"</td>";
                        doctor_record +="<td>"+val.rate+"</td>";
                        doctor_record +="<td>"+val.experience+"</td>";
                       doctor_record +="<td><a href='profile?id="+val.doctor_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.doctor_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.doctor_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                    doctor_record +="</tr>";  
          });
          
          $("#doctor_record").html(doctor_record);

 
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
                contactnumber : {
                    required:true,
                    minlength:10,
                    maxlength:10,
                    number: true
                },
                password : {

                    minlength : 5,
                    maxlength:10
                },
                repassword : {
                    minlength : 5,
                    maxlength:10,
                    equalTo : "#password"
                },
                rate :{
                    required:true,
                    min:0,
                    max:5,
                    number: true

                },
                pincode : {
                  required:true,
                  minlength:6,
                  maxlength:6,
                  number:true
                },
                experience :{
                  required:true,
                  min:0,
                  max:35,
                  number:true

                },
                consultancyfee : {
                  required:true,
                  min:100,
                  max:2000,
                  number:true

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
                 $("#state").selectpicker('refresh');
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
                $("#city").selectpicker('refresh');
             }else{
                
             }
        },
        error:function(){

        }
    }); 
}

function addSelect(){
    var i=1;
    $('#addselect').click(function(){
        i++;
        $('#selectdiv').append('<div class="row" id="row'+i+'"><div class="col-md-11"><div class="form-group col-md-6"><label>Hospital</label><select class="bootstrap-select" data-width="100%"><option value="AK">Alaska</option><option value="HI">Hawaii</option><option value="CA">California</option><option value="NV">Nevada</option><option value="OR">Oregon</option></select></div><div class="form-group col-md-6"><label>Visiting Hours :</label><div class="multi-select-full"><select class="multiselect-custom-color" multiple="multiple"><option value="cheese">Cheese</option><option value="tomatoes">Tomatoes</option><option value="mozarella">Mozzarella</option><option value="mushrooms">Mushrooms</option></select></div></div></div><div class="col-md-1"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');
        $('.multiselect-custom-color').multiselect({
            buttonClass: 'btn bg-teal-400'
         });

        $(".bootstrap-select").selectpicker();
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });

}
function getDoctor(){
        let searchParams = new URLSearchParams(window.location.search);
    searchParams.has('page');
    let param = searchParams.get('page');
   if(param==null)
    {
        param=1;
    }
    
    $.ajax({
        url:"http://localhost:8080/hugsanddrugs/admin/GetData/getDoctor",
        type:"POST",
        dataType: 'json',
        data:{
                keyword:'',
                page:param
            },
      beforeSend : function(){

        },
        success:function(data){
             var doctor_record = "";
             var id=0;
             if(data.success=="1"){
                 $.each(data.doctorlist, function  (key, val) {
                   id=id+1;
                doctor_record +="<tr>";
                        doctor_record +="<td>"+id+"</td>";
                        doctor_record +="<td>"+val.doctor_name+"</td>";
                        doctor_record +="<td>"+val.qualification+"</td>";
                        doctor_record +="<td>"+val.doctor_speciality+"</td>";
                        doctor_record +="<td>"+val.city_name+"</td>";
                        doctor_record +="<td>"+val.consultancy_fees+"</td>";
                        doctor_record +="<td>"+val.rate+"</td>";
                        doctor_record +="<td>"+val.experience+"</td>";
                        //doctor_record +="<td>"+val.city_name+"</td>";
                        //hospital_record +="<td>"+val.state_name+"</td>";
                       // doctor_record +="<td><a href='profile?id="+val.doctor_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.doctor_id+"' class='btn btn-xs btn-success'><i class='fa fa-edit'></i></a><a href='delete?id="+val.doctor_id+"' class='btn btn-danger btn-xs'><i class='fa fa-times'></i></a></td>";
                       doctor_record +="<td><a href='profile?id="+val.doctor_id+"' class='btn btn-xs btn-info'><i class='fa fa-user'></i></a><a href='edit?id="+val.doctor_id+"' class='btn btn-xs btn-success'><i class='icon-pencil5'></i></a><a href='javascript:void(0)' onclick='d("+val.doctor_id+")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a></td>";
                    doctor_record +="</tr>";  
                 });
                 $("#doctor_record").html(doctor_record);
                var i=0;
               var pagination="";
               var page=1;

                 pagination+="<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx=1 tabindex='0' href='http://localhost:8080/hugsanddrugs/admin/Doctor/View?page="+page+"'>"+page+"</a>";           
                 for(i=1;i<=data.totalDoctors;i++)
                 {
                     if(i%10==0)
                    {
                    page+=1;
                    pagination+="<a class='paginate_button current' aria-controls='DataTables_Table_0' data-dt-idx=1 tabindex='0' href='http://localhost:8080/hugsanddrugs/admin/Doctor/View?page="+page+"'>"+page+"</a>"; 
                   }
                 }
                 if(page==1)
                 {
                  pagination="";
                 }

                 $("#pagination").html(pagination);


             }else{
                
             }
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
          url: "http://localhost:8080/hugsanddrugs/admin/Doctor/Delete",
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
    var doctorname ="";
    var qualification="";
    var speciality="";
    var birthdate="";
    var gender="";
    var address="";
    var pincode="";
    var country="";
    var state="";
    var city="";
    var contactnumber="";
    var consultancyfee="";
    var rate="";
    var experience="";
    var hospital="";
    var imagefile="";
    var email = "";
    var password = "";


    doctorname = $("#doctorname").val();
    qualification = $("#qualification").val();
    speciality = $("#speciality").val();
    birthdate = $("#birthdate").val();
    gender = $("input[name='gender']:checked").val();
    address = $("#address").val();
    pincode = $("#pincode").val();
    country = $("#country").val();  
    state = $("#state").val();
    city = $("#city").val();
    contactnumber = $("#contactnumber").val();    
    consultancyfee = $("#consultancyfee").val();  
    rate = $("#rate").val();
    experience = $("#experience").val();
    hospital = $("#hospital").val();
    
    imagefile = $('#doctorimg')[0].files[0];
    email = $("#email").val();
    password = $("#password").val();
    
    
    var fd = new FormData();
fd.append('doctorimg', imagefile);
fd.append('doctorname', doctorname);
fd.append('qualification', qualification);
fd.append('speciality', speciality);
fd.append('birthdate', birthdate);
fd.append('gender', gender);
fd.append('address', address);
fd.append('pincode', pincode);
fd.append('state', state);
fd.append('city', city);
fd.append('country', country);
fd.append('contactnumber', contactnumber);
fd.append('rate', rate);
fd.append('experience', experience);
fd.append('hospital', hospital);
fd.append('email', email);
fd.append('password', password);
fd.append('consultancyfee', consultancyfee);
      
      $.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/Doctor/insert',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function () {
        swal({ 
              title: "Doctor!", 
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

    $("#doctor-edit-form").submit(function(e){
    e.preventDefault();
    var doctorname ="";
    var qualification ="";
    var specialty ="";
    var contact_number ="";
    var birthdate ="";
    var address ="";
    var gender ="";
    var consultancy_fees ="";
    var pincode ="";
    var country ="";  
    var state ="";  
    var city ="";  
    var rate ="";
    var experience ="";
    var hospital = "";
    var imagefile="";
    var doctor_id="";
    var updateimage="";
    
    doctor_id=$("#doctor_id").val();
    doctorname = $("#doctorname").val();
    qualification = $("#qualification").val();
    specialty = $("#speciality").val();
    contact_number = $("#contactnumber").val();
    birthdate = $("#birthdate").val(); 
     address = $("#address").val();
     gender = $("input[name='gender']:checked").val();
     consultancy_fees = $("#consultancyfee").val();
     pincode = $("#pincode").val();
     country = $("#country").val();
     state = $("#state").val();
     city = $("#city").val();
     rate = $("#rate").val();
     experience = $("#experience").val();
     hospital = $("#hospital").val();
     updateimage = $("#image").val();
    
    imagefile = $('#doctorimg')[0].files[0];


var fd = new FormData();
fd.append('doctorimg', imagefile);
fd.append('doctor_id', doctor_id);
fd.append('doctorname', doctorname);
fd.append('qualification', qualification);
fd.append('specialty', specialty);
fd.append('birthdate', birthdate);
fd.append('gender', gender);
fd.append('address', address);
fd.append('pincode', pincode);
fd.append('state', state);
fd.append('city', city);
fd.append('country', country);
fd.append('contactnumber', contact_number);
fd.append('consultancyfee', consultancy_fees);
fd.append('rate', rate);
fd.append('experience', experience);
fd.append('hospital', hospital);
fd.append('image', updateimage);



$.ajax({
    url: 'http://localhost:8080/hugsanddrugs/admin/Doctor/update',
    type: 'POST',
    processData: false,
    contentType: false,
    data: fd,
    success: function (data) {
        swal({ 
              title: "Doctor!", 
              text: "Your data has been Modified.", 
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
